<?php

use app\Exception;

function debug($var){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    exit;
}

function url($uri){
    return BASE_URL . $uri;
}

global $view_object;


function view($path, $args=array()){
    global $view_object;
    $view_object = new \app\View();
    try {
        $view_path = ROOT_PATH . 'src/view/'. $path. '.php';
        if (!file_exists($view_path))
            throw new Exception('View file is not found in '. $view_path);
        foreach ($args as $k => $v)
            ${$k} = $v;
        require_once $view_path;
    }
    catch (Exception $e){
        echo $e->showErrorMessage();
    }
}

function redirect($uri){
    header("Location:" . BASE_URL . $uri);
    exit;
}



function extend_layout($path){
    global $view_object;
    $path = str_replace('.','/', $path);
    $layout_uri =  ROOT_PATH.'src/view/'.$path.'.php';
    $view_object->set_layout($layout_uri);
}

function add_key($key, $val=null){
    global $view_object;
    $view_object->$key = $val;
}

function get_key($key){
    global $view_object;
    return $view_object->$key;
}

function start_content(){
    ob_start();
}

function end_content(){
    $content = ob_get_contents();
    ob_clean();
    global $view_object;
    $view_object->set_content($content);
    require_once $view_object->get_layout();
}

function get_content(){
    global $view_object;
    return $view_object->get_content();
}

function include_layout($layout){
    $path = str_replace('.','/', $layout);
    $layout_uri =  ROOT_PATH.'src/view/'.$path.'.php';
    require_once $layout_uri;
}

function get_user(){

    if(!isset($_SESSION['user_id']) || !is_numeric($_SESSION['user_id']) || empty($_SESSION['user_id']))
        return false;

    $id = $_SESSION['user_id'];
    $model = 'src\model\\'.USER_TABLE;
    $user = (new $model)->find($id);

    if(!isset($user->id))
        return false;
    else
        return $user;

}

function set_user(){

}

