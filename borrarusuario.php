<?php
$conexion = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($conexion, 'bdsaab');

if(isset($_POST['btnEli']))
{
    $id = $_POST['elid'];

    $query = "delete from catalogo where idusuario='$id' ";
    $query_run = mysqli_query($conexion, $query);

    echo $query;
    if($query_run)
    {
        echo '<script> alert("Datos eliminados"); </script>';
        header('Ubicacion: usuarioPrueba.php');
    }
    else
    {
        echo '<script> alert("Datos no se han eliminado"); </script>';
    }
}
?>
