<?php
/**
 * Created by PhpStorm.
 * User: SAIFUL
 * Date: 8/28/2020
 * Time: 5:04 PM
 */
namespace src\controller;

use src\model\M_USER;

class StudentController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function test(){
        //$a = new User();

        M_USER::test();
    }

}