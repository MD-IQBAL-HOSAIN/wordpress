<?php
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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_first_project' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         '`ixR;T{;;%0f^AB*coN@`a?fn+G<;&}a2,cZ?C_!re4at3El~4WSLl%b<f>CM88&' );
define( 'SECURE_AUTH_KEY',  'J~(h7F]M&IpKkz2RXI 1w(YfqPUp@|;|DqjN=Uc#}Xj} 8tCZvmj{iZt8ZJxJ7}T' );
define( 'LOGGED_IN_KEY',    'OkUnRs8ok{_q/}1_Nzk;gk6z($A1wjv6M7s]SgGkQ@U*:qRtY7&50:*_Qcybo@?o' );
define( 'NONCE_KEY',        '<0K(jWp7.^4B(io&^_m3yqT;K???];j[aJ`ZtG^b#;vr/AC0ZJq)aAhQfCeku((;' );
define( 'AUTH_SALT',        'x~/R$))JI<Kc@0:T agA0YOK]z+2Hq1c~1MXG<2r]4c?eqV/.o]NX.F1AC&^@%d/' );
define( 'SECURE_AUTH_SALT', 'YR7l>2|wwxDABhGL)|e#<T-j$X2?Y/[neq.$G.Nk2$hwjBu6Bm45Lnyl%$n$B~} ' );
define( 'LOGGED_IN_SALT',   ']Q@G(oSb(zm51AF!pw&#eayz##]fjpMfQEY!gW>g%SI0e![D@nQNdjB!$tr8m`Td' );
define( 'NONCE_SALT',       '3=o*kcpN]#V.ksFTV3K*@;.p,jn_edgq;470{7u_ 3bjRBm%O@y+9/G}Z+-n/nz/' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
