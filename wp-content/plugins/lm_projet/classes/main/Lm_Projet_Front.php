<?php

class Lm_Projet_Front
{

    public function __construct()
    {

        add_action('wp_enqueue_scripts', array($this, 'addjs'), 0);
        add_action('init', array($this, 'declare_route'), 0);
        add_filter('query_vars', array($this, 'ajout_var_custom'));
        add_action('wp_loaded', array($this, 'prend_en_compte'));
        return;


    }
}