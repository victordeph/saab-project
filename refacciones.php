<?php
require_once "views/header.php";
?>

    <?php


    require 'controller/conexion.php';
    
    $query = "select * from refacciones";
    $query_run = mysqli_query($conexion, $query);
    $array = mysqli_fetch_array($query_run);

    ?>


    <div>

    </div>

    <div class="container">
        <h2>Refacciones</h2>
    
    <div class="container">

        <form class="form-inline buscar">
            <i class="fas fa-search" aria-hidden="true"></i>
            <input id="myInput" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Buscar" aria-label="Buscar">
            <button type="button" class="btn" id="añadir"><i class="fas fa-plus-square"></i> Añadir</button>
        </form>

        <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
        </script>

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
                    <tbody id="myTable">
                        <tr>
                            <td> <?php echo $row['id_refacciones'];?></td>
                            <td><?php echo $row['refaccion'];?></td>
                            <td><?php echo $row['vehiculo'];?></td>
                            <td><?php echo $row['cantidad'];?></td>
                            <td><?php echo $row['costo'];?></td>
                            <td><?php echo $row['fecha'];?></td>
                            <td><button type="button" class="btn modbtn" id="modificar"><i class="fas fa-pen"></i></button></td>
                            <td><button type="button" class="btn elibtn" id="eliminar"><i class="fas fa-trash-alt"></i></button></td>
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

        <!-- Modal -->
        <div class="modal fade" id="modificarModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
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
            
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="btnMod"> Modificar</button>
                        <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </form>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <script>
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
        </script>



<div class="container">

    <!-- Modal -->
    <div class="modal fade" id="añadirModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Añadir refaccion</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
                <div class="modal-body">
                <form role="form" action="controller/insertarRefaccion.php" method="POST" class="my-login-validation" novalidate="">
                <div class="form-group">
                    <label> Refaccion</label>
                    <input type="text" class="form-control" id="refaccion" name="refaccion"  required autofocus>
                        <div class="invalid-feedback">
                            Requerido!
                        </div>
                </div>
                <div class="form-group">
                    <label>Vehiculo</label>
                    <input type="text" class="form-control" id="vehiculo" name="vehiculo" required autofocus>
                    <div class="invalid-feedback">
                            Requerido!
                        </div>
                </div>
                <div class="form-group">
                    <label>Cantidad</label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad" required autofocus>
                    <div class="invalid-feedback">
                            Requerido!
                        </div>
                </div>
                <div class="form-group">
                    <label>Costo Unitario</label>
                    <input type="text" class="form-control" id="costo" name="costo" required autofocus>
                    <div class="invalid-feedback">
                            Requerido!
                        </div>
                </div>
                <div class="form-group">
                    <label>Fecha de ingreso</label>
                    <input type="text" class="form-control" id="date" name="date" required autofocus>
                    <div class="invalid-feedback">
                            Requerido!
                        </div>
                </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="insertar"> Añadir</button>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </form>
                </div>
            </div>
        </div>
        </div>
    </div>

        <script>
        $(document).ready(function(){
        $("#añadir").click(function(){
        $("#añadirModal").modal();
        });
    });
        </script>

    <div class="container">

        <!-- Modal -->
        <div class="modal fade" id="eliminarModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Deseas eliminar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">Esta accion no se puede deshacer</div>
                <div class="modal-footer">
                <form role="form" action="controller/eliminarRefaccion.php" method="POST">
                    <input type="hidden" name="eliId" id="eliId">
                        <button type="submit" class="btn btn-danger" name="btnEli">Eliminar</button>
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    </form>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <script>
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
require_once "views/footer.php";
?>
