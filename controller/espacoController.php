<?php

require_once __DIR__ . "/../config/db/database.php";


class SpaceController{
    private $conn;

    public function __construct()
    {
        $objDb = new Database;
        $this-> conn = $objDb->connect();
    }


    public function createSpace($nome,$tipo,$capacidade, $descricao){
        try {
            echo 'ta chegando aqui';
            $sql = "INSERT INTO espacos (nome,tipo,capacidade, descricao) VALUES (:nome, :tipo, :capacidade, :descricao)";
            $db = $this->conn->prepare($sql);
            $db->bindParam(":nome", $nome);
            $db->bindParam(":tipo", $tipo);
            $db->bindParam(":capacidade", $capacidade);
            $db->bindParam(":descricao", $descricao);
            if ($db->execute()){
                return true;
            }else{
                    return false;
            }
            } catch (\Exception $th){
                return $th->getMessage();
            }
        }

        public function UpdateSpace($id, $nome, $tipo, $capacidade, $descricao){
            try {
                $sql = 'UPDATE espacos SET nome = :nome, tipo = :tipo, capacidade = :capacidade, descricao = :descricao WHERE id = :id';
                $db = $this->conn->prepare($sql);
                $db->bindParam(':nome', $nome);
                $db->bindParam(':tipo', $tipo);
                $db->bindParam(':capacidade', $capacidade);
                $db->bindParam(':descricao', $descricao);
                $db->bindParam(':id', $id);
                if ($db->execute()){
                    return true;
                }else{
                    return false;
                }
                return $user;
            } catch (\Exception $th) {
                return $th->getMessage();
            }
        }


        public function GetAllSpace(){
            try{
                $sql = "SELECT * FROM espacos";
                $db = $this -> conn -> prepare($sql);
                $db-> execute();
                $user = $db->fetchAll(PDO::FETCH_ASSOC);
                return $user;
            }
            catch (\Exception $th){
                return $th -> getMessage();
            }
        }

        public function GetSpaceById($id){
        
            try {
                $sql = 'SELECT * from espacos WHERE id = :id';
                $db = $this->conn->prepare($sql);
                $db->bindParam(':id', $id);
                $db->execute();
                $user = $db->fetch(PDO::FETCH_ASSOC);
                return $user;
            } catch (\Exception $th) {
                return $th->getMessage();
            }
        }


        public function DeleteSpace($id){
            try {
                $sql = 'DELETE FROM espacos WHERE id =:id';
                $db = $this->conn->prepare($sql);
                $db->bindParam(':id', $id);
                if ($db->execute()){
                    return true;
                }else{
                    return false;
                }
                return $user;
            } catch (\Exception $th) {
                return $th->getMessage();
            }
        }
    

}



