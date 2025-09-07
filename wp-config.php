<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '-3w>hq/3@LuDQsA!5]A=c<!u/buB[efA7~p=IE8kTLw/rPGn*@/OXiiuD{/Q68}@' );
define( 'SECURE_AUTH_KEY',  'mwhzK--2*ml<^S&0ei?4wS8#(,Y3LkL]!a==`#|x]6oTABw[hS(/P B]q6}d@(Hp' );
define( 'LOGGED_IN_KEY',    '^oM:6Ggvb#L*2B,vT%w,&kG_VVGWI.YenG@;srv(C1on^*mQ)I3-Jp].8S{x49z&' );
define( 'NONCE_KEY',        '4tnCCh8ifAEqRNAo^1LP|#qS7^{#;(Ai#!!,f-tJ48.-[0F 2l~gwPJCX1-4ry v' );
define( 'AUTH_SALT',        '%H8Zx&S9+Q5B[!a6tO >mV  QpV&^wV:1@9$1>GK_~|=oM]Qz[r:`upxw_#t3r .' );
define( 'SECURE_AUTH_SALT', '[{k|uL3lTH?W5<?:p}9!x$Ez?sF*(; s`:-nf]DeBj64 SDI/fD7iX2 *;Aor/<K' );
define( 'LOGGED_IN_SALT',   'b-lyZ@e~#}Q4*)7GT_b`KOsRMqm!*6*;Ibd*Gqa~#J{T:QzyK/C*NbMA*]-9hEHf' );
define( 'NONCE_SALT',       'NFaoo=nT]JfW~:,x<At7;)5jvMSMT+w<$1##T WT@!$:w=SU_IY)aL]FhqaEA|=N' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
