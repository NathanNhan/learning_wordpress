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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Bn/rhY/eHHn2KYIzDrfEbLR74s3jrxX0OPmCIKYT57ipCLulmSsUX05ALCmzoeasb5J+NZphKHOqdys8HfTghw==');
define('SECURE_AUTH_KEY',  'THZ0GpcBNBUC43NeALIgFbegKdW5evU7heux6jbIh7Rdxsb2JPX5FfvPAv+NMNYOpud+GjRXuY+QNzi9HQnsKw==');
define('LOGGED_IN_KEY',    'FEzssVMaMxusiUm3HKZX88QDk5G4v2VkThMsqE2y2RZ7z7uxozXGfA1CbzFqA5B+Ely99S5Vy7T/KttE+1nwRg==');
define('NONCE_KEY',        'aDKaESKCCYNda7OdTq39c8cDDIlXNbxqa0NbWl6LzFC+ldRAZOA0EEg373lmecXUItGM0ytTSCttJelWaPkbGQ==');
define('AUTH_SALT',        'HN65+pOTvJ5EKnztWXtlLZBjVVX3KunISR5qPNxLfSSjYp9EM/Kg9yhRMmPnDhI+jR4sVeTSiPl2cXLcJxoHrA==');
define('SECURE_AUTH_SALT', 'KCC+OwZDS7TyYg0g5lcZofTOAjXfDXOZa4j8fQmJQ9zd7i1/TcgVtPBi9xo2toYLIYQD7zjKMqY28t+s8UcvWQ==');
define('LOGGED_IN_SALT',   'ldwM36ez8kElmfsFvmNEhsYvzZ+ffqHK07dpioBbiOnAtF0JI2LUQYnrEzi4ecucuT8RVNSgpMLBEjis3hFidg==');
define('NONCE_SALT',       'W8lwZY8tXGP8m133g3EQRhw8tUYSyOwSOJnE15JxmHsxsEc8MlR49YTx3+11gVv9grtmqarSFZW74+Ldv7Y6bg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
