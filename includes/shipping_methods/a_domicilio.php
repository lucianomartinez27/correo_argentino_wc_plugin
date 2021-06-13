<?php
include_once plugin_dir_path(__FILE__) . '../correo_argentino.php';

class CorreoArgentinoADomicilio extends CorreoArgentinoShipping
{
    public function __construct($instance_id=0)
    {    
        parent::__construct();
        $this->id = 'kelder_correo_argentino_domicilio';
        $this->instance_id 			 		= absint($instance_id);

        $this->title = $this->title . 'Correo Argentino a domicilio';
        $this->method_title          = 'Correo argentino a domicilio';
        $this->method_description =  'Calcula costos de envio a domicilio';
        $this->enabled = 'yes';
        $this->supports              = array(
            'shipping-zones',
            'instance-settings',

        );
        $this -> init();
    }

    public function calculate_shipping($package = array())
    {
        $this->add_rate(array(
            'id' => $this->id,
            'label' => $this->title,
            'cost' => $this->get_prices_for_zone($this->get_zone_number($package))
        ));
    }

    private function get_prices_for_zone($zone_number)
    {
        $weight = $this -> ca_assistant -> calculate_weight();
        return $this -> ca_assistant -> get_prices_for_domicilio($zone_number, $weight);
    }
}
?>