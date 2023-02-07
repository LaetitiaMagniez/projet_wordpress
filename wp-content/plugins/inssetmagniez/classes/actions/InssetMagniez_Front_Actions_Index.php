<?php

add_action('wp_ajax_inssetmagnieznewsletter', array('InssetMagniez_Front_Actions_Index', 'do_the_job'));
add_action('wp_ajax_nopriv_inssetmagnieznewsletter', array('InssetMagniez_Front_Actions_Index', 'do_the_job'));

class InssetMagniez_Front_Actions_Index {

    public static function do_the_job() {

        check_ajax_referer('ajax_nonce_security', 'security');

        if ((!isset($_REQUEST)) || sizeof(@$_REQUEST) < 1)
            exit;
        
        foreach ($_REQUEST as $key => $value)
            $$key = (string) trim($value);

        $InssetMagniez_Crud_Index = new InssetMagniez_Crud_Index();
        $lastId = $InssetMagniez_Crud_Index->ajout();

        
        foreach ($_REQUEST as $key => $value)
            if (!in_array($key, ['action','security']))
                $InssetMagniez_Crud_Index->ajout_data($lastId, $key, $value);

        
        print "ok";
        exit;
    }

}