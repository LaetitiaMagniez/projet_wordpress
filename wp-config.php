<?php



/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_cours' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'qWkas96n2phkKEI|24*0uvo-dkEeM:z1+[Z/j& Y3V~?x0KS8VkLs,W@yO|!b[ls' );
define( 'SECURE_AUTH_KEY',  'J_TM)z.6>ODgSaI9Ik6dqRX#l6qUqrcFx#8xy*mthF96?uE.UAXZ1I@]PL]S_ND:' );
define( 'LOGGED_IN_KEY',    'AxH@r>z#uXYPt,V5M3h;pl1W8j&PKvKxniHe`<Ht=h%LLj-vGlcyEz--j/@3/oQQ' );
define( 'NONCE_KEY',        'K<WUYT_((E]u.1tOL489vI(wittf}iOD3ttv9=Rv2o|6WviyPsw@W2Lx=JvdobF~' );
define( 'AUTH_SALT',        'W42~n9T&{FJgRUNBI> 4`<MS]}HWA<I?}om3ZN8n; r.2D_RyfMCUco=T<cEl@6[' );
define( 'SECURE_AUTH_SALT', 'h)I;x#pK0b#xC_xzx<6h*WR}xr[( wu%~OiU2Up<Q$_Juv*TkAsa-O>XW{RM&6W]' );
define( 'LOGGED_IN_SALT',   'wTir2PpVZdi}gD&D=9geQmSfr2jS*!<?@av_97ysx^MV}_p,%JI}9y;8tO={/3ly' );
define( 'NONCE_SALT',       'P%A)uhB)P74-lPYP7<$43v2NAi:v%U(^CBT!`Dx=z)>%(hF@GVd(8%KKm^f$w,S8' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

ini_set('display_errors', false);
error_reporting(0);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';


