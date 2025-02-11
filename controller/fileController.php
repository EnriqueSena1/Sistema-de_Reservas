<?php
require_once __DIR__ . "/../config/db/database.php";

class FileController{
    private $conn;
    public function __construct(){
        $banco = new Database();   
        $this->conn = $banco->connect();     
    }
    public function SalvarImagem($nomeImagem){
        try {
            $sql = "INSERT INTO imagens(nome) VALUES(:nomeImagem)";
            $db = $this->conn->prepare($sql);
            $db->bindParam(":nomeImagem", $nomeImagem);

            if($db->execute()){
                return true;
            }else{
                return false;
            }

        } catch (\Exception $th) {
            echo $th->getMessage();
        }

    }

    public function getAllImagem(){
        try {
        $sql = "SELECT * FROM imagens";
        $db = $this-> conn-> Prepare($sql);
        $db->execute();
        $listaImagem = $db-> fetchAll(PDO::FETCH_ASSOC);
        return$listaImagem;
    } catch (\Exception $th) {
        echo $th->getMessage();
    }

    }
}