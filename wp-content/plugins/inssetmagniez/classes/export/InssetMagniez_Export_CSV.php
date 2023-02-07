<?php

//CSV = Comma Separating Value

$path= __DIR__;
preg_match('/(.*)wp\-content/i', $path, $dir);
require_once(end($dir) .'wp-load.php');

function trimming(string $val): string {
    return trim($val);
}

global $wpdb;

$sql = "SELECT A.*, 
(SELECT B.`valeur` FROM " . $wpdb->prefix . InssetMagniez_BASENAME . '_subscribersdata' ." B WHERE B.`id`=A.`id` AND B.`cle`='firstname' LIMIT 1) AS 'firstname', 
(SELECT B.`valeur` FROM " . $wpdb->prefix . InssetMagniez_BASENAME . '_subscribersdata' ." B WHERE B.`id`=A.`id` AND B.`cle`='email' LIMIT 1) AS 'email',
(SELECT B.`valeur` FROM " . $wpdb->prefix . InssetMagniez_BASENAME . '_subscribersdata' ." B WHERE B.`id`=A.`id` AND B.`cle`='lastname' LIMIT 1) AS 'lastname',
(SELECT B.`valeur` FROM " . $wpdb->prefix . InssetMagniez_BASENAME . '_subscribersdata'." B WHERE B.`id`=A.`id` AND B.`cle`='zipcode' LIMIT 1) AS 'zipcode'
FROM " . $wpdb->prefix . InssetMagniez_BASENAME . '_subscribers'." A";

$inscrits = $wpdb->get_results($sql, 'ARRAY_A');

ob_start();

header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: text/csv; charset=UTF-8');

//entête
$heads = array (
    'ID',
    'NOM',
    'PRENOM',
    'EMAIL',
    'ZIPCODE'
);

//contenu
print ' " '. implode ('"; "', $heads) . "\"\n";

foreach ($inscrits as $inscrit):

    $inscrit = array_map('trimming', $inscrit);
    //var_dump($inscrit);
    $fields = array(
        (string) $inscrit['id'],
        (string) mb_strtoupper($inscrit['lastname'], 'UTF-8'),
        (string) mb_strtoupper($inscrit['firstname'], 'UTF-8'),
        (string) strtolower($inscrit['email']),
        (string) $inscrit['zipcode']
    );

    print ' " '. implode ('"; "', $fields) . "\"\n";

endforeach;

$filename = sprintf('Export_InssetMagniez_inscrits_%s.csv', date('d-m-Y_His') );
header('Content-Disposition: attachment; filename =" ' . $filename . '" ;');
header('Content-Transfer-Encoding: binary');

ob_end_flush();