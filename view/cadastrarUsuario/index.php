<?php
include "../../controller/usuarioController.php";

$usuarioController = new UserController();

$usuario = [
    'id' => '',
    'nome' => '',
    'email' => '',
    'telefone' => ''
];
$acao = "cadastrarUsuario";
$buttonTitle = "Cadastrar";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $buttonTitle = "Atualizar";
    $acao = "editar";
    $usuario = $usuarioController->getUserById($id);
    if (!$usuario) {
        echo "Usuário não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($_GET['id']) ? 'Editar Usuário' : 'Cadastrar Usuário'; ?></title>
    <link rel="stylesheet" href=" cadastrarUsuario1.css">
</head>

<body>
    <div class="container">
        <h2><?php echo isset($_GET['id']) ? 'Editar Usuário' : 'Cadastrar Usuário'; ?></h2>

        <?php if (isset($error_message)) { ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php } ?>

        <form action="<?php echo "../../router/usuarioRouter.php?acao=$acao" ?>" method="POST">
            <input type="hidden" name="IdUsuario" value="<?php echo $usuario["id"]; ?>">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?php echo $usuario['telefone']; ?>" required>

            <button type="submit"><?php echo $buttonTitle; ?></button>
        </form>
    </div>
</body>

</html>