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
    <title>Refacciones</title>
    <script>
        $(document).ready(function(){
        $("#añadir").click(function(){
        $("#añadirModal").modal();
        });
    });

    $(document).ready(function(){
            $('.modbtn').on('click', function() {

                $('#modificarModal').modal('show');
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#modId').val(data[0]);
                    $('#refaccion').val(data[1]);
                    $('#vehiculo').val(data[2]);
                    $('#cantidad').val(data[3]);
                    $('#costo').val(data[4]);
                    $('#date').val(data[5]);
            });
        });

    $(document).ready(function(){
                $('.elibtn').on('click', function() {
                    $('#eliminarModal').modal('show');
                        $tr = $(this).closest('tr');
                        var data = $tr.children("td").map(function() {
                            return $(this).text();
                        }).get();

                        console.log(data);

                        $('#eliId').val(data[0]);
                });
            });
    </script>

    <?php

    require 'controller/conexion.php';
    
    $query = "select * from refacciones";
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
        <h2>Refacciones</h2>
    <div class="añadir">
        <button type="button" class="btn btn-success" id="añadir">Añadir</button>
    </div>

        <div class="table-responsive">          
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Refaccion</th>
                        <th>Vehiculo</th>
                        <th>Cantidad</th>
                        <th>Costo U.</th>
                        <th>Fecha Ingreso</th>
                        <th></th>
                        <th></th>
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
                            <td> <?php echo $row['id_refacciones'];?></td>
                            <td><?php echo $row['refaccion'];?></td>
                            <td><?php echo $row['vehiculo'];?></td>
                            <td><?php echo $row['cantidad'];?></td>
                            <td>$<?php echo $row['costo'];?> MXN</td>
                            <td><?php echo $row['fecha'];?></td>
                            <td><button type="button" class="btn btn-primary modbtn" id="modificar">Modificar</button></td>
                            <td><button type="button" class="btn btn-danger elibtn" id="eliminar">Eliminar</button></td>
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

    <div class="container">
        
        <!-- Modal -->
        <div class="modal fade" id="modificarModal" role="dialog">
            <div class="modal-dialog">
            
                <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Modificar</h4>
                </div>
                    <div class="modal-body">
                    <form role="form" action="controller/modificarRefaccion.php" method="POST">
                    <input type="hidden" name="modId" id="modId" disable>
                    <div class="form-group">
                    <input type="hidden" name="txtId">
                        <label> Refaccion</label>
                        <input type="text" class="form-control" id="refaccion" name="refaccion" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Vehiculo</label>
                        <input type="text" class="form-control" id="vehiculo" name="vehiculo" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Costo Unitario</label>
                        <input type="text" class="form-control" id="costo" name="costo" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Fecha de ingreso</label>
                        <input type="text" class="form-control" id="date" name="date" placeholder="">
                    </div>
                        <button type="submit" class="btn btn-primary btn-block" name="btnMod"> Modificar</button>
                        <br>
                        <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    </div>
                </div>
            </div>
            </div> 
        </div>

        

<div class="container">
        
    <!-- Modal -->
    <div class="modal fade" id="añadirModal" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#5BB85D;" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5>Añadir nuevo</h5>
            </div>
                <div class="modal-body">
                <form role="form" action="controller/insertarRefaccion.php" method="POST">
                <div class="form-group">
                    <label> Refaccion</label>
                    <input type="text" class="form-control" id="refaccion" name="refaccion" placeholder="">
                </div>
                <div class="form-group">
                    <label>Vehiculo</label>
                    <input type="text" class="form-control" id="vehiculo" name="vehiculo" placeholder="">
                </div>
                <div class="form-group">
                    <label>Cantidad</label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="">
                </div>
                <div class="form-group">
                    <label>Costo Unitario</label>
                    <input type="text" class="form-control" id="costo" name="costo" placeholder="">
                </div>
                <div class="form-group">
                    <label>Fecha de ingreso</label>
                    <input type="text" class="form-control" id="date" name="date" placeholder="">
                </div>                

                    <button type="submit" class="btn btn-success btn-block" name="insertar"> Añadir</button>
                    <br>
                    <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
            <div class="modal-footer">
                </div>
            </div>
        </div>
        </div> 
    </div>

    <div class="container">
        
        <!-- Modal -->
        <div class="modal fade" id="eliminarModal" role="dialog">
            <div class="modal-dialog">
            
                <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#D9534F;" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5>¿Deseas eliminar?</h5>
                </div>
                    <div class="modal-body">
                    <form role="form" action="controller/eliminarRefaccion.php" method="POST">
                    <input type="hidden" name="eliId" id="eliId">
                    <!-- <div class="form-group">
                        <label> Refaccion</label>
                        <input type="text" class="form-control" id="refaccion" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Vehiculo</label>
                        <input type="text" class="form-control" id="vehiculo" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="text" class="form-control" id="cantidad" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Costo Unitario</label>
                        <input type="text" class="form-control" id="costo" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Fecha de ingreso</label>
                        <input type="text" class="form-control" id="date" placeholder="">
                    </div> -->
                        <button type="submit" class="btn btn-danger btn-block" name="btnEli">Eliminar</button>
                        <br>
                        <button type="submit" class="btn btn-primary btn-block" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    </div>
                </div>
            </div>
            </div> 
        </div>

</body>
</html>
