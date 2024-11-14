<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <table>
        <h1>Carros</h1>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Cor</th>
            <th>Placa</th>
            <th>Excluir</th>
            <th>Editar</th>
        </tr>
<?php
    include_once "config/database.php";
    include_once "objetos/carro.php";
    $banco = new Database();
    $db = $banco->conectar();
    $carro = new Carro($db);

    global $carro;

    if ($db) {
        
        foreach ($carro->lerTodos() as $row) {
            echo "<tr><td>{$row['id']}</td>";
            echo "<td>{$row['nome']}</td>";
            echo "<td>{$row['marca']}</td>";
            echo "<td>{$row['cor']}</td>";
            echo "<td>{$row['placa']}</td>";
            echo "<td><a href=\"funcoes.php?id={$row['id']}&exc=1\">X</a></td>";
            echo "<td><a href=\"editar.php?id={$row['id']}\">Editar</a></td></tr>";
        }
    }
?>
    </table>
    <p><a href="cadastro.php">Cadastrar</a></p>
    <form style='height: auto;' action="" method="post">
        <input type="text" name='pesquisa' placeholder="Pesquisar por nome">
        <button type="submit">Pesquisar</button>
    </form>
    <?php
        if (!empty($_POST['pesquisa'])) {
            $pes = $_POST['pesquisa'];
            echo "<ul>";
            foreach ($carro->pesquisa($pes) as $item) {
                echo "<li>" . $item['nome'] . "</li>";
            }
            echo "</ul>";
        }
    ?>
</body>
</html>