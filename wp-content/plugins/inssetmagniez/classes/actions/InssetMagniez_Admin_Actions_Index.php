<?php

add_action('wp_ajax_removeNewsletter', array('InssetMagniez_Admin_Actions_Index', 'do_the_task'));
add_action('wp_ajax_updateConfig', array('InssetMagniez_Admin_Actions_Index', 'update'));

class InssetMagniez_Admin_Actions_Index {

    public function __construct(){

        return;
    }

    public static function do_the_task(){

        check_ajax_referer('ajax_nonce_security', 'security');

        if ((!isset($_REQUEST)) || sizeof(@$_REQUEST) < 1)
            exit;

        $InssetMagniez_Crud_Index = new InssetMagniez_Crud_Index();
        $sql= $InssetMagniez_Crud_Index->remove($_REQUEST['idDelete']);
        print($sql);

    }

    public static function update(){
        
        check_ajax_referer('ajax_nonce_security', 'security');

        if ((!isset($_REQUEST)) || sizeof(@$_REQUEST) < 1)
            exit;
        
        foreach ($_REQUEST as $key=>$value)
            if(!in_array($key, ['security','action']))
                InssetMagniez_Crud_Index::updateValues($key, $value);
            
        print 'Mise à jour effectuée';
        
        exit;

    }

}
