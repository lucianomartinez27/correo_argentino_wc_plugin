<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

include_once plugin_dir_path(__FILE__) . '/../../woocommerce/woocommerce.php';

if (!class_exists('CorreoArgentinoShipping')) {
    abstract class CorreoArgentinoShipping extends WC_Shipping_Method
    {
        protected $ca_assistant;

        public function __construct()
        {
            parent::__construct();
            $this->ca_assistant = new CA_Assistant();
            $this->id = 'kelder_correo_argentino';
            $this->method_description = 'Envia tus paquetes a través de correo argentino';
            $this->enabled = 'yes';
            $this->init();
            $this->supports              = array(
                'shipping-zones',
            );
        }

        public function init()
        {
            $this->init_form_fields();
            $this->init_settings();
            add_action('woocommerce_update_options_shipping_' . $this->id, array($this, 'process_admin_options'));

        }

        protected function get_zone_number($package = array())
        {
            $province_from = WC()->countries->get_base_state();
            $province_to = $package['destination']['state'];
            return $this->ca_assistant->get_shipping_zone($province_from, $province_to);
        }
    }
}
