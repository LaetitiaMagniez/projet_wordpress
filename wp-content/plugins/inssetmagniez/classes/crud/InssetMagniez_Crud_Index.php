<?php

class InssetMagniez_Crud_Index {

    public function ajout(){

        global $wpdb;

        $wpdb->insert($wpdb->prefix . InssetMagniez_BASENAME . '_subscribers' , ['id'=>0] );
        $lastId = $wpdb->insert_id;
        return $lastId;

    }

    public function ajout_data($lastId, $cle, $valeur){
        
        global $wpdb;

        $table_name = $wpdb->prefix . InssetMagniez_BASENAME . '_subscribersdata';

        $wpdb->insert(
            $table_name,
            array(
                'id' => $lastId,
                'cle' => $cle,
                'valeur' => $valeur,
            )
        );
    
    }

    public function remove($var){

        if(!$var)
            return;
        
        global $wpdb;

        if($wpdb->delete($wpdb->prefix . InssetMagniez_BASENAME . '_subscribersdata', ['id'=> $var]))
            $wpdb->delete($wpdb->prefix . InssetMagniez_BASENAME . '_subscribers', ['id'=> $var]);
            return 'Suppression Effectuée';

        return 'Erreur !';    
    }

    static public function getConfigs(){

        global $wpdb;

        $sql = "SELECT * FROM ". $wpdb->prefix . InssetMagniez_BASENAME . '_config' . " ORDER BY `rank`" ;
	    $configs = $wpdb->get_results($sql,'ARRAY_A');
	
	    return $configs;

    }

    static public function updateValues($id, $value){
        
        if(!$id && !$value)
            return false;

        global $wpdb;
        
        return $wpdb->update($wpdb->prefix . InssetMagniez_BASENAME . '_config',['value' => $value], ['id'=> $id]);
    }

}