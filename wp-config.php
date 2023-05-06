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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'elect1-db' );

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
define( 'AUTH_KEY',         'ID`G~d;ms#h ODyg5(9_mKAR.R@:]f%OBT9;,2+/)C?fE=ntxx!{^1[|CW{0ZNSg' );
define( 'SECURE_AUTH_KEY',  '-1SH2r^n(S++L_PMa%](=D!>?K5d#FV.C0XoVM3yci/lc])J2Ei+nj`[[Bl~kjK5' );
define( 'LOGGED_IN_KEY',    '*q~8e1[Jgb)U#x=m>Vi8UG[7g`gF1t&{}r/O-V{w1%b*A~GPoB<q&wgkF+n67K4r' );
define( 'NONCE_KEY',        ':IW9[/#hu bpD+*M?ynK66!pyAiS=+dOGCAfglNb~)c2rMtOBje;.nZOG-E&~= i' );
define( 'AUTH_SALT',        '$u:ghai@Q#GYJ7;F(|x5N!-BuJ6qxSJ}Go[E}b+jM!p@E<MQ|saw-<rNoM=H(*{-' );
define( 'SECURE_AUTH_SALT', '7YUHch.1<6^)O<FU)q$hX<iI:)Y5>1+x0AG!q(6XVu4<C-dVCOGXz`=/%sK0S$-9' );
define( 'LOGGED_IN_SALT',   'DK9*g48v+Z8i<!uqZX-zVLkH{JG{W,Fo_c(Yx+gsGa^=~UwFB20CJ(!g2Ybj)>K8' );
define( 'NONCE_SALT',       'w*.~]N;N7?(Y!P*3GTlRm.i``UjuuZ[qkv(}=A&&a;NXg~{<|H;KTbo=u6zIQzE<' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
