<?php
require_once __DIR__. "/../../controller/espacoController.php";

$espacoController = new SpaceController();

$espaco = $espacoController->GetAllSpace();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>ESPAÇOS</title>
</head>
<body>
    <a href="../cadastrarEspaco/index.php"><button>Cadastrar</button></a>
    <table border = '1'>
        <h2>LISTA DOS ESPAÇOS</h2>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Capacidade</th>
                <th>Descricao</th>
                <th>Ações</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($espaco as $item){
            ?>

                    <tr>
                        <td> <?php echo $item ['id'] ?></td>
                        <td> <?php echo $item ['nome'] ?></td>
                        <td> <?php echo $item ['tipo'] ?></td>
                        <td> <?php echo $item ['capacidade'] ?></td>
                        <td> <?php echo $item ['descricao'] ?></td>
                        <td> <a href="../cadastrarEspaco/index.php?id=<?php echo $item["id"] ?>"><button>Editar</button></a>
                        <form action="../../router/espacoRouter.php?acao=deletar" method = "POST">
                            <input type="hidden" name="IdUsuario" value ="<?php echo $item['id']?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
    
                    </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>