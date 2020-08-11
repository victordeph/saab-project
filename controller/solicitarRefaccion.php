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
    fecha_solictud_reportes, departamento_reportes, id_refacciones, estado_reportes) values ('$refaccion','$vehiculo','$cantidad','$costo','$costoT','$date','$departamento','$id', 'Pendiente');";
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

if (isset($_POST['solicitar'])) {
    $refaccion = $_POST['refaccion'];
    $vehiculo = $_POST['vehiculo'];
    $cantidad = $_POST['cantidad'];

    $query = "UPDATE trending SET cantidad_trending = cantidad_trending+$cantidad where refaccion_trending='$refaccion' 
    and vehiculo_trending='$vehiculo';";
    $query_run = mysqli_query($conexion, $query);

}

if (isset($_POST['solicitar'])) {
    $id = $_POST['idRefaccion'];
    $refaccion = $_POST['refaccion'];
    $vehiculo = $_POST['vehiculo'];

    $query = "UPDATE trending SET id_refacciones = $id where refaccion_trending='$refaccion' 
    and vehiculo_trending='$vehiculo';";
    $query_run = mysqli_query($conexion, $query);

}

if (isset($_POST['btnEstado'])) {
    $id_reporte = $_POST['id_reporte'];
    $estado = $_POST['status'];
    $query = "UPDATE reportes SET estado_reportes = '$estado' where id_reportes=$id_reporte;";
    $query_run = mysqli_query($conexion, $query);

    if ($query_run) {
        header('location: ../todos.php');   
    }
}

?>