<!-- enrique --> teste
<?php
include __DIR__ . '/conexao.php'; // Conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_POST['usuario_id'];
    $espaco_id = $_POST['espaco_id'];
    $data_reserva = $_POST['data_reserva'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];

    $conn->query("INSERT INTO reservas (usuario_id, espaco_id, data_reserva, hora_inicio, hora_fim) 
                  VALUES ($usuario_id, $espaco_id, '$data_reserva', '$hora_inicio', '$hora_fim')");
    header('Location: reservas.php');
}

$usuarios = $conn->query("SELECT * FROM usuarios");
$espacos = $conn->query("SELECT * FROM espacos");
$reservas = $conn->query("SELECT r.id, u.nome as usuario, e.nome as espaco, r.data_reserva, r.hora_inicio, r.hora_fim
                          FROM reservas r
                          JOIN usuarios u ON r.usuario_id = u.id
                          JOIN espacos e ON r.espaco_id = e.id");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Reservas</title>
</head>
<body>
<h1>Reservas</h1>
<form method="POST">
    <select name="usuario_id" required>
        <option value="">Selecione o usuário</option>
        <?php while ($usuario = $usuarios->fetch_assoc()) { ?>
            <option value="<?= $usuario['id'] ?>"><?= $usuario['nome'] ?></option>
        <?php } ?>
    </select>
    <select name="espaco_id" required>
        <option value="">Selecione o espaço</option>
        <?php while ($espaco = $espacos->fetch_assoc()) { ?>
            <option value="<?= $espaco['id'] ?>"><?= $espaco['nome'] ?></option>
        <?php } ?>
    </select>
    <input type="date" name="data_reserva" required>
    <input type="time" name="hora_inicio" required>
    <input type="time" name="hora_fim" required>
    <button type="submit">Reservar</button>
</form>
<h2>Lista de Reservas</h2>
<ul>
    <?php while ($reserva = $reservas->fetch_assoc()) { ?>
        <li><?= $reserva['usuario'] ?> reservou <?= $reserva['espaco'] ?> em <?= $reserva['data_reserva'] ?> das <?= $reserva['hora_inicio'] ?> às <?= $reserva['hora_fim'] ?></li>
    <?php } ?>
</ul>
</body>
</html>
