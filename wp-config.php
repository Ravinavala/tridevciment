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
define('DB_NAME', 'tridevcimentdb');

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

/* * #@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'w2bZ+UMJc{`sNw&>d-.POTKZ~X7a8AKUj4y8V9G^:NzovVbmgnb&2R mGNeCV9d/');
define('SECURE_AUTH_KEY', 'n(.V;(kHn=n$bGOt&eI<RuW-!I]>a_o;[Ldv|z=c V&;EHI@5t#5!zMb!yr2jndr');
define('LOGGED_IN_KEY', 'Zii7Rm]6TGqZnPPYJqZMj:7_<Hj}fx*HD/^b98be`Uvz;8 O`(a/)lblf7qtPfF.');
define('NONCE_KEY', 'uIFgeBS>E(nKAl>2,&x<}|A&[(JqicHMl(t-#<D)$WszRm#nm{%e=kPt:25Ldq,;');
define('AUTH_SALT', '1e:OJK@Z:R4i)dzJ0b-~fi}*w!qBG,>afA`> [,oOkBR@6.6&3K,JWs>=e >V`y_');
define('SECURE_AUTH_SALT', '/4evm!HOBrzs|^7HnImQo)@1P4e&$qMCpcpJ,^mE.(VA-^h>Tet u;-JkdZ)dH}|');
define('LOGGED_IN_SALT', 'PsMs:G@,nMToq*D@O07$9NxoeGi>hB$7lQ,!vMJ6 gquPN5tdj@PT}}c<6(|0,]~');
define('NONCE_SALT', 'XO(A{AD9]_kL){O@I{Menz:d|HBH2 ;DBLnkugH3g[F}/8]?Q1RDV1b=kl=spAkD');

/* * #@- */

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
define('WP_DEBUG', FALSE);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
