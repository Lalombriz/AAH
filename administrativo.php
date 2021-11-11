<?php 
require "usuarios/verifica_sesion.php";
// $mysqli = new mysqli('localhost', 'root', '', 'hospital');
?>
<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema Hospitalario UNEME - Charts</title>
    <link rel="shortcut icon" href="img/Logos/Unidad.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">  
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <link rel="stylesheet"  type="text/css" href="datatables/DT/css/dataTables.bootstrap4.min.css">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3">UNEME BC</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="administrativo.php">
                    <i class="fas fa-fw fa-ho fa-calendar-check"></i>
                    <span>Pacientes Vigentes</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
  
            <!-- Heading -->
            <div class="sidebar-heading">
                Menu principal
            </div>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Opciones</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones Pacientes:</h6>
                        <a class="collapse-item" href="#" data-toggle="modal" data-target="#Data_Paciente">Registrar un paciente</a>
                        <a class="collapse-item" href="#" data-toggle="modal" data-target="#Usuarios">Crear Usuarios</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php  echo "Recepcionista:  " , $_SESSION['variable'];?> </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Ajustes">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ajustes
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Desconectar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lista de pacientes</h1>
                    </div>
                    
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Lista de pacientes -->
                        <div style="width:100%;">
                            <div class="border shadow">
                                <?php include_once "db/consulta_paciente.php"; ?>
                            </div>
                        </div>
                    </div>
                        
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;2020 - UNIDAD DE ESPECIALIDADES MEDICAS DE BAJA CALIFORNIA-</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seguro que deseas cerrar tu sesion?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona salir si estas seguro de cerrar tu sesion...</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="usuarios/log_out.php">Salir</a>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Ajustes -->
    <div class="modal fade" id="Ajustes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar la contraseña del Usuario</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" id="cantidad" name="cantidad" required>
                </div> 
              </div>
            <div class="modal-body">Presionar Aceptar para cambiar la contraseña del usuario</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="#">Cambiar</a>
            </div>
        </div>
    </div>
</div>


<!-- Registro de Usuarios -->
<div class="modal fade" id="Usuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registro de Usuarios</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
        <form action="administrativo.php" method="POST">
            <div class="row">   
                <div style=" margin-left: 25px;" class="col-md-5">
                    <label style="color: red;">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                    <br>
                </div> 

                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label style="color: red;">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre_doctor" name="nombre_doctor" required>
                    <br>
                </div> 

                <div style=" margin-left: 25px;" class="col-md-5">
                    <label style="color: red;">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                    <br>
                </div> 

                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label style="color: red;">Escuela de Estudios</label>
                    <input type="text" class="form-control" id="escuela" name="escuela" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label style="color: red;">Profesion</label>
                    <input type="text" class="form-control" id="prof" name="prof" >
                    <br>
                </div>
            
                <div style=" margin-left: 25px;" class="col-md-5">
                    <label style="color: red;">Cedula Profesional</label>
                    <input type="text" class="form-control" id="cedula" name="cedula" >
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-md-5">
                    <label style="color: red;">Especialidad</label>
                    <input type="text" class="form-control" id="esp" name="esp">
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-md-5">
                    <label style="color: red;">Cedula Especialidad</label>
                    <input type="text" class="form-control" id="cedula_esp" name="cedula_esp" >
                    <br>
                </div>
            
                <div class="col-md-5" >
                    <label style="margin-left: 25px;" for="usr">Tipo</label>
                        <select  type="text"name="tipo" id="tipo" style=" margin-left: 25px; display: block; background-color: #fff; background-clip: padding-box; border: 1px solid #d1d3e2; border-radius: .35rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
                            <option value="Enfermero">Enfermero</option>
                            <option value="Medico">Medico</option>
                            <option value="Anestesiologo">Anestesiologo</option>
                            <option value="Administrativo">Administrativo</option>
                        </select>
                        <br>
                </div>

            </div>
            <div class="modal-body" style="text-align: center;">Precionar aceptar para registrar el usuario</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" name="agregar" type="submit" style="background-color: seagreen;">Agregar</button>
            </div>
        </form>
        <?php include_once "db/insertar_doctor.php"; ?>  <!-- incluye captura de datos a bd -->
    </div>
    </div>
</div>

