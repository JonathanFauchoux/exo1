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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'exo1' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'hk.6a:]Va^K~Zn}L.,d=e L]rmE3zL;3AVEiX~P-2n)hibN))~jn&;0Q0l3fZ(I3' );
define( 'SECURE_AUTH_KEY',  '$HgpEosGSof]h<JYmA&yp;{PwZ#g 8C5#eDP}!c~a-=Pl<VBY0/&t_]14z{34y> ' );
define( 'LOGGED_IN_KEY',    'O1NCEzFZjM1tX@Nn&5gK3D, 6L&wN}HOvw8GCF-?g& cr3QSE7lz%Bl!!hY[%.)!' );
define( 'NONCE_KEY',        '4M]imdV|v8>kn:QtMUO94{O0><ev6J(YYTS`9}Bsv8>>D9XjBfUj(l%b*<b .p#s' );
define( 'AUTH_SALT',        '$.3{,GtMF3kwGvJj;,2`g(-a,rdM.fEU.gBeKs%_Ry)(zhtNl{XTVNN =9)RZXdU' );
define( 'SECURE_AUTH_SALT', 'DTE$o ebs|tEYimF|_,p.#n.ury/JwCxA%XzBT+;j^B[IuDt$)x8MipNgGQN3.7I' );
define( 'LOGGED_IN_SALT',   '~=?6zpxK9Y=d }ngRImE@dN_3Vcf~7i`K/A.,yu$+)}dAfpJ1h%]vm4s-dN71leo' );
define( 'NONCE_SALT',       '_|./<bELX(~TZ|71ONpEmb:SZy;SD3+~ZNQu08e02&(~`+px>FaRG_<2-^o_r,6F' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
