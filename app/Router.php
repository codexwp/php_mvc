<?php
/**
 * Created by PhpStorm.
 * User: SAIFUL
 * Date: 8/27/2020
 * Time: 4:31 PM
 */

namespace app;


class Router
{
    protected $base_path;
    protected $request_uri;
    protected $request_method;
    protected $http_methods = array('get', 'post', 'put', 'patch', 'delete');
    protected $is_found = false;

    function __construct($base_path = '') {

        $this->base_path = $base_path;

        if($base_path!='/')
            $this->base_path = rtrim($base_path,'/');

        // Remove query string and trim trailing slash
        $this->request_uri = rtrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');

        $this->request_method = $this->_determine_http_method();
    }

    function __destruct()
    {
        if(!$this->is_found)
            die( '404. Page is not found' );
    }

    private function _determine_http_method() {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if (in_array($method, $this->http_methods)) return $method;
        return 'get';
    }

    //$callable = It can be callable function or array. Example. ControllerName@methodName

    public function route($method, $route, $callable) {
        try {

            $method = strtolower($method);

            if ($route == '/') $route = $this->base_path;
            else $route = $this->base_path . $route;

            if ($route == $this->request_uri) {

                $this->is_found = true;

                if ($method == $this->request_method) {

                    if (is_callable($callable))
                        call_user_func_array($callable, array());
                    else
                        $this->execute($callable);

                } else
                    throw new Exception("The " . $this->request_method . " method is not supported in this url.");

            }
        }
        catch (Exception $e){
            $e->showErrorMessage();
        }

    }


    //$cm = Controller and Method. Example IndexController@show
    protected function execute($cm){

        list($controller, $method) = explode('@', $cm);

        if(!isset($controller) || !isset($method))
            throw new Exception('Invalid controller and method format. Please use like this "TestController@index"');

        $class = 'src\controller\\' . $controller;

        if(!class_exists($class))
            throw new Exception($controller.' is not found.');

        if(!method_exists($class,$method))
            throw new Exception($method.' method is not found.');

        $instance = new $class();
        $resp = $instance->$method();

        if($resp!=null){
            if(is_string($resp)){ echo ($resp); exit; }
            else if(is_array($resp)) { debug($resp); }
        }

    }


}