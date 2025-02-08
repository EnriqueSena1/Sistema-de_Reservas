<?php

require_once __DIR__ . "/../config/db/database.php";


class ReservasController{
    private $conn;

    public function __construct()
    {
        $objDb = new Database;
        $this-> conn = $objDb->connect();
    }

    public function GetAllUser(){
        try{
            $sql = "SELECT * FROM usuarios"; 
            $db = $this -> conn -> prepare($sql);
            $db-> execute();
            $user = $db->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        }
        catch (\Exception $th){
            return $th -> getMessage();
        }
    }

public function createUser($nome,$email,$telefone){
    try {
        $sql = "INSERT INTO usuarios (nome,email,telefone) VALUES (:nome, :email,:telefone)";
        $db = $this->conn->prepare($sql);
        $db->bindParam(":nome", $nome);
        $db->bindParam(":email", $email);
        $db->bindParam(":telefone", $telefone);
        if ($db->execute()){
            return true;
        }else{
                return false;
        }
        } catch (\Exception $th){

        }
    }
    
    public function GetAllreserva(){
        try{
            $sql = "SELECT * FROM reservas"; 
            $db = $this -> conn -> prepare($sql);
            $db-> execute();
            $user = $db->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        }
        catch (\Exception $th){
            return $th -> getMessage();
        }
    }
    public function createreserva($usuario_id, $espaco_id, $data_reserva, $hora_inicio, $hora_fim){
        try {
            $sql = "INSERT INTO reservas (usuario_id, espaco_id, data_reserva, hora_inicio,hora_fim ) VALUES (:usuario_id, :espaco_id, :data_reserva, :hora_inicio, :hora_fim)";
            $db = $this->conn->prepare($sql);
            $db->bindParam(":usuario_id", $usuario_id);
            $db->bindParam(":espaco_id", $espaco_id);
            $db->bindParam(":data_reserva", $data_reserva);
            $db->bindParam(":hora_inicio", $hora_inicio);
            $db->bindParam(":hora_fim", $hora_fim);
            if ($db->execute()){
                return true;
            }else{
                    return false;
            }
            } catch (\Exception $th){
                echo $th -> getMessage();
            }    
}
public function GetreservaById($id){
    try {
        $sql = "SELECT * FROM reservas WHERE id = :id";
        $db = $this->conn->prepare($sql);
        $db->bindParam(":id", $id);
        $db-> execute();
        $user = $db->fetch(PDO::FETCH_ASSOC);
        return $user;
        } catch (\Exception $th){
            echo $th -> getMessage();
        }
    }
    public function Deletereservas($id){
        try {
            $sql = "DELETE FROM reservas WHERE id = :id";
            $db = $this->conn->prepare($sql);
            $db->bindParam(":id", $id);
            if($db->execute()){
                return true;
            }else{
                return false;
            }
        } catch (\Exception $th) {
            echo $th -> getMessage();
        }
}
public function UpdateReservas($usuario_id, $espaco_id, $data_reserva, $hora_inicio, $hora_fim, $id){
    try {
        $sql = "UPDATE reservas SET usuario_id = :usuario_id, espaco_id = :espaco_id, data_reserva = :data_reserva, hora_inicio = :hora_inicio, hora_fim = :hora_fim WHERE id = :id";
        $db = $this->conn->prepare($sql);
        $db->bindParam(":usuario_id", $usuario_id);
        $db->bindParam(":espaco_id", $espaco_id);
        $db->bindParam(":data_reserva", $data_reserva);
        $db->bindParam(":hora_inicio", $hora_inicio);
        $db->bindParam(":hora_fim", $hora_fim);
        $db->bindParam(":id", $id);
        if($db->execute()){
            return true;
        }else{
            return false;
        }
    } catch (\Exception $th) {
        echo $th -> getMessage();
    }
}
}