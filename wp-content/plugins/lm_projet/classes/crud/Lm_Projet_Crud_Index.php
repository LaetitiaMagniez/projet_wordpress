<?php

class Lm_Projet_Crud_Index
{

    static public function getCountriesInformations(){

        global $wpdb;

        $sql = "SELECT * FROM ". $wpdb->prefix . LM_PROJET_BASENAME . '_countries';
        $countriesInformations = $wpdb->get_results($sql,'ARRAY_A');

        return $countriesInformations;

    }

    static public function update_disponibility($idDisponible ){

        if (!$idDisponible)
            return;


        global $wpdb;

        $table_name_config = $wpdb->prefix . LM_PROJET_BASENAME . '_countries';

        $Pays_non_disponibleSql = "SELECT `id` FROM $table_name_config";
        $Pays_non_disponible = $wpdb->get_results($Pays_non_disponibleSql, 'ARRAY_A');


        if ($Pays_non_disponible)
            foreach ($Pays_non_disponible as $value)
                if($value !==$idDisponible)
                $wpdb->update($table_name_config, array('disponible' => 0), array('id' => $value['id']));

        foreach ($idDisponible as $id)
            $wpdb->update($table_name_config, array('disponible' => 1), array('id' => $id));

        return "Mise à jour effectuée avec succès !";


    }

    static public function update_accessibility($updateAccess, $valueAccess){

        if(!$updateAccess && !$valueAccess)
            return;

        global $wpdb;

        $table_name_config = $wpdb->prefix . LM_PROJET_BASENAME . '_countries';

        if($updateAccess)
            $wpdb->update($table_name_config, array('accessible_majeur_uniquement' => $valueAccess), array('id' => $updateAccess));

        return "Mise à jour effectuée avec succès !";

    }

    public function update_note($idNote, $valueNote){

        if(!$idNote && !$valueNote)
            return;

        global $wpdb;

        $table_name = $wpdb->prefix . LM_PROJET_BASENAME . '_countries';

        if($idNote && $valueNote)
            $wpdb->update($table_name , array('note' => $valueNote), array('id' => $idNote));

        return "Mise à jour effectuée avec succès !";

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


    public static function getAge()
    {

        function last($array) {

            if (!is_array($array)) return $array;

            if (!count($array)) return null;

            end($array);

            return $array[key($array)];

        }
        global $wpdb;
        $table_prospects = $wpdb->prefix . LM_PROJET_BASENAME . '_prospectsdata';

        $sqlnbrProspects= "SELECT DISTINCT `id` FROM $table_prospects ";
        $nbrProspects= $wpdb->get_results($sqlnbrProspects, 'ARRAY_A');
        $lastId= last($nbrProspects);
        $lastIdValue= implode($lastId);


        $sqlAge = "SELECT `valeur` FROM $table_prospects WHERE `id`=$lastIdValue AND `cle`='dateNaissance'";
        $prospect = $wpdb->get_results($sqlAge, 'ARRAY_A');

        $dateNaissance = $prospect['0']['valeur'];
        $dateActuelle = date("Y-m-d");
        $dateDiff = date_diff(date_create($dateNaissance), date_create($dateActuelle));
        $age = $dateDiff->format('%y');

        if ($age >= 18) {
            // le prospect est majeur
            $table_pays= $wpdb->prefix . LM_PROJET_BASENAME . '_countries';

            $sql = "SELECT * FROM $table_pays WHERE `disponible`=1 ";

            return $wpdb->get_results($sql, 'ARRAY_A');

        } else {

            // le prospect est mineur
            $table_pays = $wpdb->prefix . LM_PROJET_BASENAME . '_countries';

            $sql = "SELECT * FROM $table_pays WHERE `disponible`=1 AND `accessible_majeur_uniquement`=0";

            return $wpdb->get_results($sql, 'ARRAY_A');
        }
    }

    public function getInfosProspect($idProspect)
    {
        global $wpdb;

        $table_prospects = $wpdb->prefix . LM_PROJET_BASENAME . '_prospectsdata';

        $sqlProspects= "SELECT `valeur` FROM $table_prospects where `id`= $idProspect " ;

        return $wpdb->get_results($sqlProspects, 'ARRAY_A');



    }
}