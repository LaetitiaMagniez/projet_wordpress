<?php

$path= __DIR__;
preg_match('/(.*)wp\-content/i', $path, $dir);
require_once(end($dir) .'wp-load.php');

global $wpdb;
$table_countries = $wpdb->prefix . LM_PROJET_BASENAME . '_countries';

$sql = "SELECT * FROM $table_countries";

$countries = $wpdb->get_results($sql,'ARRAY_A');

ob_start();

header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: text/xml; charset=UTF-8');

$xml = new SimpleXMLElement("<?xml version='1.0' encoding='utf-8'?>\n<Countries/>");

foreach ($countries as $pays) :
    $event = $xml->addChild("Liste des pays");
    $iso= $pays['code_ISO'];
    $note= $pays['note'];
    $accessible=$pays['accessible_majeur_uniquement'];
    $disponible=$pays['disponible'];


    foreach ($pays as $key => $value)
        $$key = $value;


    $event->addChild("pays", $pays . " " . $iso);
    $event->addChild("note", $note);

    if ($accessible==1)
        $event->addChild("accessible_majeur_uniquement", "oui");
    else
        $event->addChild("accessible_majeur_uniquement", "non");


    if ($disponible==1)
        $event->addChild("disponible", "disponible");
    else
        $event->addChild("disponible", "indisponible");


endforeach;

print $xml->asXML();

$filename = sprintf('Lm_projet_Export_XML_%s.xml', date('d-m-Y_His'));
header('Content-Disposition: attachment; filename="' . $filename . '";');
header('Content-Transfer-Encoding: binary');

ob_end_flush();