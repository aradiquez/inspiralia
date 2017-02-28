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
define('DB_NAME', 'inspiralia_wordpress');

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
define('AUTH_KEY',         'yi6oqL(pHpyH/+UqUz+F?{L&`K1SA.sZe+y{VW?Szm|N4.RqeB$(t:XfxVjn^ExH');
define('SECURE_AUTH_KEY',  'vwM ZU<4cL!j^*MQ7qMbp3cC3,Pp Hh67|x36(oDL#9.Kr4f)M(F-dUw$V4<=o{<');
define('LOGGED_IN_KEY',    '>G$Duc.b:@@9dsd3{7%RRMbdE|I}:$$.tdOH|)ru 6BR{dX%-VBZ*F-qu&<v<`gb');
define('NONCE_KEY',        '4/C+|/e@&+AVGC#vjrF^gE|Kk&Qi%t6V9n9Y0NT|4ilc:a,i^ VBA?1Q8s8q)hd8');
define('AUTH_SALT',        '=KV^))as&1J5q-fK>Je$;N&+~?6f7cin.))p!Dmg}dHs3Y3qcL~$NvST~?[LaJ]-');
define('SECURE_AUTH_SALT', 'R;o33,0QkIKy*E|<^#,51Sv+8n`eX/}DG)H7)m`jo7zAKJoP(5|[O@x[bpUt8%Fo');
define('LOGGED_IN_SALT',   'n$A)g(+U~n%-(Y-s=HZ-`7g.UOy3J}/U>L8PE0K#IDZ5IsqVjb3I+zAi$-:#~vRb');
define('NONCE_SALT',       '>:sw1WGvU%1>FBwx{h4llNf;noIO-n7VWol0fp;(JE h;IG)?vW+nL4!6;8[r%X-');


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
