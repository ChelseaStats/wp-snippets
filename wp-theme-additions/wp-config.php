<?php
// A basic wp-config file with added goodness


/**
* The base configurations of the WordPress.
*
* This file has the following configurations: MySQL settings, Table Prefix,
* Secret Keys, WordPress Language, and ABSPATH. You can find more information by
* visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
* wp-config.php} Codex page. You can get the MySQL settings from your web host.
*
* This file is used by the wp-config.php creation script during the
* installation. You don't have to use the web site, you can just copy this file
* to "wp-config.php" and fill in the values.
*
* @package WordPress
*/
// ** MySQL settings - You can get this info from your web host ** //

/** Stop post revisions */
define('WP_POST_REVISIONS', false);

/** Define caching */
define('WP_CACHE', true);

/** The name of the database for WordPress */
define('DB_NAME', '---');

/** MySQL database username */
define('DB_USER', '---');

/** MySQL database password */
define('DB_PASSWORD', '---');

/** MySQL hostname */
define('DB_HOST', '---');

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
define('AUTH_KEY',         'GiThUb_KeYs_AnD_sAlTs_AbCdEfGhIjKlMnOpQrStUvWxYz_0123456789########');
define('SECURE_AUTH_KEY',  'GiThUb_KeYs_AnD_sAlTs_AbCdEfGhIjKlMnOpQrStUvWxYz_0123456789########');
define('LOGGED_IN_KEY',    'GiThUb_KeYs_AnD_sAlTs_AbCdEfGhIjKlMnOpQrStUvWxYz_0123456789########');
define('NONCE_KEY',        'GiThUb_KeYs_AnD_sAlTs_AbCdEfGhIjKlMnOpQrStUvWxYz_0123456789########');
define('AUTH_SALT',        'GiThUb_KeYs_AnD_sAlTs_AbCdEfGhIjKlMnOpQrStUvWxYz_0123456789########');
define('SECURE_AUTH_SALT', 'GiThUb_KeYs_AnD_sAlTs_AbCdEfGhIjKlMnOpQrStUvWxYz_0123456789########');
define('LOGGED_IN_SALT',   'GiThUb_KeYs_AnD_sAlTs_AbCdEfGhIjKlMnOpQrStUvWxYz_0123456789########');
define('NONCE_SALT',       'GiThUb_KeYs_AnD_sAlTs_AbCdEfGhIjKlMnOpQrStUvWxYz_0123456789########');


/**#@-*/
/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = '---_';



/**
* WordPress Localized Language, defaults to English.
*
* Change this to localize WordPress.  A corresponding MO file for the chosen
* language must be installed to wp-content/languages. For example, install
* de.mo to wp-content/languages and set WPLANG to 'de' to enable German
* language support.
*/
define ('WPLANG', '');

/**
* Forces all logins and administration to be over SSL
*/
/* define('FORCE_SSL_ADMIN', true);

/* avoid wordpress options for some basic settings or dynamically from the $server variable 
this is rumoured to be a performance enhancement, but benefits are almost non existent for
most users */

define('WP_HOME','http://domain.tld');  // no trailing slash
define('WP_SITEURL','http://domain.tld'); // no trailing slash


/* style and templates */

define('TEMPLATEPATH', '/absolute/path/to/wp-content/themes/active-theme');
define('STYLESHEETPATH', '/absolute/path/to/wp-content/themes/active-theme');

/*
As is, these two definitions are still querying the database, but we can eliminate these extraneous 
queries by hardcoding the values into place instead. every little helps right?
*/


/* Memory Limit */
define('WP_MEMORY_LIMIT', '64M');

/* Debug mode? */
define('WP_DEBUG',true); // debugging mode: 'true' = enabled; 'false' = disabled


/* Repair Mode */
define('WP_ALLOW_REPAIR', true);

/* 
Then hit up: http://example.com/wp-admin/maint/repair.php
There you’ll be able to optimize and repair your database without needing to log in to WordPress. 
Important: While you have WP_ALLOW_REPAIR set in wp-config.php, the Database Repair page is 
openly accessible by anyone who finds it. So definitely remove the line to disable the 
auto-repair functionality after you are done using it.
*/

/*  PHP init error logging */
@ini_set('log_errors','On');
@ini_set('display_errors','Off');
@ini_set('error_log','/home/path/domain/logs/php_error.log');


/*
As of WordPress version 2.6, you may change the default location of the wp-content directory. 
There are several good reasons for doing this, including enhancement of site security 
and facilitation of FTP updates. Here are some examples:
*/


// full local path of current directory (no trailing slash)
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'].'/path/wp-content'); 

// full URI of current directory (no trailing slash)
define('WP_CONTENT_URL', 'http://domain.tld/path/wp-content');

/*
You may also further specify a custom path for your plugins directory.
This may help with compatibility issues with certain plugins:
*/

// full local path of current directory (no trailing slash)
define('WP_PLUGIN_DIR', $_SERVER['DOCUMENT_ROOT'].'/path/wp-content/plugins'); 

// full URI of current directory (no trailing slash)
define('WP_PLUGIN_URL', 'http://domain.tld/path/wp-content/plugins');


/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>
