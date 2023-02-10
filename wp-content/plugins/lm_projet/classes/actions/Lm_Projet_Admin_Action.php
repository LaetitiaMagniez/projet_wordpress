<?php

add_action('wp_ajax_changeDisponibility', array('Lm_Projet_Admin_Action', 'change_disponibility'));

class Lm_Projet_Admin_Action
{

    public function __construct()
    {

        return;
    }

    public static function change_disponibility()
    {

        check_ajax_referer('ajax_nonce_security', 'security');
//
//        if ((!isset($_REQUEST)) || sizeof(@$_REQUEST) < 1)
//            exit;
//
//        $Lm_Projet_Crud_Index = new Lm_Projet_Crud_Index();
//        $sql = $Lm_Projet_Crud_Index->change_disponibility($_REQUEST['lm_projet_disponible']);
//        print($sql);

    }
}
