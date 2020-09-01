<?php
/**
 * Created by PhpStorm.
 * User: SAIFUL
 * Date: 8/28/2020
 * Time: 6:21 PM
 */

namespace src\model;


class M_USER extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getUsers(){
        $model = $this;
        //Start coding

        $sql = "SELECT *FROM ".$model->table;
        return $model->select($sql);
    }

    public static function  test(){
        $model = new self();

        //Start coding
    }

}