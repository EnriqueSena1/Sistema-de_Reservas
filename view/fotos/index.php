<?php
require __DIR__. "/../../controller/fileController.php";

$fileController = new FileController();
$listaImagem = $fileController-> getAllImagem();
var_dump($listaImagem);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="imagem.css">
</head>
<body>
    <form action="../../router/fileRouter.php?acao=salvarImagem" method="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <button type="submit">Enviar</button>


    </form>
    
    <?php
    foreach($listaImagem as $item){
    ?>

    <img src="../../public/uploads/<?php echo $item["nome"] ?>" alt="" class="imagem">

<?php
    }
    ?>

</body>
</html>