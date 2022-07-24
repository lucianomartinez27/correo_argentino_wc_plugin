<?php 

class CA_ShippingDetailsAssistant {

	public function __construct($token)
	{
		$this -> order = $this -> get_order_for_token($token);
		$this -> drawer = new CA_ShippingDetailsDrawer($this -> order);
	}

	private $_ca_url = 'https://api.correoargentino.com.ar/backendappcorreo/api/api/shipping-tracking-nac?product_code=CP&id_shipping=$(ca_tracking_number)&destination=Nac';
	
	public function get_ca_shipping_events($ca_tracking_number){
		$url = $this -> get_url($ca_tracking_number);
		$shipping_details_json = wp_remote_retrieve_body(wp_remote_get($url));
		$ca_shipping_detail = json_decode($shipping_details_json);
		if ($ca_shipping_detail -> rta == "OK"){
			$ca_shipping_events = $ca_shipping_detail -> data -> eventos;
		} else {
			$ca_shipping_events = array();
		}
		return $ca_shipping_events;
	}

	private function get_url($ca_tracking_number){
		return str_replace('$(ca_tracking_number)', $ca_tracking_number, $this->_ca_url);
	}

	public function get_order_for_token($token){
		
		$order_id = $this -> get_order_id_for_token($token);
		if ($order_id){
			$order = wc_get_order($order_id);
			return $order;
		} else {
			return false;
		}
	}

	public function get_order_id_for_token($token){
			$order_key = decode_string($token);
			$order_id = wc_get_order_id_by_order_key($order_key);
			return $order_id;
	}

	public function get_order(){
		return $this -> order;
	}

	public function get_drawer(){
		return $this -> drawer;
	}

	public function get_shipping_details($ca_tracking_number){
		$ca_shipping_details = array();
		$shipping_methods = $this -> order->get_shipping_methods();
		$shipping_method = @array_shift($shipping_methods);
		$shipping_method_id = $shipping_method['method_id'];	
		$ca_shipping_details["shipping-type"] = $this -> order->get_shipping_method();
		$ca_shipping_details["shipping-method"] = $shipping_method_id;
		$ca_shipping_events = $this -> get_ca_shipping_events($ca_tracking_number);
		$ca_shipping_details["events"] = $ca_shipping_events;
		return $ca_shipping_details;
	}
}


class CA_ShippingDetailsDrawer {

	public function __construct($order)
	{
		$this -> order = $order;
	}

	public function draw_shipping_details($ca_shipping_details) {
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
	
		public function draw_order_details(){
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
			$details_body .= $this -> event_detail("Pedido", "Realizado el " . $this -> order -> get_date_created() -> format('d-m-Y H:i'));
			$details_body .= $this -> event_detail("Pago",  ($this -> order -> get_date_paid() ? "Realizado el " . $this -> order -> get_date_paid() -> format('d-m-Y H:i') : "Por confirmar"));
			$details_body .= $this -> event_detail("Estado órden", wc_get_order_statuses()['wc-' . $this -> order -> get_status()] . ($this -> order -> get_date_modified() ? " el " . $this -> order -> get_date_modified() -> format('d-m-Y H:i') : ""));
			$details_body .= '';
			echo str_replace('($order-events)', $details_body, $orderDetailsTable);
		
		}
	
	
		public function event_detail($title, $date){
			return '<tr><td data-title="Evento: ">'. $title . '</td><td data-title="Situación:">' . $date .'</td></tr>';
		}
		
		public function draw($ca_shipping_details){
			if ($this -> order) {
				echo "<div id='order-and-shipping-details' class='shipping-details'>";
				$this -> draw_order_details();	
				$this -> draw_shipping_details($ca_shipping_details);
				echo "</div>";
			} else {
				echo "No se encontró el pedido. Si tienes alguna duda, ponte en contacto con nosotros.";
			}
		}

}

function decode_string($string){
	return base64_decode($string);
}