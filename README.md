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
* select($params) - This function set the select fields and return model object. $params is an array that contains the table's column name. For example- array('id','name','email')
* where($params) - It set the where conditions and return model object. $params is an array that contains the conditions of query.

	Example-

		['id'=>5,'role_id'=>2]  = "...WHERE id=5 and role_id=2"

		['age'=>'> 25', 'or'=>['role_id'=>2, 'role_id'=>4]] =  "...WHERE age>25 and (role_id=2 or role_id=4)"

		Similarly we can use <, <=, >= operators
		
* orderBy($params) = It set the orders of row data and returns model object. $params is an array. Example array ['id'=>'desc', 'name'=>'asc']
* limit($start, $end) = It set the limit the number of rows.

	Example-
		limit(5) = limit only first 5 row
		limit(0,4) = limit from 0 to 4 row
		limit(5,10) = limit from row index 5 to 10
		
* get() = It fetches data from database and returns as object data array.
* create($params) = It inserts new row in a table. $params is an array like ['field name 1'=>field value 1, 'field name 2'=>field value 2]
* update($params) = It updates the data in a table. $params is an array that contans the fieldname and field value. Before update, you have to run where function.

	Example-
		$this->where(['id'=>5])->update(['name'=>'new name', 'password'=>'new password'])
		
* delete() = It delete records from table. Like update function, run where function then add delete function.



### View
### Query
### Common Functions



## Authors

* **SUN CORPORATION LIMITED**

## License

This project is licensed under the SUN License

