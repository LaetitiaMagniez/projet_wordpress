<?php

add_action('wp_ajax_lmprojetprospects', array('Lm_Projet_Front_Actions', 'inscription'));
add_action('wp_ajax_nopriv_lmprojetprospects', array('Lm_Projet_Front_Actions', 'inscription'));

class Lm_Projet_Front_Actions {

    public static function inscription() {

        check_ajax_referer('ajax_nonce_security', 'security');

        if ((!isset($_REQUEST)) || sizeof(@$_REQUEST) < 1)
            exit;

        foreach ($_REQUEST as $key => $value)
            $$key = (string) trim($value);
        
        $Lm_Projet_Crud_Index = new Lm_Projet_Crud_Index();
        $lastId = $Lm_Projet_Crud_Index->ajout();

        foreach ($_REQUEST as $key => $value)
            if (!in_array($key, ['action','security']))
                $Lm_Projet_Crud_Index->ajout_data($lastId, $key, $value);

        print "inscrit";
        exit;
    }

}