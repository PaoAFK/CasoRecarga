<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtIdJugador"]) || empty($_POST["txtMedio"]) || empty($_POST["txtBanco"]) || empty($_POST["txtMonto"])){
        header('Location: crear.php?mensaje=falta');
        exit();
    }

    include_once '../model/conexion.php';
    $idJugador = $_POST["txtIdJugador"];
    $banco = $_POST["txtBanco"];
    $medio = $_POST["txtMedio"];
    $fecha = date('y/m/d'); 
    $monto = $_POST["txtMonto"];    
    $sql ="INSERT INTO recarga(idJugador,banco,medio,fecha, monto) VALUES (".$_POST["txtIdJugador"].",'".$_POST["txtBanco"]."','".$_POST["txtMedio"]."','".date('y/m/d')."', ".$_POST["txtMonto"].");";
    
    if (mysqli_query($conexion, $sql)) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }

    $sql2 = $conexion->query("UPDATE jugador set saldo=saldo+".$_POST["txtMonto"]." where id=".$_POST["txtIdJugador"].";");

    
?>