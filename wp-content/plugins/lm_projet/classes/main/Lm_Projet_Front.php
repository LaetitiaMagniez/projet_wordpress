<?php

class Lm_Projet_Front
{

    public function __construct()
    {

        add_action('wp_enqueue_scripts', array($this, 'addjs'), 0);
        return;
    }

    public function addjs() {

        wp_enqueue_script('lm_projet', plugins_url( LM_PROJET_PLUGIN_NAME .'/assets/js/Lm_Projet_Front.js'), array('jquery-new-bis'), LM_PROJET_VERSION, true);
        wp_localize_script('lm_projet', 'lmprojetscript', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce('ajax_nonce_security')
        ));

        return;

    }
}