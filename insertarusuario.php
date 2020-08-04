<?php
$conexion = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($conexion, 'bdsaab');

if(isset($_POST['insert']))
{

    $usuario = $_POST['usuario'];
    $departamento = $_POST['departamento'];

    $query = "insert into catalogo (usuario, departamento) values ('$usuario', '$departamento')";
    $query_run = mysqli_query($conexion, $query);

    if($query_run)
    {
        echo '<script> alert("Datos guardados"); </script>';
        header('location: usuarioPrueba.php');
    }
    else
    {
        echo '<script> alert("Datos no se han guardado"); </script>';
    }
}
?>
