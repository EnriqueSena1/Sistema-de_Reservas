<?php

require_once __DIR__. "/../../controller/espacoController.php";
$espacoController = new SpaceController();

$acao = "cadastrarEspaco";
$TituloBotao = "Cadastrar";
$espaco = [
    "id" => "",
    "nome" => "",
    "tipo" => "",
    "capacidade" => "",
    "descricao" => ""
  ];

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $acao = 'update';
    $TituloBotao = 'EDITAR';
    $espaco = $espacoController->GetSpaceById($id);
    
}
  

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
  <title>CADASTRAR ESPAÇOS</title>
</head>
<body>
  <form action="<?php echo "../../router/espacoRouter.php?acao=$acao"?>" method = "POST">
    <input type="hidden" name="IdUsuario" value ="<?php echo $espaco['id']?>">
    <input type="text" placeholder='Nome do Espaço' name="nome" value ="<?php echo $espaco['nome']?>">
    <input type="text" placeholder='Tipo do Espaço' name="tipo" value ="<?php echo $espaco['tipo']?>">
    <input type="number" placeholder='Capacidade do Espaço' name="capacidade" value ="<?php echo $espaco['capacidade']?>">
    <input type="text" placeholder='Descrição do Espaço' name="descricao" value ="<?php echo $espaco['descricao']?>">
    <button type="submit"><?php echo $TituloBotao ?></button>
  </form>
</body>
</html>