<!-- Registro de Pacientes -->
<div class="modal fade" id="Data_Paciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Datos de ingreso del paciente</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
        <form action="administrativo.php" method="POST">
            <div class="row">   
                <div style=" margin-left: 25px;" class="col-md-5">
                    <label style="color: red;">Fecha de ingreso</label>
                    <input type="date" class="form-control" id="date_in" name="date_in" required>
                    <br>
                </div> 

                <div style=" margin-left: 25px;" class="col-md-5">
                    <label style="color: red;">Nombre del paciente</label>
                    <input type="text" class="form-control" id="nombre_p" name="nombre_p" required>
                    <br>
                </div> 


                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label style="color: red;">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="date_nac" name="date_nac" required>
                    <br>
                </div> 


                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label style="color: red;">Direccion del paciente</label>
                    <input type="text" class="form-control" id="dir_p" name="dir_p" required>
                    <br>
                </div>
            

                <div style=" margin-left: 25px;" class="col-md-5">
                    <label style="color: red;">Telefono del paciente</label>
                    <input type="text" class="form-control" id="tel_p" name="tel_p" required>
                    <br>
                </div>
            
                <div style=" margin-left: 25px;" class="col-md-5">
                    <label style="color: red;">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label style="color: red;">Poblacion</label>
                    <input type="text" class="form-control" id="poblacion_p" name="poblacion_p" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label >Edad</label>
                    <input type="text" class="form-control" id="edad_p" name="edad_p" required>
                    <br>
                </div>
                
                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label >Numero de afiliacion</label>
                    <input type="text" class="form-control" id="num_afiliacion" name="num_afiliacion" required>
                    <br>
                </div>

                <div class="col-md-5" >
                    <label style="margin-left: 25px;" for="usr">Procedencia</label>
                        <select  type="text"name="proc" id="proc" style=" margin-left: 25px; display: block; background-color: #fff; background-clip: padding-box; border: 1px solid #d1d3e2; border-radius: .35rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
                            <option value="INSABI">INSABI</option>
                            <option value="IMSS">IMSS</option>
                            <option value="PRIVADO">PRIVADO</option>
                            <option value="ISSSTE">ISSSTE</option>
                        </select>
                        <br>
                </div> 
                
                <div class="col-md-5" >
                    <label style="margin-left: 25px;" for="usr">Sexo</label>
                        <select  type="text" name="sexo" id="sexo" style=" margin-left: 25px; display: block; background-color: #fff; background-clip: padding-box; border: 1px solid #d1d3e2; border-radius: .35rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <br>
                    </div>
                
                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label class=>Acompañante del paciente</label>
                    <input type="text" class="form-control" id="acompanante" name="acompanante" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label >Parentesco</label>
                    <input type="text" class="form-control" id="parentesco" name="parentesco" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label >Direccion de contacto</label>
                    <input type="text" class="form-control" id="contacto_p" name="contacto_p" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label >Telefono de contacto</label>
                    <input type="text" class="form-control" id="tel_c" name="tel_c" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label >Medico especialista</label>
                    <select  style="width: 400px;" id="medico" name="medico" required>
                    <option value="0">Seleccione:</option>
                    <?php include_once "cirugias/medicos.php"; ?>
                    </select>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label >Especialidad</label>
                    <input type="text" class="form-control" id="especialidad" name="especialidad" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label >Anestesiologo</label>
                    <select  style="width: 400px;" id="anestesiologo" name="anestesiologo" required>
                    <option value="0">Seleccione:</option>
                    <?php include_once "cirugias/anestesiologos.php"; ?>
                    </select>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label >Diagnostico</label>
                    <input type="text" class="form-control" id="diagnostico" name="diagnostico" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-md-5" >
                    <label >Procedimiento a realizar</label>
                    <select  style="width: 400px;" id="procedimiento" name="procedimiento" required>
                    <option value="0">Seleccione:</option>
                    <?php include_once "cirugias/procedimientos.php"; ?>
                    </select>
                 
                    <br>
                </div>

            </div>
            <div class="modal-body" style="text-align: center;">Precionar aceptar para ingresar al paciente</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" name="agregar" type="submit" style="background-color: seagreen;">Agregar</button>
            </div>
        </form>
        <?php include_once "db/insertar_paciente.php"; ?>  <!-- incluye captura de datos a bd -->
    </div>
    </div>
</div>
<div class="modal fade" id="details"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-left" id="myModalLabel">Datos del paciente</h4>
                <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="detalle_p">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                <div id="results"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cancel"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-left" id="myModalLabel">Cancelacion</h4>
                <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="administrativo.php" method="POST" class="form">
            <div class="modal-body">
                    <input type="hidden" name="cancel_id" id="cancel_id">
                    <div class="form-group">
                        <label id="c_citas">Motivo:</label>
                        <textarea type="text" class="form-control" name="motivo" id="motivo" required style="resize: none; width: 720px;height: 150px;" onblur="if (this.value == '') {this.value = 'Escribe aqui cual es el motivo de cancelar la cita...';}" onfocus="if (this.value == 'Escribe aqui cual es el motivo de cancelar la cita...') {this.value = '';}" ></textarea>
                        </label>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" name="aceptar_btn" type="submit">Aceptar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                <div id="results"></div>
            </div>
            </form>
            <?php include_once "db/cancelar_citas.php"; ?>
        </div>
    </div>
</div>
  
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="js/main.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
     
</body>

</html>