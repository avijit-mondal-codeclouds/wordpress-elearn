<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'custom' );

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
define( 'AUTH_KEY',         'R#|*Pm164x<!7/SHbnj;G9(;;yfF0zs[~~i:*=Yx|uwADy!&%kb#8G.9tw%VIJ`,' );
define( 'SECURE_AUTH_KEY',  'Fyl-mi=i_`ftYl4b09F,q[/D@YTC,byu Q7K-q_u%xDyO@Iyq2RLa)zn~@vm-xb3' );
define( 'LOGGED_IN_KEY',    'L0/_R4cj1$BCzqk{9|N ^z?I1@Pi29e^C|^I3|$atMJO b7GCMgl9>l$^Hc@xkWL' );
define( 'NONCE_KEY',        'nSy?yp491P{*h~,Q~&8PZQ7+O_)]b,4C?Z{N)+;F}]%Gn;GWxZQ&78|rM#$TDN,X' );
define( 'AUTH_SALT',        'A{[?`:>P!+*xZPXwTmzqr(W{i*k;PQ.B/]QT>&B72Wl7Js[gl2Pjk*GQy~,|p:1I' );
define( 'SECURE_AUTH_SALT', '=qtT2:&(R`5o@pqEXJ%X~(|aJ.3c* uK#WFHUqi,IHfMHt0[=VHgmUxO]^td0U35' );
define( 'LOGGED_IN_SALT',   '-<,~]dCjMlc +ld!XYAf+aAIYu?m=s$BIi,=HI^OWe9?n^v{7W&7i:{uq%A]S]E*' );
define( 'NONCE_SALT',       '8=dP4a1iUB(O3n#.269]oNOq 4](@:!8OpqzCeD<W+S{iCcSy%E]nyXlav7ClZdY' );

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
