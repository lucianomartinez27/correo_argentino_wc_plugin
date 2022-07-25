<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

include_once plugin_dir_path(__FILE__) . '/../ca_assistant.php';


    class CorreoArgentinoShipping extends WC_Shipping_Method
    {
        public $ca_assistant;

        public function __construct()
        {
            parent::__construct();
            $this->ca_assistant = new CA_Assistant();   
        
        }

        public function init()
        {
            $this->init_form_fields();
            $this->init_settings();
            add_action('woocommerce_update_options_shipping_' . $this->id, array($this, 'process_admin_options'));

        }
        public function init_form_fields()
    {
        $this->instance_form_fields = [
            'enabled' => [
                'title' 		=> __( 'Enable/Disable', 'woocommerce' ),
                'type' 			=> 'checkbox',
                'label' 		=> __( 'Habilitar este método de envío', 'woocommerce' ),
                'default' 		=> 'yes'
            ],
            'title' => [
                'title' => __('Method Title', 'woocommerce'),
                'type' => 'text',
                'description' => __('Nombre con el cuál el usuario verá el envío.', 'woocommerce'),
                'default' => __($this->method_title, 'woocommerce')
            ]
        ];
    }


        
    }

