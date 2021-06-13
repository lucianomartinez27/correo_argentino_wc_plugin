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

$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );

if (in_array('woocommerce/woocommerce.php',  $active_plugins)) {

    add_filter('woocommerce_shipping_methods', 'add_correo_argentino_shipping_method');


    function add_correo_argentino_shipping_method($methods)
    {
        $methods['kelder_correo_argentino_domicilio'] = 'CorreoArgentinoADomicilio';
        return $methods;
    }

    function correo_Argentino_shipping_method(){
        include_once 'includes/shipping_methods/a_domicilio.php';

    }
    add_action( 'woocommerce_shipping_init', 'correo_Argentino_shipping_method' );


    


}
