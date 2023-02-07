<?php
/**
 * @package INSSET_Magniez
 * @version 1.0
 */
/*
Plugin Name: INSSET Magniez
Plugin URI: http://wordpress.org/plugins/insset-magniez/
Description: Mon premier plugin
Author: Laëtitia Magniez
Version: 1.0
*/

function remove(){

remove_action('wp_head', 'wp_generator');

}

remove();


if (!defined('ABSPATH'))
    exit;

define('InssetMagniez_VERSION', '1.0');
define('InssetMagniez_FILE', __FILE__);
define('InssetMagniez_DIR', dirname(InssetMagniez_FILE));
define('InssetMagniez_BASENAME', pathinfo((InssetMagniez_FILE))['filename']);
define('InssetMagniez_PLUGIN_NAME', InssetMagniez_BASENAME);

if (!defined('INSSETMAGNIEZ_ID'))
    define('INSSETMAGNIEZ_ID', 46);

foreach (glob(InssetMagniez_DIR .'/classes/*/*.php') as $filename)
    if (!preg_match('/export|cron/i', $filename))
        if (!@require_once $filename)
            throw new Exception(sprintf(__('Failed to include %s'), $filename));

register_activation_hook(InssetMagniez_FILE, function() {

    $InssetMagniez_Install = new InssetMagniez_Install();
    $InssetMagniez_Install->setup();

});

if (is_admin())
    new InssetMagniez_Admin();
else
    new InssetMagniez_Front();