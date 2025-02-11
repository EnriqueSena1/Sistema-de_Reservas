<?php
require_once __DIR__ . "/../controller/fileController.php";

$fileController = new FileController();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    switch ($_GET["acao"]) {
        case 'salvarImagem':
            
            $uploaDir = "../public/uploads/";
            $tipoPermitidos = ["imge/png","image/jpeg"];
            $image = $_FILES["image"];
            var_dump($image);
            if(!is_dir($uploaDir)){
                mkdir($uploaDir,0777,true);
            }
            if(isset($image) && in_array($image["type"], $tipoPermitidos)){
                $caminhoTemp= $image ["tmp_name"];
                $nomefoto = $image["name"];
                $extensao = pathinfo($nomefoto, PATHINFO_EXTENSION);
                $novoNome = uniqid("img_") . "." . $extensao;
                
                $destino = $uploaDir . $novoNome;
                
                if(move_uploaded_file($caminhoTemp, $destino)){
                    $resultado = 
                    $fileController-> SalvarImagem
                    ($novoNome);
                    header("location:../view/fotos/index.php");
                }else{
                    echo "não consegui salvar o arquivo";
                } 
                
            }else{
                echo "não permitido";
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
