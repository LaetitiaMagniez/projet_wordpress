<?php

class Lm_Projet_Admin
{

    public function __construct()
    {

        add_action('admin_menu', array($this, 'menu'), -1);
        return;

    }

    public function menu()
    {

        add_menu_page(
            __('Module_Voyage'),
            __('Module_Voyage'),
            'administrator',
            'lm_projet_admin',
            array($this, 'lm_projet_admin'),
            'images/marker.png',
            1000
        );

        add_submenu_page(
            'lm_projet_admin',
            __('Module_Voyage / Configuration'),
            __('Configuration'),
            'administrator',
            'lm_projet_admin',
            array($this, 'lm_projet_admin')
        );

        add_submenu_page(
            'lm_projet_admin',
            __('Module_Voyage / Liste des Pays'),
            __('Liste des Pays'),
            'administrator',
            'lm_projet_liste_pays',
            array($this, 'lm_projet_liste_pays')
        );

        add_submenu_page(
            'lm_projet_admin',
            __('Module_Voyage / Prospects'),
            __('Prospects'),
            'administrator',
            'lm_projet_prospects',
            array($this, 'lm_projet_prospects')
        );
        add_action('admin_enqueue_scripts', array($this, 'assets'), 999);
    }

    public function assets(){

        //wp_enqueue_style('admin_enqueue_scripts', plugins_url(LM_PROJET_PLUGIN_NAME.'/assets/css/stylesheet.css'));

        wp_register_script('lm_projet_admin', plugins_url( LM_PROJET_PLUGIN_NAME .'/assets/js/Lm_Projet_Admin.js'), array(), LM_PROJET_VERSION, true);
        wp_enqueue_script('lm_projet_admin');

        wp_localize_script('lm_projet_admin', 'lmprojetscript', array(
            'security' => wp_create_nonce('ajax_nonce_security')
        ));

        return;
    }

    public function lm_projet_admin() {

        $Lm_Projet_Views_Configuration = new Lm_Projet_Views_Configuration();
        return $Lm_Projet_Views_Configuration->display();

    }

    public function lm_projet_liste_pays(){

        $Lm_Projet_Views_Liste_Pays = new Lm_Projet_Views_Liste_Pays();
        return $Lm_Projet_Views_Liste_Pays->display();
    }

    public function lm_projet_prospects(){
        print('test');
    }
}
