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


    }

}
