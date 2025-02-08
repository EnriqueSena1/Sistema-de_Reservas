<?php
require_once __DIR__ . "../../../controller/usuarioController.php";
$userController = new UserController();

$usuario = $userController->GetAllUser();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href= './usuario.css'>
</head>
<body>
    <div class = 'container'>
    
    <table>
        <thead>
            <tr>
                <!--<th type>Id</th>-->
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($usuario as $item){
            ?>

                    <tr>
                        <!--<td> <?php echo $item ['id'] ?></td>-->
                        <td> <?php echo $item ['nome'] ?></td>
                        <td> <?php echo $item ['email'] ?></td>
                        <td> <?php echo $item ['telefone'] ?></td>
                        <div class = 'actions'>
                        <td> <a href="../../view/cadastrarUsuario/index.php?id=<?php echo $item["id"] ?>"><button class = 'editar'>Editar</button></a>
                        <form action="../../router/usuarioRouter.php?acao=deletar" method = "POST">
                            <input type="hidden" name="IdUsuario" value ="<?php echo $item['id']?>">
                            <button type="submit" class = 'deletar'>Delete</button>
                            
                        </form> 
                        </div>
                    </td>
    
                    </tr>
            <?php
                }
            ?>
        </tbody>
        <a href="../cadastrarUsuario/index.php"><button>Cadastrar</button></a>
    </table>
    </div>
</body>
</html>