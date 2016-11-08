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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '111111');

/** MySQL hostname */
define('DB_HOST', 'localhost:8080');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Xl @uAfpV[|,R @uxey0zO8dA{jLJe_l8b:<K{$(7x+(JO[Mw?~yl/YD#oQyJ#,`');
define('SECURE_AUTH_KEY',  '}P7N]F!{,]aUfKm20t8dEYLORJtfUWC3Ll835^akk$ Q}y$(~WK%eJ$iu!lsM<Q.');
define('LOGGED_IN_KEY',    'E[pmy$osFy.)$n;p|FGG2{be:# 0sHQO*m90Q$m1%YG$_N1|>_`_56{>!9+Boq;?');
define('NONCE_KEY',        '/e`nAXnvFGq#N=4HsXnWEd0$AD7W)r<5!QwgX2|od3JV  t`+OQ=Bj=L(GliiCn5');
define('AUTH_SALT',        'rQ8x.!jRQn1@2`AO$Jt}`H2[|y1( [[[.-E^egLD7{vpVr%w ?-+L&Y{t6~yYtTn');
define('SECURE_AUTH_SALT', '5tlL+VB2 al.9i<ck!oO`2+Hjk*iNh5 RHG,4.`9lGPRR(4HIb.>CS:}%S{AN=T4');
define('LOGGED_IN_SALT',   '.?Jx2DhH@?4oR#G a}y4.=gVjcu;0#t&c{_eLjnm]!cXmWySFIXn5BI+hIunH=/X');
define('NONCE_SALT',       'i>mtMAWJhT[{-=Mw4;x]u~M&L]Cn5={/<ilVb_ffpSsv8JNU2?pI.#pt8N Y%|57');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
