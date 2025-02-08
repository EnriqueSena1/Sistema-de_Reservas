<?php
require_once __DIR__. "/../controller/espacoController.php";

$espacoController = new SpaceController();

if ($_SERVER["REQUEST_METHOD"]=='POST'){
    switch($_GET["acao"]){
        case 'cadastrarEspaco':
            $nome = $_POST['nome'];
            $tipo = $_POST['tipo'];
            $capacidade = $_POST['capacidade'];
            $descricao = $_POST['descricao'];
            var_dump($_POST);


            if(!(empty($nome) || empty($tipo) || empty($capacidade) || empty($descricao))){
                $resposta = $espacoController->createSpace($nome,$tipo,$capacidade, $descricao);

                if($resposta){
                    header("Location:../view/espaco/index.php");
                }
            }
            break;

            case 'update':
                $nome = $_POST['nome'];
                $tipo = $_POST['tipo'];
                $capacidade = $_POST['capacidade'];
                $descricao = $_POST['descricao'];
                var_dump($_POST);
    
                if(!(empty($nome) || empty($tipo) || empty($capacidade) || empty($descricao))){
                    $validacao = $espacoController->UpdateSpace($_POST['IdUsuario'],$nome, $tipo, $capacidade, $descricao);
                    
                    if($validacao){
                        header("Location:../view/espaco/index.php");
                    }
    
                }
                break;

            case 'deletar':
                $resultado = $espacoController->DeleteSpace($_POST['IdUsuario']);
                if ($resultado) {
                    header("Location:../view/espaco/index.php");
                }
                break;

        default:
            echo 'Não achei nenhuma das opções!';
            break;
    }
}
?>