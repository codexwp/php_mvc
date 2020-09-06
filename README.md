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
Create route in route.php (root folder)

$route->route('method','uri','Controller@Method','Middleware')

method = 'get', 'post', 'put', 'patch', 'delete'

```
$router->route('GET', '/test', function() {
    echo "Hello World" ;
});

$router->route('POST', '/', 'TestController@login');

$router->route('POST', '/dashboard', 'TestController@dashboard', 'auth');
```

### Controller Example
Create controller in src/controller folder like the following one
```
namespace src\controller;

class TestController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
	
	function login()
	{
		//Write your codes
	}
}
```
### Model Example
Create controller in src/model folder like the following one. But database table name and model name must be same.

```
namespace src\model;


class USER extends Model
{

    function __construct()
    {
        parent::__construct();
    }

	function getUser($role_id)
	{
		//write your codes
		return $this->where(['role_id'=>$role_id])->get();
	}
}
```
Model functions
* select($params) - $params is an array that contains the table's column name. For example- array('id','name','email') and returns model object.
* where($params) - $params is an array that contains the conditions of query and returns model object.

	For example-

		['id'=>5,'role_id'=>2]  = "...WHERE id=5 and role_id=2"

		['age'=>'> 25', 'or'=>['role_id'=>2, 'role_id'=>4]] =  "...WHERE age>25 and (role_id=2 or role_id=4)"

		Similarly we can use <, <=, >= operators



### View
### Query
### Common Functions



## Authors

* **SUN CORPORATION LIMITED**

## License

This project is licensed under the SUN License

