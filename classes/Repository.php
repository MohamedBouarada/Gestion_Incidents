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
    public function findAll_enattente() {
        $request = "select * from ".$this->tableName." WHERE nom_etat='en attente' " ;
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
    public function findAll_corrige() {
        $request = "select * from ".$this->tableName." WHERE nom_etat='corrige' " ;
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
    public function findAll_nontraite() {
        $request = "select * from ".$this->tableName." WHERE nom_etat='non traite' " ;
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
    public function DeleteUserById($id) {
        $request = "DELETE FROM ".$this->tableName." WHERE id_utilisateur='$id'";
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
    public function findById($id) {
        $request = "select * from ".$this->tableName ." where id_utilisateur = '$id'";
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
    public function findByIdFiliale($id) {
        $request = "select * from ".$this->tableName ." where id_filiale = '$id'";
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetch(PDO::FETCH_OBJ);
    }


    public function findByNom($nom) {
        $recherche="%".$nom."%";
        $request = "select * from ".$this->tableName ." where nom ='$nom'";
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
}