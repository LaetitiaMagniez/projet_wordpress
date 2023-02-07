<?php
/**
 * @package lm_projet
 * @version 1.0
 */
/*
Plugin Name: lm_projet
Plugin URI: http://wordpress.org/plugins/lm_projet/
Description: Plugin choix de voyage, projet wordpress
Author: Laëtitia Magniez
Version: 1.0
*/

if (!defined('ABSPATH'))
    exit;

define('LM_PROJET_VERSION', '1.0');
define('LM_PROJET_FILE', __FILE__);
define('LM_PROJET_DIR', dirname(LM_PROJET_FILE));
define('LM_PROJET_BASENAME', pathinfo((LM_PROJET_FILE))['filename']);
define('LM_PROJET_PLUGIN_NAME', LM_PROJET_BASENAME);

foreach (glob(LM_PROJET_DIR .'/classes/*/*.php') as $filename)
    if (!preg_match('/export|cron/i', $filename))
        if (!@require_once $filename)
            throw new Exception(sprintf(__('Failed to include %s'), $filename));

register_activation_hook(LM_PROJET_FILE, function() {

    $Lm_Projet_Install = new Lm_Projet_Install();
    $Lm_Projet_Install->setup();

});

if (is_admin())
    new Lm_Projet_Admin();
else
    new Lm_Projet_Front();