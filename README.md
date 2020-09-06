# NEO

NEOは日本のミュージカル学校です

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

* PHP Version : minimum 5.3
* Database : MySQL


### Installing

Just clone the folders and files in your server. 
Then change BASE_PATH and Database credentials in app/config.php

Example:
If you put code in a subfolder like http://www.example.com/member
```
define( 'BASE_PATH', '/member/');
```
If you put code in main domain or subdomain
```
define( 'BASE_PATH', '/');
```

Database Configuration
```
define( 'DB_HOST', 'host name' );
define( 'DB_NAME', 'database name' );
define( 'DB_USER', 'database user' );
define( 'DB_PASSWORD', 'database password' );
```



## Usages

### Routing Example
Create route in route.php

$route->route('method','uri','Controller@Method','Middleware')

method = 'get', 'post', 'put', 'patch', 'delete'

```
$router->route('GET', '/test', function() {
    echo "Hello World" ;
});

$router->route('POST', '/', 'UserController@login');

$router->route('POST', '/dashboard', 'UserController@dashboard', 'auth');
```

### Controller
### Model
### View
### Query
### Common Functions



## Authors

* **SUN CORPORATION LIMITED**

## License

This project is licensed under the SUN License

