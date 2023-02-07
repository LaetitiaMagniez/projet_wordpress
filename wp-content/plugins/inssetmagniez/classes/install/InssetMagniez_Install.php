<?php

class InssetMagniez_Install {

    public function isTableBaseAlreadyCreated() {

        global $wpdb;

        $sql = 'SHOW TABLES LIKE \'%'. $wpdb->prefix . InssetMagniez_BASENAME . '_config%\'';
        return $wpdb->get_var($sql);

    }

    public function setup() {

        if ($this->isTableBaseAlreadyCreated())
            return;

        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();
        require_once(ABSPATH .'wp-admin/includes/upgrade.php');

        $sql_subscribers = '
            CREATE TABLE IF NOT EXISTS `'. $wpdb->prefix . InssetMagniez_BASENAME . '_subscribers` (
                `id` INT(11) AUTO_INCREMENT NOT NULL,
                `dateCreation` DATETIME DEFAULT NOW() NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB '. $charset_collate;
            
        if(dbDelta($sql_subscribers)){

            $sql_subscribersdata = '
                CREATE TABLE IF NOT EXISTS `'. $wpdb->prefix . InssetMagniez_BASENAME . '_subscribersdata` (
                    `index` INT(11) AUTO_INCREMENT NOT NULL,
                    `valeur` VARCHAR(255) NOT NULL,
                    `cle` VARCHAR(255) NOT NULL,
                    `id` INT(11) NOT NULL,
                    PRIMARY KEY (`index`),
                    FOREIGN KEY (`id`) REFERENCES `'. $wpdb->prefix . InssetMagniez_BASENAME . '_subscribers`(id)
                ) ENGINE=InnoDB '. $charset_collate;
        }

        if (dbDelta($sql_subscribersdata)){

            $sql_create_config = '
            CREATE TABLE IF NOT EXISTS `'. $wpdb->prefix . InssetMagniez_BASENAME . '_config` (
                `id` VARCHAR(255) NOT NULL,
                `value` VARCHAR(255) NOT NULL,
                `description` VARCHAR(255),
                `rank` TINYINT(4) DEFAULT 0
            ) ENGINE=InnoDB '. $charset_collate;
                
            // implémentation de données à la création de la table
            if (dbDelta($sql_create_config)){
                $wpdb->insert($wpdb->prefix . InssetMagniez_BASENAME . '_config' , array('id'=> 'dateOuverture', 'value'=> '2023-01-31 ', 'description' =>' Date d\'ouverture ', 'rank' =>'10' ) );
                $wpdb->insert($wpdb->prefix . InssetMagniez_BASENAME . '_config' , array('id'=> 'dateFermeture', 'value'=> '2023-10-31 ', 'description' =>' Date de fermeture', 'rank' => '20' ) );
                $wpdb->insert($wpdb->prefix . InssetMagniez_BASENAME . '_config' , array('id'=> 'maximumInscrits', 'value'=> '10 ', 'description' => ' Nombre maximum d\'inscrits ', 'rank' => '30') );
            }
        }
        

    }

    
}    