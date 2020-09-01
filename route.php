<?php
use app\Router;

$router = new Router(BASE_PATH);

// Respond to a home page request
$router->route("GET", "/", 'StudentController@test', 'auth');


// Respond to a home page request
$router->route("GET", "/test", function() {
    echo "You found person " ;
});



