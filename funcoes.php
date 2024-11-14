<?php
    include_once "config/database.php";
    include_once "objetos/carro.php";

    $banco = new Database();
    $db = $banco->conectar();
    $carro = new Carro($db);
    
    if (isset($_POST['cadastrar'])) {
        $carro->nome = $_POST['nome'];
        $carro->marca = $_POST['marca'];
        $carro->cor = $_POST['cor'];
        $carro->placa = $_POST['placa'];
        if ($carro->cadastrar()) {
            header("Location: index.php");
        }
    } elseif (isset($_POST['edt'])) {
        if ($carro->editar($_POST['nome'], $_POST['marca'], $_POST['cor'], $_POST['placa'], $_POST['id'])) {
            header("Location: index.php");
        }
    } elseif (isset($_GET['exc'])) {
        if ($carro->excluir($_GET['id'])) {
            header("Location: index.php");
        }
    }