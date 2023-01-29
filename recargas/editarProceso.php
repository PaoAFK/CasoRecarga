<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include '../model/conexion.php';
    $idJugador = $_POST["txtIdJugador"];
    $banco = $_POST["txtBanco"];
    $medio = $_POST["txtMedio"];

    $sql ="UPDATE recarga SET idJugador = ".$_POST["txtIdJugador"].", banco = '".$_POST["txtBanco"]."', medio = '".$_POST["txtMedio"]."' where id = ".$_POST['id'].";";
    if (mysqli_query($conexion, $sql)) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
    
?>