<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/refacciones.css">
    <title>Reportes</title>
    <script>

    </script>

    <?php

    require 'controller/conexion.php';
    
    $query = "select * from reportes";
    $query_run = mysqli_query($conexion, $query);
    $array = mysqli_fetch_array($query_run);
    
    ?>

</head>
<body>
    
    <header>
        <div class="logotipo">
            <img src="img/logo.png" alt="Logotipo">
        </div>
    </header>

    <div>

    </div>
    
    <div class="container">
        <h2>Refacciones Solicitadas</h2>
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary">Todas</button>
            <button type="button" class="btn btn-secondary">Departamento</button>
            <button type="button" class="btn btn-secondary">Más solicitadas</button>
        </div>
        <div class="table-responsive">          
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Refaccion</th>
                        <th>Vehiculo</th>
                        <th>Cantidad</th>
                        <th>Costo Unitario</th>
                        <th>Total</th>
                        <th>Fecha Solictud</th>
                        <th>Departamento</th>
                        <th># Refaccion</th>
                        <th>Status</th>
                        <!-- <th>Acciones</th> -->
                        
                    </tr>
                </thead>
                <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
                ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $row['id_reportes'];?></td>
                            <td><?php echo $row['refaccion_reportes'];?></td>
                            <td><?php echo $row['vehiculo_reportes'];?></td>
                            <td><?php echo $row['cantidad_reportes'];?></td>
                            <td><?php echo $row['costo_reportes'];?></td>
                            <td><?php echo $row['costo_total_reportes'];?></td>
                            <td><?php echo $row['fecha_solictud_reportes'];?></td>
                            <td><?php echo $row['departamento_reportes'];?></td>
                            <td><?php echo $row['id_refacciones'];?></td>
                            <td><button type="button" class="btn btn-secondary" id="modificar">En proceso</button></td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    }
                    else
                    {
                        echo "No se encuentra el registro";
                    }
                ?>
            </table>
        </div>
    </div>

</body>
</html>