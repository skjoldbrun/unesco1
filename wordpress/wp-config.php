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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'louiseskjoldborgbruun_dkunesco' );

/** Database username */
define( 'DB_USER', 'louiseskjoldborgbruun_dkunesco' );

/** Database password */
define( 'DB_PASSWORD', 'gruppe23' );

/** Database hostname */
define( 'DB_HOST', 'louiseskjoldborgbruun.dk.mysql' );

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
define( 'AUTH_KEY',         '`o(`&-W0+}=:?QPk>p11yvB^Kox/=F[%gZG8DGTLIf3II3?9+(l2`THn@$/*<nY%' );
define( 'SECURE_AUTH_KEY',  '(9~:FZQSRRZ4SJ}F<(K]2%`(C/qi(Do^]6-<wJb~[KXv.b_o2L<#+TsEfqzRM@`A' );
define( 'LOGGED_IN_KEY',    'U|Ha(~x~lB3J=~Mb7y! mXK/bb8),?pUx8TM_83x1{[T[}RK.M-8/&$1Ib8:RG;n' );
define( 'NONCE_KEY',        'cV(C0s/u7<P}OgvrI:kCv}eK5,f2N26 u[d;KjB9%<-+6_b[K,&MBoeV6l5tCT}0' );
define( 'AUTH_SALT',        '8tCn)%f&Oe7-<.X;g0DLRjeJ)lF!ghE&D|M#qlQz;GgZv!}qJt32%m=s&+X_90rs' );
define( 'SECURE_AUTH_SALT', '|81?53HFWKFhzJtVO^f;,H}m:7,mz-Ow$nKy*:pIf_,+6=&n-$t$1)`:FkfpAYDw' );
define( 'LOGGED_IN_SALT',   '_-S2MB$#dExT`TIH3EFo}]l]r1AM3WFf|,p4V }Hr}~WppAH8`+<B]hlh1_V9&sx' );
define( 'NONCE_SALT',       'RPE~u-EFEPil2sT-A3t*kM] ^?s*rQw9Suh4jm:ILozc/;nQ;aZl-gh~G6RT7$p7' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_unesco_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
