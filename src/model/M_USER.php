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

    private $table;

    function __construct()
    {
        parent::__construct();
        $this->setTableName();
    }

    private function setTableName(){
        $class = get_class($this);
        $this->table = explode('\\', $class)[2];
    }

    public function getUsers(){
        $model = $this;
        $sql = "SELECT *FROM ".$model->table;
        return $model->select($sql);
    }

    public static function find($id){
        $model = new self();
        $sql = "SELECT *FROM ".$model->table." WHERE ID='$id'";
        return $model->select($sql);
    }

}