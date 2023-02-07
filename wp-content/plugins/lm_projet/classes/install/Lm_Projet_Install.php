<?php

class Lm_Projet_Install {

    public function isTableBaseAlreadyCreated() {

        global $wpdb;

        $sql = 'SHOW TABLES LIKE \'%'. $wpdb->prefix . LM_PROJET_BASENAME. '_countries%\'';
        return $wpdb->get_var($sql);

    }

    public function setup() {

        if ($this->isTableBaseAlreadyCreated())
            return;

        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();
        require_once(ABSPATH .'wp-admin/includes/upgrade.php');

        $sql_countries = '
            CREATE TABLE IF NOT EXISTS `'. $wpdb->prefix . LM_PROJET_BASENAME . '_countries` (
                `id` INT(11) AUTO_INCREMENT NOT NULL,
                `pays` VARCHAR(255) NOT NULL,
                `code_ISO` VARCHAR(3) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB '. $charset_collate;

        if(dbDelta($sql_countries)){
            $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_countries' , array('pays'=> 'Andorre', 'code_ISO'=> 'AND') );
            $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_countries' , array('pays'=> 'France', 'code_ISO'=> 'FRA') );
            $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_countries' , array('pays'=> 'Argentine', 'code_ISO'=> 'ARG') );
            $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_countries' , array('pays'=> 'Australie', 'code_ISO'=> 'AUS') );
            $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_countries' , array('pays'=> 'Bahamas', 'code_ISO'=> 'BHS') );
            $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_countries' , array('pays'=> 'Brésil', 'code_ISO'=> 'BRA') );
            $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_countries' , array('pays'=> 'Canada', 'code_ISO'=> 'CAN') );
            $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_countries' , array('pays'=> 'Colombie', 'code_ISO'=> 'COL') );
            $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_countries' , array('pays'=> 'Danemark', 'code_ISO'=> 'DNK') );
            $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_countries' , array('pays'=> 'Canada', 'code_ISO'=> 'CAN') );
            $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_countries' , array('pays'=> 'Canada', 'code_ISO'=> 'CAN') );
            $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_countries' , array('pays'=> 'Canada', 'code_ISO'=> 'CAN') );
            $wpdb->insert($wpdb->prefix . LM_PROJET_BASENAME . '_countries' , array('pays'=> 'Canada', 'code_ISO'=> 'CAN') );

        }
    }
}