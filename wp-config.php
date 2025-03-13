<?php
define('WP_CACHE', true);

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
define('DB_NAME', 'prodeco');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         'Dx=]2<Iu<uXx8VOpv|J+e5OgwJm+n@@mbQ:gC0{&[>K]>nTa0;:w]z#o+vpz3oOv');
define('SECURE_AUTH_KEY',  'qj{Im/n5%&e&4F8_8Kf <Y4=eQ/6=iW#15[8jL@}AH<m_)7G9=OO!%N_PwBP$y5/');
define('LOGGED_IN_KEY',    '{#V(KaZ-eP+O_Xy+:BhYBZ{d M>o e!xzmML,|QcX,X&CrL15M)K@VoW1^r1j%HO');
define('NONCE_KEY',        '-o{WIM1rE0DJ=s;~IR*>t~!*8)_ru5Z1Qy|+;3t+Vk1^a*Mk?3{C8%#W:s*[I3TC');
define('AUTH_SALT',        'zheQlx2Iq~F`3-Go+8L99w?[!QkTeUVf>2Z*;Vz/j3W|*/0iM-I.;rOHaXVLqm,D');
define('SECURE_AUTH_SALT', '*:o^b95iPA<MakpN@$R8r#8N[_~;!K9lTvQMnD;_,t^RIen<@HWQdZMby-4=:_XY');
define('LOGGED_IN_SALT',   '+aNjz)()pde VTdGM_}*b75QG9|q5%e)-|v~GLzG39AZ`/HO}$7#v#iKOWNBV;rU');
define('NONCE_SALT',       '?94Hr@,WEZKlA)~%n!ExmUaUvR wR/FTlZ6]jaVug,) ^[;k#O4b)UMU@F/Uu,^]');

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
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
