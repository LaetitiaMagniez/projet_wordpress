<?php

class InssetMagniez_Admin {

    public function __construct() {

        add_action('admin_menu', array($this, 'menu'), -1);
        return;

    }

    public function menu() {

        add_menu_page(
            __('INSSET'),
            __('INSSET'),
            'administrator',
            'inssetmagniez_admin',
            array($this, 'inssetmagniez_admin'),
            'images/marker.png',
            1000
        );

        add_submenu_page(
            'inssetmagniez_admin',
            __('INSSET / Config'),
            __('Configuration'),
            'administrator',
            'inssetmagniez_admin',
            array($this, 'inssetmagniez_admin')
        );

        add_submenu_page(
            'inssetmagniez_admin',
            __('INSSET / Inscrits'),
            __('Inscrits'),
            'administrator',
            'inssetmagniez_inscrits',
            array($this, 'inssetmagniez_inscrits')
        );

        add_action('admin_enqueue_scripts', array($this, 'assets'), 999);
    }

    public function assets(){

        wp_enqueue_style('admin_enqueue_scripts', plugins_url(InssetMagniez_PLUGIN_NAME.'/assets/css/stylesheet.css'));
        
        wp_register_script('inssetmagniez_admin', plugins_url( InssetMagniez_PLUGIN_NAME .'/assets/js/InssetMagniez_Admin.js'), array(), InssetMagniez_VERSION, true);
        wp_enqueue_script('inssetmagniez_admin');
        
        wp_localize_script('inssetmagniez_admin', 'inssetscript', array(
            'security' => wp_create_nonce('ajax_nonce_security')
        ));

        return;
    }
    
    public function inssetmagniez_admin() {

        $InssetMagniez_Views_Config = new InssetMagniez_Views_Config();
        return $InssetMagniez_Views_Config->display();
        

    }

    public function inssetmagniez_inscrits() {

        $InssetMagniez_Views_Inscrits = new InssetMagniez_Views_Inscrits();
        return $InssetMagniez_Views_Inscrits->display();

    }    
}    