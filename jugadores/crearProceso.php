<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtEdad"])){
        header('Location: crear.php?mensaje=falta');
        exit();
    }

    include_once '../model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $fecha = date('y/m/d'); 
    $edad = $_POST["txtEdad"];    
   
    $sql ="INSERT INTO jugador(nombre,edad,fecha,saldo) VALUES ('".$_POST["txtNombre"]."',".$_POST["txtEdad"].",'".date('y/m/d')."', 0);";
    
    if (mysqli_query($conexion, $sql)) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>