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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'aquaticplants' );

/** MySQL database username */
define( 'DB_USER', 'aquaticplants' );

/** MySQL database password */
define( 'DB_PASSWORD', 'aquaticplants2019' );

/** MySQL hostname */
define( 'DB_HOST', 'db.aquaticplantsunlimited.dreamhosters.com' );

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
define( 'AUTH_KEY',         't!4d.=<j<kf:$fL[Dmf.Yiu{!M[r:x1<w1M=]uT.Yt?, !uYVseRE$)O-YEt_sN&' );
define( 'SECURE_AUTH_KEY',  '[}axwN1H=le ~l+TnF$/tvhvOSYpj=MnL$On+?qO,%vsXVqJl_AG@a5^wQ3AsIfS' );
define( 'LOGGED_IN_KEY',    'AJ,-[*S=HEBD:$65YCuSYXx(S.uZP$ab0Kh;aw$7-rCsLKX~PA/4*jWxu/ukw|%s' );
define( 'NONCE_KEY',        'EF_Tb_rERacVUM|>|/@~|(-6-z)t;Y?juId*|0xuqaj,5X32@6]}]xUN?OCEVH1]' );
define( 'AUTH_SALT',        'l${qYc4Oa`jgZW%rMF_(FsF*&b|kD5`]h@_)f{d%v(b_>)J GJu`9N#g=L!kAf)F' );
define( 'SECURE_AUTH_SALT', 'rpV_%@ShX}5maZx-S`%Kp-c}ik&o=/8z%}(o(mbms:J.JF);|c{PukrZJED-QE>E' );
define( 'LOGGED_IN_SALT',   'pV~U._<~`DG|R-]CgI=3&*1xMFG(O.rO[2uyx3dg[xMF_Ee{y0-k-S*Wx.F&w(=#' );
define( 'NONCE_SALT',       '5N]9<>3C{^EgLq4<g!@J1uK-:L81H9pB7Y.(ltmORw!!DM l?*`A<r;|h&{A.=#Y' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
