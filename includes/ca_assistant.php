<?php

class CA_Assistant
{
  private $_url = 'https://lucianomartinez.000webhostapp.com/api/ca_assistant.php';


  public function get_prices_for_domicilio($package)
  {
    return $this->get_price_for($package, 'domicilio');
  }

  public function get_prices_for_sucursal($package)
  {
    return $this->get_price_for($package, 'sucursal');
  }

  private function get_price_for($package, $action_type)
  {
    $weight = wc_get_weight(WC()->cart->get_cart_contents_weight(), 'kg');
    $province_from = WC()->countries->get_base_state();
    $province_to = $package['destination']['state'];

    return intval($this->request_for_shipping_price($action_type, $province_from, $province_to, $weight));
  }
  
  private function request_for_shipping_price($action_type, $province_from, $province_to, $weight)
  {
    return wp_remote_retrieve_body(wp_remote_post(
      $this->_url,
      ['body' => ['action' => $action_type, 'province_from' => $province_from, 'province_to' => $province_to, 'weight' => $weight]]
    ));
  }
}
