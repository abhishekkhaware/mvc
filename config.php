<?php
	/**
	 * Used For url Definition
	 */
	define('URL', 'http://localhost/');
	/**
	 * Using For Database Configuration
	 */
	define('DB_TYPE', 'mysql');
	define('DB_USER', 'root');
	define('DB_HOST', 'localhost');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'bank');
	/**
	 * Using for security. Hashing Password, Like.
	 */
	define('PUBLIC_HASH_KEY', '*&@OneTwoKa4FourTwoKaOne.#bindaasonlineshopIsNumberOne$@@%');
	define('PASSWORD_HASH_KEY', '*&@$1S_pAssWoRDHash#bindaasonlineshopIsNumberOne$@@%');
	/**
	 * Using for Basic Application Directory Structure
	 */
	define('__LIBS__', 'libs/');
	define('__CONTROLLERS__', 'app/Controllers/');
	define('__MODELS__', 'app/Models/');
	define('__VIEWS__', 'resources/views/');
	/**
	 * Upload Directory.
	 */
	define('UPLOAD_DIR', 'public/uploads/');
    /*
    * Configuration For PHP-ActiveRecord
    */


    /*
     * MailGun Configuration
     */
    define('MAILGUN_API_KEY','key-7m76eixsdgvlnf0fv5zu4qx0s69ld744');
    define('MAILGUN_DOMAIN','sandbox20225.mailgun.org');
    define('MAILGUN_FROM','GURU <postmaster@sandbox20225.mailgun.org>');

?>