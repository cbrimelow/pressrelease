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
define('DB_NAME', 'mampwp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'y,@20KF]cr w@pZ;,~{lnM;c:<X:qp:HbWHa i@|?A{T]k>&k!eS)[6nG&n8OzG6');
define('SECURE_AUTH_KEY',  'MctHt,-|2Wo=y&shZVu^G$^7]wwR4uaI7oc$yP5_)fAkr0Um)&+mEl5}v<eqQgd!');
define('LOGGED_IN_KEY',    ']S,eK+rh:vzl,SAE?96W)ugrfwmKj^^+|; n15=RIQ6O2*7kqMoGD`]UWe2+^AwD');
define('NONCE_KEY',        ':@Uy,;$Tw!d})pl{T7(KGYh=p LD8nb&kphmWpS76O{q}aTbglEj F;rLa{NOhI3');
define('AUTH_SALT',        '4+:O]fGo3-RLP}m|~@}bC1O|Tq^Bo?8!aN`?kw]4`<;R+54Vk?8YDK6E{;9J~A1x');
define('SECURE_AUTH_SALT', '[svt!snSaz8;|b}34w1i^,w(Jf9!_Z}OpG)KO{DJAvK}P!iCD(RdRImQ22iwM~_k');
define('LOGGED_IN_SALT',   'jogDduy7sI:wGp.@p}[p7dA{=S<_n)pNt=:Yn[vu#(%_]mqq>{>z~w*n {#{O1KW');
define('NONCE_SALT',       '5~lk4`7[Cy2sj,-=CrvkZ=k(=h117|$DuecBoIx1Bh@j7#I^LfZi/7~)(`3~f]O;');

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
