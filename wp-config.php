<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'pediatec');

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

/* define ('WP_SITEURL', '/'); */
/* define ('WP_HOME', '/'); */
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'xC]II(sGL;>-qhGy2S]0J-xQnW$MJ1zPPZhCE=[RnK?9`Ph<uM-H(Q=XG->yXg9i');
define('SECURE_AUTH_KEY',  'miFV9y/,_-6s]SzMA-3:M^C1H.be.7a4:]4|>Fp|d]@]5nQA)I#9e@S-bn|=|.))');
define('LOGGED_IN_KEY',    '.x1X5hH NI- H;*Y1uLgnLpf`oH0-|I*xqg;ehS%`*@&n+r=UyQdJ-[t*$lwa>ZB');
define('NONCE_KEY',        '[W;{aNK1=k[s<%cVQ0K>bc{6wAhs)J8+ib),dJK{>5luO[0aY|8lrpN|H)5W6Rw ');
define('AUTH_SALT',        ']Plr>>yn/253<3>#xaS^#.9-[ls+g-Sw(SS{!wDMx4?hUyV-oJf|,)<M_|+}IgJ+');
define('SECURE_AUTH_SALT', '3!Em?NiVD<,u+s_io5B}]BqZ]EzE;C?; hb60:Bwvqs Aw>60g;RW2UfjltFQwFF');
define('LOGGED_IN_SALT',   '(X:I>-?bt1@*Q,~NMjkM+a7T|=G=_i]m[T]oS`}WVS<?`G-i|!e|R5x@7 sEP=@c');
define('NONCE_SALT',       'ndoQkv.*xF3#WC|3Way-gCn5n^d75QyHP|ZZuoQFPzlF(+w&Xh?_tY-*bp%F.)X~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'xensy_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
