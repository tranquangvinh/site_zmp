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
define('DB_NAME', 'news');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '7 n!a5Kx=v$9r~?(k8|0j>Jj0GcVVw:7,S;-NxKGOEzo3B1_no*$(@XZvlL%R%K&');
define('SECURE_AUTH_KEY',  '$!i=wU:3CLw4f,[hk ^,^,vvZ_[?R*f)hryu!%P|&/(>!(^0^rt^cpucTOXWA4um');
define('LOGGED_IN_KEY',    '~o~AV+.im%V/_|@P.3=f1dF-qb$JLdAe$V3MD8^+I}b|?,l4?8^lcP*Jp#T_0o4n');
define('NONCE_KEY',        'gVgCKo7Jvb4=tC!Yz{z!E`EB6?rWLI3]?]Vga7Xx+d_nbHm fbI,!Wg+&).?C~.#');
define('AUTH_SALT',        '?/TO%dneYnTButU+l`::DkcO tj(R-PD:00@oB6)ea~*noVdqc>DoJZ4>DUhn<VS');
define('SECURE_AUTH_SALT', 'N}sp=PnO:4;>7KN S&Yc[V/H5?QTw^yBTH!w-r-CBI?e5?YzKES;W{`=h?&b!DT&');
define('LOGGED_IN_SALT',   '~}nVaV+b6y1rybphbH1@K/Ob| <&JqDQoSAJ>e31DKy07H43hp3D2^L%*qs3-LJ`');
define('NONCE_SALT',       's+1vKgAvQLLoO>!*hwtP69xW,kmJcc{bO@|%l2?T9k:bs&4PeVIDq$/OA01ax4}5');

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
