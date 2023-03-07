<?php

add_action('wp_ajax_changeDisponibility', array('Lm_Projet_Admin_Action', 'change_disponibility'));
add_action('wp_ajax_changeAccess', array('Lm_Projet_Admin_Action', 'change_access'));
add_action('wp_ajax_changeNote', array('Lm_Projet_Admin_Action', 'change_note'));

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

        foreach ($_REQUEST as $key => $value)
            $$key = $value;

        $Lm_Projet_Crud_Index= new Lm_Projet_Crud_Index();
        $response = $Lm_Projet_Crud_Index->update_disponibility($_REQUEST['idDisponible']);

        print $response;

    }

    public static function change_access()
    {

        check_ajax_referer('ajax_nonce_security', 'security');

        if ((!isset($_REQUEST)) || sizeof(@$_REQUEST) < 1)
            exit;

        $Lm_Projet_Crud_Index= new Lm_Projet_Crud_Index();
        $response = $Lm_Projet_Crud_Index->update_accessibility($_REQUEST['updateAccess'], $_REQUEST['valueAccess']);

        print $response;

        exit;

    }

    public static function change_note()
    {

        check_ajax_referer('ajax_nonce_security', 'security');

        if ((!isset($_REQUEST)) || sizeof(@$_REQUEST) < 1)
            exit;

        $Lm_Projet_Crud_Index= new Lm_Projet_Crud_Index();
        $response = $Lm_Projet_Crud_Index->update_note($_REQUEST['idNote'], $_REQUEST['valueNote']);

        print $response;

        exit;

    }
}
