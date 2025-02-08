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

        } catch (\Throwable $th) {
            
        }

    }
}