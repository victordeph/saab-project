<?php
require_once "views/header.php";
?>

    <div class="container">
        <h2>
            Administración de Usuarios
            <span class="glyphicon glyphicon-user"></span>
            <button type="button" class="btn añadir" id="BtnAna"><i class="fas fa-plus-square"></i> Añadir</button>
        </h2>
        
        <div class="table-responsive">

            <?php
                require 'controller/conexion.php';

                $query = "select * from catalogo";
                $query_run = mysqli_query($conexion, $query);
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Departamento</th>
                        <th>Contraseña</th>
                        <th></th>
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
                            <td> <?php echo $row['idusuario']; ?> </td>
                            <td> <?php echo $row['usuario']; ?> </td>
                            <td> <?php echo $row['departamento']; ?> </td>
                            <td> <?php echo $row['password']; ?> </td>
                            <td><button type="button" class="btn modbtn" id="myBtn"><i class="fas fa-pen"></i></button></td>
                            <td><button type="button" class="btn elibtn" id="BtnEli"><i class="fas fa-trash-alt"></i></button></td>
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
        <div class="modal fade" id="modMod" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Modificar</h4>
                </div>
                    <form role="form" action="modusuario.php" method="POST">
                    <div class="modal-body">
                    <input type="hidden" name="modId" id="modId" disable>
                    <div class="form-group">
                            <input type="hidden" name="txtId">
                        <label>Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="" >
                    </div>
                    <div class="form-group">
                        <label>Departamento</label>
                        <input type="text" class="form-control" name="departamento" id="departamento" placeholder="" >
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block" name="btnMod"> Modificar</button>
                    <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>

        <script>
        $(document).ready(function(){
            $('.modbtn').on('click', function() {

                $('#modMod').modal('show');
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#modId').val(data[0]);
                    $('#usuario').val(data[1]);
                    $('#departamento').val(data[2]);
                    $('#password').val(data[3]);
            });
        });
        </script>

<!-- Eliminar -->
        <div class="container">
            <!-- Modal -->
            <div class="modal fade" id="eliMod" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color:Indianred">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6>Eliminar</h6>
                    </div>
                        <form role="form" action="borrarusuario.php" method="POST">
                        <div class="modal-body">
                        <input type="hidden" name="elid" id="elid">
                        <h4>¿Desea borrar estos datos? </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="btnEli" class="btn btn-primary btn-block" style="background-color:black"> Eliminar</button>
                        <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            <script>
            $(document).ready(function(){
                $('.elibtn').on('click', function() {
                    $('#eliMod').modal('show');
                        $tr = $(this).closest('tr');
                        var data = $tr.children("td").map(function() {
                            return $(this).text();
                        }).get();
                        console.log(data);
                        $('#elid').val(data[0]);
                });
            });
            </script>

<!-- Añadir -->
<div class="container">

    <!-- Modal -->
    <div class="modal fade" id="myModalA" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#5BB85D">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5>Añadir</h5>
            </div>
                <form action="insertarusuario.php" method="POST">

                <div class="modal-body">

                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" name="usuario" class="form-control" id="usuario" placeholder="">
                </div>

                <div class="form-group">
                    <label>Departamento</label>
                    <input type="text" name="departamento" class="form-control" id="departamento" placeholder="">
                </div>

                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="text" name="password" class="form-control" id="password" placeholder="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="insert" class="btn btn-primary btn-block" style="background-color:#5BB85D">Añadir</button>
                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        $("#BtnAna").click(function(){
        $("#myModalA").modal();
        });
    });
    </script>

<?php
require_once "views/footer.php";
?>