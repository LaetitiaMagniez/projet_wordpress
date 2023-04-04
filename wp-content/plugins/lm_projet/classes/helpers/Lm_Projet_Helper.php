<?php

class Lm_Projet_Helper
{

    public function conversion_pays($id_conversion_pays) // récupération de l'id du pays de la page de données et afficher le nom du pays qui correspond
    {
        if(!$id_conversion_pays)
        {
            return;
        }

        global $wpdb;

        $table_name = $wpdb->prefix .LM_PROJET_BASENAME. '_countries';

        $conversion_pays = "SELECT `pays` FROM  $table_name WHERE `id` = $id_conversion_pays";

        $result = $wpdb->get_results($conversion_pays, "ARRAY_A");

        return $result[0]['pays'];



    }


}