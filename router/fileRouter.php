<?php
require_once __DIR__ . "/../controller/fileController.php";

$fileController = new FileController();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    switch ($_GET["acao"]) {
        case 'salvarImagem':
            
            
            // $resultado = $fileController->SalvarImagem();


            if (!(empty($usuario_id) || empty($espaco_id) || empty($data_reserva) || empty($hora_inicio) || empty($hora_fim))) {
                $resposta = $reservasController->createreserva($usuario_id, $espaco_id, $data_reserva, $hora_inicio, $hora_fim);
                if ($resposta) {
                    header("Location:../view/reservas/index.php");
                }
            }
            break;
        case "deletar":
            $resultado = $reservasController->Deletereservas($_POST["IdUsuario"]);
            if ($resultado) {
                header("Location:../view/reservas/index.php");
            }
            break;

        case "editar":
            $usuario_id = $_POST['usuario_id'];
            $espaco_id = $_POST['espaco_id'];
            $data_reserva = $_POST['data_reserva'];
            $hora_inicio = $_POST['hora_inicio'];
            $hora_fim = $_POST['hora_fim'];

            if (!(empty($usuario_id) || empty($espaco_id) || empty($data_reserva) || empty($hora_inicio) || empty($hora_fim))) {
                $resposta = $reservasController->UpdateReservas($usuario_id, $espaco_id, $data_reserva, $hora_inicio, $hora_fim,$_POST["IdUsuario"]);
                if ($resposta) {
                    header("Location:../view/reservas/index.php");
                }
            }
            break;

        default:
            echo 'nao achei nenhuma das opções';
            break;
    }
}
