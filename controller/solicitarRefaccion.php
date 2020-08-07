<?php
require 'conexion.php';

if (isset($_POST['solicitar'])) {
    $id = $_POST['idRefaccion'];
    $refaccion = $_POST['refaccion'];
    $vehiculo = $_POST['vehiculo'];
    $cantidad = $_POST['cantidad'];
    $costo = $_POST['costoU'];
    $costoT = $cantidad*$costo;
    $date = $_POST['date'];
    $departamento = $_POST['departamento'];

    $query = "INSERT INTO reportes (refaccion_reportes, vehiculo_reportes,cantidad_reportes, costo_reportes, costo_total_reportes, 
    fecha_solictud_reportes, departamento_reportes, id_refacciones) values ('$refaccion','$vehiculo','$cantidad','$costo','$costoT','$date','$departamento','$id');";
    $query_run = mysqli_query($conexion, $query);

    if ($query_run) {
        header('location: ../solicitudRefacciones.php');   
    }
}

if (isset($_POST['solicitar'])) {
    $id = $_POST['idRefaccion'];
    $cantidad = $_POST['cantidad'];

    $query = "UPDATE refacciones SET cantidad = cantidad-$cantidad where id_refacciones=$id;";
    $query_run = mysqli_query($conexion, $query);

    if ($query_run) {
        header('location: ../solicitudRefacciones.php');   
    }
}

?>