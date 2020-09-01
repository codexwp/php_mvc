<?php

$base_url = rtrim((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/');

require_once __DIR__.'/config.php';

require_once __DIR__.'/functions.php';

spl_autoload_register(function ($class_name){
    include $class_name.'.php';
});

//Add vendor packages


//End vendor packages

require_once ROOT_PATH .'route.php';