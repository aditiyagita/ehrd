<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'aditiyag_wp917');

/** MySQL database username */
define('DB_USER', 'aditiyag_wp917');

/** MySQL database password */
define('DB_PASSWORD', '82.1PodS@e');

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
define('AUTH_KEY',         'psrqmfkk0qgn3kwz5ti23zcfutvfabubdp4yhuks35nc8eq5vvg2ukuvbmi9y0mm');
define('SECURE_AUTH_KEY',  'zbkkf08v9kcrmlfobjtkhp3x9rbl57jeh25rtc6uqy95ksskgwexehtk63ab9hcn');
define('LOGGED_IN_KEY',    'tafdxm8nifufpkc93kxlzzjeik1wglwixgg7uqi5kmgqtdlkttrnyxvz5cnztx5n');
define('NONCE_KEY',        '5ts0knqsvm9zbtxziz6syutk3er93a8scxwtoptkyg88hpl2brxhxe8qlxznnx4d');
define('AUTH_SALT',        'rrzjonkfnkeds6exwxhwrszetlkhobargfbltspccrislebvmseud6eg2bopeuyy');
define('SECURE_AUTH_SALT', 'tu9zugmyiajplkdai02nujgyvbp0yuz6xreqxw8dzp6bldccct969ojk3i3areuv');
define('LOGGED_IN_SALT',   'a3tly5kfre3elf1y3qbkgrpfbj5oid6f8od8dweyao4dcdhkkhk394bpddq8tj0t');
define('NONCE_SALT',       'pnymcnylem6w73cwku0paesacclpdscsz7ptq9hyjv1uoi6zqrq25p9htf4gooqv');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
