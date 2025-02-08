<?php
include "../../controller/reservasController.php";

$ReservasController = new ReservasController();
$acao = "cadastrarReserva";
$TituloBotao = "Reservar";
$reservas = [
    "id" => "",
    "usuario_id" => "",
    "espaco_id" => "",
    "data_reserva" => "",
    "hora_inicio" => "",
    "hora_fim" => ""
  ];
 
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $buttonTitle = "Atualizar";
  $acao = "editar";
  $reservas = $ReservasController->GetreservaById($id);
  if (!$reservas) {
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

  

        <form action="<?php echo "../../router/reservasRouter.php?acao=$acao" ?>" method="POST">

            <input type="hidden" name="IdUsuario" value="<?php echo $reservas["id"]; ?>">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="usuario_id" value="<?php echo $reservas['usuario_id']; ?>" required>

            <label for="espaco">Espaço:</label>
            <input type="text" id="espaco_id" name="espaco_id" value="<?php echo $reservas['espaco_id']; ?>" required>

            <label for="data_reserva">Data da Reserva:</label>
            <input type="date" id="data_reserva" name="data_reserva" value="<?php echo $reservas['data_reserva']; ?>" required>

            <label for="hora_inicio">Data da Reserva:</label>
            <input type="time" id="hora_inicio" name="hora_inicio" value="<?php echo $reservas['hora_inicio']; ?>" required>

            <label for="hora_fim">Data do Fim:</label>
            <input type="time" id="hora_fim" name="hora_fim" value="<?php echo $reservas['hora_fim']; ?>" required>

            <button type="submit">reservar</button>
        </form>
    </div>
</body>

</html>