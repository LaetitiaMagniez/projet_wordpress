<?php

class Lm_Projet_Crud_Index
{

    static public function getCountriesNames(){

        global $wpdb;

        $sql = "SELECT `pays` FROM ". $wpdb->prefix . LM_PROJET_BASENAME . '_countries';
        $countriesNames = $wpdb->get_results($sql,'ARRAY_A');

        return $countriesNames;

    }

    static public function change_disponibility($id, $value){

        if(!$id && !$value)
            return false;

        global $wpdb;

        return $wpdb->update($wpdb->prefix . LM_PROJET_BASENAME . '_countries',['disponible' => $value], ['id'=> $id]);

    }
}