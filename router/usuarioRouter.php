<?php
require_once __DIR__. "/../controller/usuarioController.php";

$usuarioController = new UserController();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    switch($_GET["acao"]) {
        case 'cadastrarUsuario':
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];

            if (!(empty($nome) || empty($email) || empty($telefone))) {
                $resposta = $usuarioController->createUser($nome, $email, $telefone);
                if ($resposta) {
                    header("Location:../view/usuario/index.php");
                }
            }
            break;

        case "editar":
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];

            if (!(empty($nome) || empty($email) || empty($telefone))) {
                $resposta = $usuarioController->UpdateUser($_POST["IdUsuario"], $nome, $email, $telefone);
                if ($resposta) {
                    header("Location: ../view/usuario/index.php");
                }
            }
            break;

        case "deletar":
            $resultado = $usuarioController->DeleteUser($_POST["IdUsuario"]);
            if ($resultado) {
                header("Location:../view/usuario/index.php");
            }
            break;

        default:
            echo "Não achei nenhuma das opções";
            break;
    }
}
?>
