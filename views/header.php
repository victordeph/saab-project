    <?php
    session_start();
    $user = $_SESSION['user'];

    ?>
    
    <!DOCTYPE html>
    <html lang="en">

    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SAAB</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Links refacciones y usuarios -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/refacciones.css">
    <link rel="stylesheet" href="css/AdminU.css">
    <!-- End inks refacciones y usuarios-->

    </head>

    <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <?php 
        if (!isset($user)) {
            header("location: login.html");
        }else{
        ?>

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cogs"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SAAB <sup>Admin</sup></div>
            <div class="sidebar-heading">
                <?php 
                echo $user;  
                } ?>
        </div>
        </a>

        

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="refacciones.php">
            <i class="fas fa-warehouse"></i>
            <span>Inventario</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Modulos
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-sign-in-alt"></i>
            <span>Acceso</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="usuarios.php">Usuarios</a>
            </div>
            </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Pedidos
        </div>

        <li class="nav-item">
            <a class="nav-link" href="todos.php">
            <i class="fas fa-chart-bar"></i>
            <span>Todos los pedidos</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#departamento" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-filter"></i>
            <span>Por departamento</span>
            </a>
            <div id="departamento" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Administracion</h6> -->
                <a class="collapse-item" href="ventas.php">Ventas</a>
                <a class="collapse-item" href="colisiones.php">Colisiones</a>
                <a class="collapse-item" href="mecanica.php">Mecanica</a>
            </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.php">
            <i class="fas fa-thumbs-up"></i>
            <span>Mas solicitados</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Solicitar
        </div>

        <li class="nav-item">
            <a class="nav-link" href="solicitudRefacciones.php">
            <i class="fas fa-cart-plus"></i>
            <span>Refaccion</span></a>
        </li>

        

    
        
        
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>


            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
                    <i class="fas fa-user-shield" style="color: gray;"></i>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cerrar sesion
                    </a>
                </div>
                </li>

            </ul>

            </nav>
            <!-- End of Topbar -->
