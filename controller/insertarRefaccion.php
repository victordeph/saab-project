<?php
require 'conexion.php';

if (isset($_POST['insertar'])) {

    $refaccion = $_POST['refaccion'];
    $vehiculo = $_POST['vehiculo'];
    $cantidad = $_POST['cantidad'];
    $costo = $_POST['costo'];
    $date = $_POST['date'];



$query = "INSERT INTO refacciones (refaccion,vehiculo,cantidad, costo, fecha) values ('$refaccion','$vehiculo','$cantidad','$costo','$date');";
$query_run = mysqli_query($conexion, $query);

if ($query_run) {
    header('location: ../refacciones.php');
}

}

if (isset($_POST['insertar'])) {

    $refaccion = $_POST['refaccion'];
    $vehiculo = $_POST['vehiculo'];




$query = "INSERT INTO trending (refaccion_trending, vehiculo_trending, cantidad_trending) values ('$refaccion', '$vehiculo',0);";
$query_run = mysqli_query($conexion, $query);


}

