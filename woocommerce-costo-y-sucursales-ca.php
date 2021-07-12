<?php

/**
 * Plugin Name: Costos y sucursales Correo Argentino
 * Plugin URI: http://lucianomartinez.com.ar
 * Description: Calcula los costos de envío para Correo Argentino basado en provincia de envío, peso y si es a domicilio o sucursal.
 * Version: 1.0.0
 * Author: Luciano Martínez
 * Author URI: http://lucianomartinez.com.ar
 * Developer: Luciano Martínez
 * Developer URI: http://lucianomartinez.com.ar
 * Text Domain: costo-y-sucursales-ca
 * Domain Path: /languages
 *
 * WC requires at least: 2.2
 * WC tested up to: 2.3
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$active_plugins = apply_filters('active_plugins', get_option('active_plugins'));

if (in_array('woocommerce/woocommerce.php',  $active_plugins)) {

    function add_custom_assets()
    {
        wp_enqueue_script('my-custom-script-handle', plugin_dir_url(__FILE__) . 'assets/js/checkout.js', array('jquery'), '1', true);
    }

    add_action('wp_enqueue_scripts', 'add_custom_assets');

    function add_correo_argentino_shipping_method($methods)
    {
        $methods['kelder_correo_argentino_domicilio'] = 'CorreoArgentinoADomicilio';
        $methods['kelder_correo_argentino_sucursal'] = 'CorreoArgentinoASucursal';

        return $methods;
    }
    add_filter('woocommerce_shipping_methods', 'add_correo_argentino_shipping_method');


    function init_correo_argentino_shipping_method()
    {
        include_once 'includes/shipping_methods/a_domicilio.php';
        include_once 'includes/shipping_methods/a_sucursal.php';
    }
    add_action('woocommerce_shipping_init', 'init_correo_argentino_shipping_method');



    //* Add location and branch select field to the checkout page

    function select_branches()
    {
        woocommerce_form_field(
            'location_branches',
            array(
                'type'          => 'select',
                'required'      => true,
                'class'         => array('wps-drop'),
                'label'         => __('Seleccionar localidad'),
                'options'       => array(
                    'blank'        => __('Seleccione una localidad', 'wps'),
                )
            ),


        );
        woocommerce_form_field(
            'branches',
            array(
                'type'          => 'select',
                'required'      => true,
                'class'         => array('wps-drop'),
                'label'         => __('Seleccionar sucursal'),
                'options'       => array(
                    'blank'        => __('Selecione una sucursal', 'wps'),
                )
            ),


        );
    }
    add_action('woocommerce_review_order_before_payment', 'select_branches', 16);

    /**
     * Check if branches are selected
     */

    add_action('woocommerce_checkout_process', 'checkout_field_ca_process_kelder');
    function checkout_field_ca_process_kelder()
    {
        global $woocommerce, $wp_session;

        $chosen_methods = WC()->session->get('chosen_shipping_methods');
        $chosen_shipping = $chosen_methods[0];
        $wp_session['chosen_shipping'] = $chosen_shipping;
        if (strpos($chosen_shipping, 'kelder_correo_argentino_sucursal') !== false) {
            if (empty($_POST['branches']) || $_POST['branches'] == '0')
                wc_add_notice(__('Por favor, seleccionar sucursal de retiro.'), 'error');
        }
    }


    add_action('woocommerce_checkout_update_order_meta', 'order_sucursal_main_update_order_meta_ca_kelder', 10);
    function order_sucursal_main_update_order_meta_ca_kelder($order_id)
    {
        global $wp_session;

        if (!(empty($_POST['branches']) || $_POST['branches'] == '0')) {

            update_post_meta($order_id, 'kelder_sucursal_correo_argentino_branch', $_POST['branches']);
            update_post_meta($order_id, 'kelder_sucursal_correo_argentino_location_branch', $_POST['location_branches']);
        }
    }



    add_action('woocommerce_checkout_update_order_meta', 'order_domicilio_main_update_order_meta_ca_kelder', 10);
    function order_domicilio_main_update_order_meta_ca_kelder($order_id)
    {
        global $wp_session;

        if ($_POST['shipping_method'][0] == 'domicilio_correo_argentino') {
            update_post_meta($order_id, 'kelder_domicilio_correo_argentino', 'Enviar a domicilio');
        }
    }


    add_action('woocommerce_admin_order_data_after_shipping_address', 'edit_woocommerce_checkout_page_ca_kelder', 10, 1);
    function edit_woocommerce_checkout_page_ca_kelder($order)
    {
        global $post_id;
        if (get_post_meta($post_id, 'kelder_domicilio_correo_argentino', true)) {
            echo '<p><strong>' . __('Domicilio Correo Argentino') . ':</strong>' . get_post_meta($post_id, 'kelder_domicilio_correo_argentino', true) . '</p>';
        } elseif (get_post_meta($post_id, 'kelder_sucursal_correo_argentino_branch', true) & get_post_meta($post_id, 'kelder_sucursal_correo_argentino_location_branch', true)) {
            echo '<p><strong>' . __('Sucursal Correo Argentino') . '</strong></p>' .
            get_post_meta($post_id, 'kelder_sucursal_correo_argentino_location_branch', true) .
            ' ('. get_post_meta($post_id, 'kelder_sucursal_correo_argentino_branch', true) . ')';
        }
    }
}
