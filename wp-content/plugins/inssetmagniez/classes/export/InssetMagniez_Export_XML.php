<?php

$path= __DIR__;
preg_match('/(.*)wp\-content/i', $path, $dir);
require_once(end($dir) .'wp-load.php');

global $wpdb;

$sql = "SELECT A.*, 
(SELECT B.`valeur` FROM " . $wpdb->prefix . InssetMagniez_BASENAME . '_subscribersdata' ." B WHERE B.`id`=A.`id` AND B.`cle`='firstname' LIMIT 1) AS 'firstname',
(SELECT B.`valeur` FROM " . $wpdb->prefix . InssetMagniez_BASENAME . '_subscribersdata' ." B WHERE B.`id`=A.`id` AND B.`cle`='lastname' LIMIT 1) AS 'lastname',
(SELECT B.`valeur` FROM " . $wpdb->prefix . InssetMagniez_BASENAME . '_subscribersdata' ." B WHERE B.`id`=A.`id` AND B.`cle`='email' LIMIT 1) AS 'email',
(SELECT B.`valeur` FROM " . $wpdb->prefix . InssetMagniez_BASENAME . '_subscribersdata'." B WHERE B.`id`=A.`id` AND B.`cle`='zipcode' LIMIT 1) AS 'zipcode'
FROM " . $wpdb->prefix . InssetMagniez_BASENAME . '_subscribers'." A";

$inscrits = $wpdb->get_results($sql,'ARRAY_A');

ob_start();

header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: text/xml; charset=UTF-8');

$xml = new SimpleXMLElement("<?xml version='1.0' encoding='utf-8'?>\n<Inscrits/>");
foreach ($inscrits as $inscrit) :
    $i = $xml->addChild('Inscrit');

    foreach ($inscrit as $key => $value) :
        $i->addChild($key, $value);
    endforeach;

endforeach;

print $xml->asXML();



$filename = sprintf('Export_InssetMagniez_inscrits_%s.xml', date('d-m-Y_His') );
header('Content-Disposition: attachment; filename =" ' . $filename . '" ;');
header('Content-Transfer-Encoding: binary');

ob_end_flush();
