<?php

add_shortcode('FORMULAIRE', array('InssetMagniez_Shortcodes_Form', 'display'));
add_shortcode('TEST', array('InssetMagniez_Shortcodes_Test', 'test'));



class InssetMagniez_Front {

    public function __construct() {

        add_action('wp_enqueue_scripts', array($this, 'addjs'), 0);
        add_action('init', array($this, 'declare_route' ),0);
        add_filter('query_vars',array($this, 'ajout_var_custom' )) ;
        add_action('wp_loaded', array($this, 'prend_en_compte' ));
        return;


    }

    public function addjs() {

        wp_enqueue_script('inssetmagniez', plugins_url( InssetMagniez_PLUGIN_NAME .'/assets/js/InssetMagniez_Front.js'), array('jquery-new'), InssetMagniez_VERSION, true);
        wp_localize_script('inssetmagniez', 'inssetscript', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce('ajax_nonce_security')
        ));

        return;

    }

    static public function declare_route(){

        $page= get_post(INSSETMAGNIEZ_ID);

        add_rewrite_rule(
            $page->post_name .'/id/([^/]*)/?$',
            'index.php?pagename=' . $page->post_name  . '&mavariabletest=$matches[1]',
            'top' 
        );
        
        return;
    }

    static public function ajout_var_custom($query_vars){

        
        $query_vars[] = 'mavariabletest';
        return $query_vars;
    }

    static public function prend_en_compte(){
        
        global $wp_rewrite;
        return $wp_rewrite->flush_rules();
    }

}