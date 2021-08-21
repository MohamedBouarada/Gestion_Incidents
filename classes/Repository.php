<?php
include_once 'autoload.php';

class Repository
{
    protected $bd;
    protected $tableName;
    public function  __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->bd = ConnexionBD::getInstance();
    }

    public function findAll() {
        $request = "select * from ".$this->tableName;
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    public function findEtatById($id) {
        $request = "select * from ".$this->tableName ." where id_état = '$id'";
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
    public function findPrioritéById($id) {
        $request = "select * from ".$this->tableName ." where id_priorité = '$id'";
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
}