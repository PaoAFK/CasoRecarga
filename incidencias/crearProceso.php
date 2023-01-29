<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtMotivo"]) || empty($_POST["txtMonto"])){
        header('Location: crear.php?mensaje=falta');
        exit();
    }

    include_once '../model/conexion.php';
    $motivo = $_POST["txtMotivo"];
    $fecha = date('y/m/d'); 
    $monto = $_POST["txtMonto"];    

    $sql ="INSERT INTO incidencia(motivo,usuario,fecha, monto) VALUES (".$_POST["txtMotivo"].", 'usuario@gmail.com','".date('y/m/d')."',".$_POST["txtMonto"].");";
    if (mysqli_query($conexion, $sql)) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    $sql2 = "UPDATE jugador INNER JOIN recarga ON recarga.idJugador=jugador.id INNER JOIN incidencia ON incidencia.motivo=recarga.id  set jugador.saldo=jugador.saldo-".$_POST["txtMonto"]." where recarga.id=".$_POST["txtMotivo"].";";
    mysqli_query($conexion, $sql2);
?>