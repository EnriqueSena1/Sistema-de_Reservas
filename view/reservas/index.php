<?php
require_once __DIR__ . "/../../controller/reservasController.php";
$ReservasController = new ReservasController();

$reservas = $ReservasController->GetAllreserva();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    
</head>
<body>
    <a href="../cadastrarReservas/index.php"><button>Cadastrar Reserva</button></a>
    <table border = '1'>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Espaço</th>
                <th>Data da Rerserva</th>
                <th> Hora inicio</th>
                <th> Hora Fim</th>
                <th> Ações</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($reservas as $item){
            ?>

                    <tr>
                        <td> <?php echo $item ['usuario_id'] ?></td>
                        <td> <?php echo $item ['espaco_id'] ?></td>
                        <td> <?php echo $item ['data_reserva'] ?></td>
                        <td> <?php echo $item ['hora_inicio'] ?></td>
                        <td> <?php echo $item ['hora_fim'] ?></td>
                        <td> <a href="../cadastrarReservas/index.php?id=<?php echo $item["id"] ?>"><button>Editar</button></a>
                        <form action="../../router/reservasRouter.php?acao=deletar" method = "POST">
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