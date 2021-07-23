<?php
include_once plugin_dir_path(__FILE__) . 'correo_argentino.php';


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'CorreoArgentinoADomicilio' ) ) {
class CorreoArgentinoADomicilio extends CorreoArgentinoShipping
{
    public function __construct($instance_id=0)
    {    
        parent::__construct();
        $this->id = 'kelder_correo_argentino_domicilio';
        $this->instance_id 			 		= absint($instance_id);

        
        $this->method_title          = 'Correo argentino a domicilio';
        $this->method_description =  'Calcula costos de envio a domicilio';
        
        $this->supports              = array(
            'shipping-zones',
            'instance-settings',

        );
        

        $this -> init();
        $this->enabled = $this->get_option('enabled');
        $this->title = $this->get_option('title');
    }

    public function calculate_shipping($package = array())
    {
        $this->add_rate(array(
            'id' => $this->id,
            'label' => $this->title,
            'cost' => $this->ca_assistant -> get_prices_for_domicilio($package)
        ));
    }

}
   
}
?>