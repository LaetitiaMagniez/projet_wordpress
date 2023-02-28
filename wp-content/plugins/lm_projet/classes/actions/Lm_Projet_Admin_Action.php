<?php

add_action('wp_ajax_lmprojetchangeDisponibility', array('Lm_Projet_Admin_Action', 'change_disponibility'));
add_action('wp_ajax_lmprojetchangeAccess', array('Lm_Projet_Admin_Action', 'change_access'));

class Lm_Projet_Admin_Action
{

    public function __construct()
    {

        return;
    }

    public static function change_disponibility()
    {

        check_ajax_referer('ajax_nonce_security', 'security');

        if ((!isset($_REQUEST)) || sizeof(@$_REQUEST) < 1)
            exit;

        foreach ($_REQUEST as $key=>$value)
            if(!in_array($key, ['security','action']))
                Lm_Projet_Crud_Index::update_disponibility($key, $value);

        print 'Mise à jour effectuée';

        exit;

    }

    public static function change_access()
    {

        check_ajax_referer('ajax_nonce_security', 'security');

        if ((!isset($_REQUEST)) || sizeof(@$_REQUEST) < 1)
            exit;

        foreach ($_REQUEST as $key=>$value)
            if(!in_array($key, ['security','action']))
                Lm_Projet_Crud_Index::update_accessibility();

        print 'Mise à jour effectuée';

        exit;

    }
}
