<?php
/**
 * Created by PhpStorm.
 * User: SAIFUL
 * Date: 8/27/2020
 * Time: 4:03 PM
 */
namespace src\model;

use Mysqli;

class Model
{
    private $connection=null;
    protected $table;

    function __construct()
    {
        $this->openConnection();
        $this->setTableName();
    }
    function __destruct()
    {
        $this->closeConnection();
    }

    private function setTableName(){
        $class = get_called_class();
        $this->table = explode('\\', $class)[2];
    }

    private function openConnection(){
        if($this->connection!=null)
            return;

        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

    }

    private function closeConnection(){
        if($this->connection!=null){
            $this->connection->close();
        }
    }

    protected function select($sql){
        $data = (object)$this->connection->query($sql)->fetch_all(MYSQLI_ASSOC);
        return $data;
    }


    public function find($id){
        $sql = "SELECT * FROM ".$this->table." WHERE id=".$id." LIMIT 1";
        return $this->select($sql);
    }




}