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
define('AUTH_KEY',         '4NkDdPgbcbZD/GJOhp2ANwF6zZOo8So+Z4beSdit2jsKrGECRZo8onFrPv3VuaFmhxmr6zwQxRPds49FMF4FGQ==');
define('SECURE_AUTH_KEY',  'TFNdU605TInMGWMu38td1tfEt7w2hCWH/KtA9Ja5GYZOIFr1I21G1vtXW3shL1UmjGTctvnLhnPZDbOGnT9c+w==');
define('LOGGED_IN_KEY',    'AuABKxd/6fSOUz2/kLaoOQl2EkwC7UDcScB4kcDBrFcRSAkpSEwwTEnuVIHDka28XhaGUfmilUW2iyEFC3zU3Q==');
define('NONCE_KEY',        'D+aW6f/ZQwLB46LA4l3Aq2/WX0CpRbzzotDuwZhyZQ8TvX3c0MZsRvigXHDweiQYbm/fiDaiGMsfAQTwieMSlQ==');
define('AUTH_SALT',        'KJQrK2fEfCgB2lq8AxcsLjxH0H/9rwU84/4P2BbpBtTWD9qaRfgEZ3ma7peliMRET/kkb8yh0ZnnGror6YbX0g==');
define('SECURE_AUTH_SALT', 'R3d0W6Ud91r7MHE24Ygz/Tkb6cmmwQecMS+wOwqAFLAXrnKpvuyEUws7R0xYaUzrH1G+rHI53+uLvNLHkxRaiQ==');
define('LOGGED_IN_SALT',   'tukvvsZUGiePfm5o03mlszXcuMA9aI6bxUD7TVnli4g6Vz9NhFEdnPAK2X4mnqqsDB0ig30BtRs+ipd7WhVIRg==');
define('NONCE_SALT',       'L1khR9f8joPoVfPXdSj2IWRjifbXpeQceBOkArkF2NOivvi298kg/JTcCORYJWfjPZJPOcFhzks6vOngujHfvA==');

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
