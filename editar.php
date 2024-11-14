<?php
    include_once "config/database.php";
    include_once "objetos/carro.php";
    include_once "funcoes.php";

    global $carro;
    $dados = $carro->lerCarro($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Editar</title>
</head>
<body>
    <form action="funcoes.php" method="post">
        <h1>Editar</h1>
        <input type="text" placeholder="nome" name="nome" value="<?php echo $dados[0]['nome'] ?>"><br>
        <input type="text" placeholder="marca" name="marca" value="<?php echo $dados[0]['marca'] ?>"><br>
        <input type="text" placeholder="cor" name="cor" value="<?php echo $dados[0]['cor'] ?>"><br>
        <input type="text" placeholder="placa" name="placa" value="<?php echo $dados[0]['placa'] ?>"><br>
        <input type="hidden" name="id" value="<?php echo $dados[0]['id'] ?>">
        <button type="submit" name="edt">Editar</button>
    </form>
</body>
</html>
