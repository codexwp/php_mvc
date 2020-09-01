<?php

error_reporting(E_ALL ^(E_WARNING | E_NOTICE));
session_start();

define( 'BASE_PATH', '/neo/');
define( 'BASE_URL', $base_url);
define( 'ROOT_PATH', dirname(dirname(__FILE__)) . '/');
define( 'USER_TABLE', 'M_USER');

//Database Configuration
define( 'DB_HOST', 'localhost' );
define( 'DB_NAME', 'neo' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );

