<?php

class Lm_Projet_Crud_Index
{

    static public function getCountriesInformations(){

        global $wpdb;

        $sql = "SELECT `pays`, `id` FROM ". $wpdb->prefix . LM_PROJET_BASENAME . '_countries';
        $countriesInformations = $wpdb->get_results($sql,'ARRAY_A');

        return $countriesInformations;

    }

    static public function update_disponibility($id, $value){

        if(!$id && !$value)
            return false;

        global $wpdb;

        return $wpdb->update($wpdb->prefix . LM_PROJET_BASENAME . '_countries',['disponible' => $value], ['id'=> $id]);

    }

    static public function update_accessibility($id, $value){

        if(!$id && !$value)
            return false;

        global $wpdb;

        return $wpdb->update($wpdb->prefix . LM_PROJET_BASENAME . '_countries',['accessible' => $value], ['id'=> $id]);

    }

    public function ajout(){

        global $wpdb;

        $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_prospects' , ['id'=>0] );
        $lastId = $wpdb->insert_id;
        return $lastId;

    }

    public function ajout_data($lastId, $cle, $valeur){

        global $wpdb;

        $table_name = $wpdb->prefix . LM_PROJET_BASENAME . '_prospectsdata';

        $wpdb->insert(
            $table_name,
            array(
                'id' => $lastId,
                'cle' => $cle,
                'valeur' => $valeur,
            )
        );

    }
}