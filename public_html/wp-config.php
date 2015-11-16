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
define('DB_NAME', 'honoroad');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '8t}W.8v/uJ{>J`<QpTZP3}m}Y;=W,=yZ X1#+:`.MD2%(|+~@5K@|M5x?|aMk%-+');
define('SECURE_AUTH_KEY',  '|lfo|:nvC~%b_3{8q~R?-[8ubTF}*%Ni# ;>eiUu}]4(|15wy^+pJ$7lE[A(8kEa');
define('LOGGED_IN_KEY',    'O;hxaDd|{WTd+^BE!+Je}cj${$<:E&$boabZT5ypQo5;O|s+&9hdNzX;iB+;,r-%');
define('NONCE_KEY',        'rf<S+,%<51/];UXp:p7Erq6!Oh>zVQL8toE2@d,q9-z0{MgkFz/7,!!7K. CJdZz');
define('AUTH_SALT',        '[r7V`C+DKO!Bdak9nOmxk_&B59Y)1_aM>n%5|~u oE|u6,s0fF_)}M`9xZdBsA7b');
define('SECURE_AUTH_SALT', '` |Ym`$EB6_yc=1h2LDCCa@hpV%|=Z42Y*2WisC&8!^CM+UBdl3Zd?2#E.m|U@PV');
define('LOGGED_IN_SALT',   '!c|Jd*n8j9BKMx|J_YVoLz7cIfdB)z@GRQ?iu2w11KxGZ:5G-njv^ZIt{86_BqO>');
define('NONCE_SALT',       'u(jE`#Rza6hn7`USuD`3aF- ?&ZLd:Q~At9N15AxckUJe=.b6@a<CR6]x1m@-_j6');

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