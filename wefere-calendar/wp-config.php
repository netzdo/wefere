<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
setlocale(LC_ALL, 'es_MX');

define('FS_METHOD', 'direct');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wefere' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '{&_jU-u|QTs!EaquEPVCc1vZR,vlE~Z .e-*th!K1hMmpC3T^:t#fDLXn5C{xx<v' );
define( 'SECURE_AUTH_KEY',  '62Oy_kI|$Ki/m3cF`C(*?IVRqviBU~Kh%@Rr3?lmB<kG:S1DT#a[tK|kVX<lU;]U' );
define( 'LOGGED_IN_KEY',    '(q5lZZ5*6NUSHb7.?^b1FTm8u7Dd=?$Q7G];k%uu1*eK5{[7yiiE>Ik!0:i1+zAs' );
define( 'NONCE_KEY',        'opBux#Z{eh`[e[yxjR{}?4DgW)+#@/kdlw9}=H,ICDLr4E[?]M+K&/nTg:=5rTD{' );
define( 'AUTH_SALT',        'qs.!DDng~K!h# jS`9^GzjSP19}*9w$Zvv0`tD9|bTrLb~1C!,IQ3(X,.D}jd7x&' );
define( 'SECURE_AUTH_SALT', 'w6l!p?RLqp%,;/xB@`2xCz`[|P.h8g_|Ja17g#k/>{}aPc[xGCb7OosObdM_}%LH' );
define( 'LOGGED_IN_SALT',   '=8KK.}Wf`ZoJSnz<EEGW fedpM;Iuq&LIgwo$1PEfqt&l~$}nY>F{ccN?!Q{3rB:' );
define( 'NONCE_SALT',       ' WdG_NpAl8_4M]3g@pQfrud#8:D+2Z{U,TQ@.*%a&D>H641i](&qg)R4{?UcbTW,' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wf_ca_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
