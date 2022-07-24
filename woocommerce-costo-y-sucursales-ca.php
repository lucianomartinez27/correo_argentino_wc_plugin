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

include 'includes/ca_assistant.php';

define( 'KELDER_CORREO_ARGENTINO_PLUGIN_PATH', __FILE__ );

$active_plugins = apply_filters('active_plugins', get_option('active_plugins'));

if (in_array('woocommerce/woocommerce.php',  $active_plugins)) {


	register_activation_hook( KELDER_CORREO_ARGENTINO_PLUGIN_PATH, 'kelder_correo_argentino_on_activation_create_page_to_view_order_status' );

	function kelder_correo_argentino_on_activation_create_page_to_view_order_status() {
		if ( ! current_user_can( 'activate_plugins' ) ) return;

		global $wpdb;
		
		if ( null === $wpdb->get_row( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = 'estado-orden'", 'ARRAY_A' ) ) {
			
			$current_user_id = get_current_user_id();
			
			// create post object
			$page = array(
				'post_title'  => __( 'Estado de órden' ),
				'post_name' 	=> 'estado-orden',
				'post_status' => 'publish',
				'post_author' => $current_user_id,
				'post_type'   => 'page',
				'post_content' => '[kelder_show_shipping_details_correo_argentino]'
			);
			
			// insert the post into the database
			wp_insert_post( $page );
			
		}
	}

    function add_custom_assets()
    {
        wp_enqueue_script('correo_argentino_scripts', plugin_dir_url(__FILE__) . 'assets/js/checkout.js', array('jquery'), '1', true);
				wp_enqueue_style('correo_argentino_stykes', plugin_dir_url(__FILE__) . 'assets/css/styles.css');
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
                ' (' . get_post_meta($post_id, 'kelder_sucursal_correo_argentino_branch', true) . ')';
        }
    }




    // Adding Meta container admin shop_order pages
    add_action('add_meta_boxes', 'add_tracking_code_meta_box');

    function add_tracking_code_meta_box()
    {
        add_meta_box('mv_other_fields', __('Código seguimiento Correo Argentino', 'woocommerce'), 'mv_add_tracking_code_for_correo_argentino_meta_box', 'shop_order', 'side', 'core');
    }



    function mv_add_tracking_code_for_correo_argentino_meta_box()
    {
        global $post;

        $meta_field_data = get_post_meta($post->ID, '_tracking_code', true) ? get_post_meta($post->ID, '_tracking_code', true) : '';

        echo
				'<input type="hidden" name="mv_tracking_number_for_correo_argentino_nonce" value="' . wp_create_nonce() . '">
        <p style="border-bottom:solid 1px #eee;padding-bottom:13px;">
        <input type="text" style="width:250px;";" name="tracking_code" placeholder="' . $meta_field_data . '" value="' . $meta_field_data . '"></p>';
						
				
    }


    // Save the data of the Meta field
    add_action('save_post', 'mv_save_tracking_number_field', 10, 1);


		function mv_save_tracking_number_field($post_id)
		{

				// We need to verify this with the proper authorization (security stuff).

				// Check if our nonce is set.
				if (!isset($_POST['mv_tracking_number_for_correo_argentino_nonce'])) {
						return $post_id;
				}
				$nonce = $_REQUEST['mv_tracking_number_for_correo_argentino_nonce'];

				//Verify that the nonce is valid.
				if (!wp_verify_nonce($nonce)) {
						return $post_id;
				}

				// If this is an autosave, our form has not been submitted, so we don't want to do anything.
				if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
						return $post_id;
				}

				// Check the user's permissions.
				if ('page' == $_POST['post_type']) {

						if (!current_user_can('edit_page', $post_id)) {
								return $post_id;
						}
				} else {

						if (!current_user_can('edit_post', $post_id)) {
								return $post_id;
						}
				}
				// --- Its safe for us to save the data ! --- //

				// Sanitize user input  and update the meta field in the database.
				$ca_tracking_code = $_POST['tracking_code'];
				update_post_meta($post_id, '_tracking_code', $ca_tracking_code);
		}
		

    // Display field value on the order edit page (not in custom fields metabox)
    add_action('woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1);
    function my_custom_checkout_field_display_admin_order_meta($order)
    {
        $ca_tracking_number_field = get_post_meta($order->get_id(), '_tracking_code', true);

				$ca_tracking_number_url = get_site_url() . "/index.php/estado-orden?pi=" . encode_string($order->get_order_key());
        if (!empty($ca_tracking_number_field)) {
            echo '<p><strong>' . __("Código seguimiento", "woocommerce") . ':</strong> ' . get_post_meta($order->get_id(), '_tracking_code', true) . '</p>';
        }
				echo '<p><strong>' . __("URL de Estado de envío", "woocommerce") . ':</strong><a href=' .$ca_tracking_number_url . '>'.$ca_tracking_number_url.'</a></p>';
    }

    add_filter('woocommerce_email_order_meta_fields', 'custom_order_mail_fields_callback', 10, 3);
    function custom_order_mail_fields_callback($fields, $sent_to_admin, $order)
    {
        $fields['kelder_tracking_number_ca'] = array(
            'label' => __('Código seguimiento', 'correo-argentino'),
            'value' =>  get_post_meta($order->get_id(), '_tracking_code', true),
        );

				$fields['kelder_tracking_number_ca'] = array(
					'label' => __('Puedes ver el estado de tu compra desde éste link: ', 'correo-argentino'),
					'value' =>  get_site_url() . "/index.php/estado-orden?pi=" . encode_string($order->get_order_key()),
			);

        return $fields;
    }

		add_shortcode('kelder_show_shipping_details_correo_argentino', 'get_shipping_details');
		function get_shipping_details(){
			$token = isset($_GET["pi"]) ? $_GET["pi"] : "";
			$order_key = decode_string($token);
			$order_id = wc_get_order_id_by_order_key($order_key);
			if ($order_id){
				$ca_tracking_number = get_post_meta($order_id, '_tracking_code', true);
				$order = wc_get_order($order_id);				
				$ca_shipping_details = get_ca_shipping_details($order, $ca_tracking_number);
				echo "<div id='order-and-shipping-details' class='shipping-details'>";
				draw_order_details($order);	
				draw_shipping_details($ca_shipping_details);
				echo "</div>";
			} else {
				echo "No se encontró el pedido. Si tienes alguna duda, ponte en contacto con nosotros.";
			}
		}

	}

function get_ca_shipping_details($order, $ca_tracking_number){
	$ca_assistant = new CA_Assistant();
	$ca_shipping_details = array();

	$shipping_methods = $order->get_shipping_methods();
	$shipping_method = @array_shift($shipping_methods);
	$shipping_method_id = $shipping_method['method_id'];	
	$ca_shipping_details["shipping-type"] = $order->get_shipping_method();
	$ca_shipping_details["shipping-method"] = $shipping_method_id;
	$ca_shipping_events = $ca_assistant -> get_ca_shipping_events($ca_tracking_number);
	$ca_shipping_details["events"] = $ca_shipping_events;

	return $ca_shipping_details;

}

function draw_shipping_details($ca_shipping_details) {
	$shippingEvents = '
	<div class="shipping-details">
	<h2>Detalles del envío</h2>
	<p> <strong>Tipo de envío:</strong> $(tipo-envio)</p>
	$(events-table)
	</div>';
	
	$shippingEvents = str_replace("$(tipo-envio)", $ca_shipping_details["shipping-type"], $shippingEvents);

	$is_shipped_by_correo_argentino =
	 	$ca_shipping_details["shipping-method"] == "kelder_correo_argentino_domicilio" ||
		$ca_shipping_details["shipping-method"] == "kelder_correo_argentino_sucursal";

	if ($is_shipped_by_correo_argentino){

		$eventsTable = '
		<table class="table-responsive">
			<thead>
				<tr>
					<th class="detail-centered" colspan="4">Datos de Correo Argentino</th>
				</tr>
				<tr>
					<th>Fecha</th>
					<th>Planta</th>
					<th>Estado</th>
					<th>Descripción</th>
				</tr>
			</thead>
			<tbody>
			$(shipping-events)
			</tbody>
		</table>';
		
		$eventsRows = '';
		if (count($ca_shipping_details["events"]) > 0){
				foreach ($ca_shipping_details["events"] as $event) {
					$eventRow = '<tr>';
					$eventRow .= '<td data-title= "Fecha:">' . $event -> fechaEvento . '</td>';
					$eventRow .= '<td  data-title= "Planta:">' . $event -> planta . '</td>';
					$eventRow .= '<td  data-title= "Evento:">' . $event -> codigoEvento . '</td>';
					$eventRow .= '<td  data-title= "Estado:">' . ($event -> estadoEntrega == "0" ? '-' : $event -> estadoEntrega) . '</td>';
					$eventRow .= '</tr>';
					$eventsRows .= $eventRow;
				}

			} else {
			$eventsRows = 
			'<tr>
				<td data-title="Info: " colspan="4">Aún no tenemos los datos de envío, por favor regresa más tarde.</td>
			</tr>';
		}
		$eventsTable = str_replace("$(shipping-events)", $eventsRows, $eventsTable);
		$shippingEvents = str_replace("$(events-table)", $eventsTable, $shippingEvents);
	} else {
		$shippingEvents = str_replace("$(events-table)", "", $shippingEvents);
	}
	
	echo $shippingEvents;
	}

	function draw_order_details($order){
		$orderDetailsTable = '
		<div class="order-details">
		 <table class="table-responsive">
			<thead>
				<tr>
					<th class="detail-centered" colspan="4">Datos del pedido</th>
				</tr>
				<tr>
					<th>Evento</th>
					<th>Situación</th>
				</tr>
			</thead>
			<tbody>
				($order-events)
			</tbody>
		</table>
		</div>';
		$details_body = '';
		$details_body .= event_detail("Pedido", "Realizado el " . $order -> get_date_created() -> format('d-m-Y H:i'));
		$details_body .= event_detail("Pago",  ($order -> get_date_paid() ? "Realizado el " . $order -> get_date_paid() -> format('d-m-Y H:i') : "Por confirmar"));
		$details_body .= event_detail("Estado órden", wc_get_order_statuses()['wc-' . $order -> get_status()] . ($order -> get_date_modified() ? " el " . $order -> get_date_modified() -> format('d-m-Y H:i') : ""));
		$details_body .= '';
		echo str_replace('($order-events)', $details_body, $orderDetailsTable);
	
	}


	function event_detail($title, $date){
		return '<tr><td data-title="Evento: ">'. $title . '</td><td data-title="Situación:">' . $date .'</td></tr>';
	}






	function encode_string($string){
		return base64_encode($string);
	}
	function decode_string($string){
		return base64_decode($string);
	}