<html lang="es">
<head>
<?php 
require "usuarios/verifica_sesion.php";
?>
<!DOCTYPE html>


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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3">UNEME BC</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="enfermeros.php">
                    <i class="fas fa-fw fa-ho fa-calendar-check"></i>
                    <span>Pacientes Vigentes</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
  
            <!-- Heading -->
            <div class="sidebar-heading">
                Menu principal Enfermeria
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
                        <a class="collapse-item" href="#" data-toggle="modal" data-target="#Usuarios"></a>
                        <a class="collapse-item" href="#" data-toggle="modal" data-target="#Usuarios"></a>
                        <a class="collapse-item" href="#" data-toggle="modal" data-target="#Usuarios"></a>
                        <a class="collapse-item" href="#" data-toggle="modal" data-target="#Usuarios"></a>
                        <a class="collapse-item" href="#" data-toggle="modal" data-target="#Usuarios"></a>
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
                                <?php  echo "Enfermero: ",$_SESSION['variable']; ?> </span>
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
                                <a class="dropdown-item" href="#">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Ajustes">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ajustes
                                </a>
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
                                <?php include_once "db/consulta_paciente_enfermero.php"; ?>
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
                <a class="btn btn-primary" href="login.php">Cambiar</a>
            </div>
        </div>
    </div>
</div>

<!-- Detalles de una paciente -->
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

<!-- Cambio de estatus -->
<div class="modal fade" id="modal_estatus"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-left" id="myModalLabel">Cambio de estatus</h4>
                <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="enfermeros.php" method="POST" class="form">
            <div class="modal-body">
                <input type="hidden" name="estatus_id" id="estatus_id">
                <div id="checkboxes">
                    <ul name="select_estatus" id="select_estatus" style="list-style: none;">
                        <li><input type="checkbox" name="e_alta" id="e_alta">Alta</li>
                        <li><input type="checkbox" name="e_operacion" id="e_operacion">En operacion</li>
                        <li><input type="checkbox" name="e_recuperacion" id="e_recuperacion">Recuperacion</li>
                        <li><input type="checkbox" name="e_traslado" id="e_traslado">Traslado</li>
                    </ul>
                    <input type="hidden" value="0" name="selected_e" id="selected_e">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary estatus_btn" name="estatus_btn" type="submit">Aceptar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                <div id="results"></div>
            </div>
            </form>
            <?php include_once "db/cambiar_estatus.php"; ?>
        </div>
    </div>
</div>

<!-- Modal archivos -->
<div class="modal fade" id="archivos"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-left" id="myModalLabel">Menu de Opciones del Paciente</h4>
                <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body btn-group">
                    <input type="hidden" name="imprimir_id" id="imprimir_id" value="imprimir_id">
                    <a class="btn"  href="db/hoja_valoracion.php?" onclick="window.location=this.href+'id='+document.getElementById('imprimir_id').value; " target="_blank">Valoracion de alta recuperacion</a>
                    <a class="btn btn_IS" href="#" data-dismiss="modal">Indicadores de seguridad</a>
                    <a class="btn" style="color: black;" data-toggle="modal" data-target="#menu_seguridad">Lista de verificacion de la seguridad de la cirugia</a>
                    <!--target="_blank" href="db/hoja_verificacion.php?" onclick="window.location=this.href+'id='+document.getElementById('imprimir_id').value;"-->
                    <a class="btn" style="color: black;" data-toggle="modal" data-target="#menu" onclick="window.location+'id='+document.getElementById('imprimir_id').value;">Hoja Registro de enfermeria</a>
                    <!--target="_blank" href="db/hoja_registro_enfermeria.php?" onclick="window.location=this.href+'id='+document.getElementById('imprimir_id').value;"-->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal indicadores de la cirugia -->
<div class="modal fade" id="modal_indicador_seguridad"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-left" id="myModalLabel">Indicadores de seguridad</h4>
                <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="db/hoja_indicadores.php" method="POST" class="form">
            <div class="modal-body">
                <div class="row">  
                    <input type="hidden" name="indicador_id" id="indicador_id" value="indicador_id"> 
                    <div style=" margin-left: 25px;" class="col-md-5">
                        <label>PROCEDIMIENTO QUIRURGICO</label>
                        <input type="text" class="form-control" id="PQ" name="PQ" required>
                        <br>
                    </div>
                    <div style=" margin-left: 25px;" class="col-md-5">
                        <label>CIRUJANO</label>
                        <input type="text" class="form-control" id="CJ" name="CJ" required>
                        <br>
                    </div>
                    <div style=" margin-left: 25px;" class="col-md-5">
                        <label>ENFERMERA CIRCULANTE</label>
                        <input type="text" class="form-control" id="EC" name="EC" required>
                        <br>
                    </div>
                    <div style=" margin-left: 25px;" class="col-md-5">
                        <label>ENFERMERA QUIRURGICA</label>
                        <input type="text" class="form-control" id="EQ" name="EQ" required>
                        <br>
                    </div>
                    <div style=" margin-left: 25px;" class="col-md-5">
                        <label>INFECCIONES PREVIAS</label>
                        <input type="text" class="form-control" id="IP" name="IP" required>
                        <br>
                    </div>
                    <div style=" margin-left: 25px;" class="col-md-5">
                        <label>PACIENTE DIABETICO</label><br>
                        <ul name="select_pd" id="select_pd" style="list-style: none;">
                            <li><input type="checkbox" id="a" name="a">SI</li>
                            <li><input type="checkbox" id="b" name="b">NO</li>
                        </ul>
                        <br>
                    </div>
                    <div style=" margin-left: 25px;" class="col-md-5">
                        <label>NOMBRE ANTIBIOTICO</label>
                        <input type="text" class="form-control" id="NA" name="NA" required>
                        <br>
                    </div>
                    <div style=" margin-left: 25px;" class="col-md-5">
                        <label>HORA ANTIBIOTICO</label>
                        <input type="time" class="form-control" id="HA" name="HA" required>
                        <br>
                    </div>
                    <div style=" margin-left: 25px;" class="col-md-5">
                        <label>ANTISEPSIA</label>
                        <input type="text" class="form-control" id="AS" name="AS" required>
                        <br>
                    </div>
                    <div style=" margin-left: 25px;" class="col-md-5">
                        <label>HORA ANTISEPSIA</label>
                        <input type="time" class="form-control" id="HAS" name="HAS" required>
                        <br>
                    </div>
                    <div style=" margin-left: 25px;" class="col-md-5">
                        <label>INICIO CIRUGIA</label>
                        <input type="time" class="form-control" id="IC" name="IC" required>
                        <br>
                    </div>
                    <div style=" margin-left: 25px;" class="col-md-5">
                        <label>TERMINA CIRUGIA</label>
                        <input type="time" class="form-control" id="TC" name="TC" required>
                        <br>
                    </div>
                    <input type="hidden" value="0" name="selected_pd" id="selected_pd">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary indicadores_btn" name="aceptar" type="submit">Aceptar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modales de funciones de enfermeria -->
<!-- MODAL MENU HOJAS ENFERMERIA  -->
<div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sl " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">OPCIONES AREA ENFERMERIA</h5>

            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
        </div>

        
            <div class="col-sm-3 " style=" display:inline-block; text-align: center;">
                       <div  style=" display:inline-block; text-align: center; margin-top: 30px; margin-left: 150px;">
                            
                            <input type="hidden" name="imprimir_id" id="imprimir_id" value="imprimir_id">
                            <button class="btn btn-secondary" data-toggle="modal" data-target="#preparacion" style="background-color: #ff6961;margin-bottom: 10px; color: black;" >HOJA DE PREPARACION</button>
                            <button class="btn btn-secondary" data-toggle="modal" data-target="#quirofano" style="background-color: #84b6f4;margin-bottom: 10px; color: black;">HOJA DE QUIROFANO </button>
                            <button class="btn btn-secondary" data-toggle="modal" data-target="#recu_inmediata" style="background-color: #fdfd96;margin-bottom: 10px; color: black;">HOJA DE RECUPERACION INMEDIATA</button>
                            <button class="btn btn-secondary" data-toggle="modal" data-target="#recu" style="background-color:#ffda9e;margin-bottom: 10px; color: black;">HOJA DE RECUPERACION TARDIA</button>
                            
                            <a class="btn btn-secondary"  href="db/hoja_registro_enfermeria.php?" onclick="window.location=this.href+'id='+document.getElementById('imprimir_id').value;"  style="background-color:#b6ead7;margin-bottom: 10px; color: black;" target="_blank">Impresion Expediente Enfermeria</a>

                        
            </div>   
                       </div>


            <div class="modal-body" style="text-align: center;"></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal"  style="background-color: red;">Cerrar</button>
            </div>
        
        
    </div>
    </div>
</div>

<!-- MODAL MENU SEGURIDAD DE LA CIRUGIA  -->
<div class="modal fade" id="menu_seguridad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm " role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">SEGURIDAD DE LA CIRUGIA</h6>
    
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
    
            
                <div class="col-sm-3 " style=" display:inline-block; text-align: center;">
                           <div  style=" display:inline-block; text-align: center; margin-top: 30px; margin-left: 80px;">
                            
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#fase1" style="background-color: #ff6961;margin-bottom: 10px; color: black;" >FASE 1: ENTRADA</button>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#fase2" style="background-color: #fdfd96;margin-bottom: 10px; color: black;">FASE 2: PAUSA</button>
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#fase3" style="background-color: #77dd77; color: black;">FASE 3: SALIDA</button>
    
                            
                            </div>   
                </div>
    
    
                <div class="modal-body" style="text-align: center;"></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal"  style="background-color: red;">Cerrar</button>
                </div>
            
            
        </div>
        </div>
</div>
<!-- Hoja de Registro de Enfermeria -->

<!-- preparacion-->
<div class="modal fade" id="preparacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE ENFERMERIA - HOJA DE PREPARACION</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button> 
        </div>
        <h6 style="margin-left: 25px; margin-top: 20px;"> NOMBRE DEL PACIENTE: </h6>
        <h6 style="margin-left: 25px; margin-top: 20px;"> NUMERO DE EXPEDIENTE UNEME: </h6>
        <form action="·" method="POST">
            <div class="row">   
                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">TEMPERATURA</label>
                    <input style="width: 100px;" type="text" class="form-control" id="tmp" name="tmp" required>
                    <br>
                </div> 

                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">FRECUENCIA CARDIACA</label>
                    <input style="width: 100px;" type="text" class="form-control" id="fc" name="fc" required>
                    <br>
                </div> 


                <div style=" margin-left: 25px;" class="col-sm-3" >
                    <label style="color: red;">FRECUENCIA RESPIRATORIA</label>
                    <input style="width: 100px;" type="text" class="form-control" id="fr" name="fr" required>
                    <br>
                </div> 


                <div style=" margin-left: 25px;" class="col-sm-3" >
                    <label style="color: red;">TENSION ARTERIAL</label>
                    <input style="width: 100px;" type="text" class="form-control" id="ta" name="ta" required>
                    <br>
                </div>
            

                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">DX.TX</label>
                    <input style="width: 100px;" type="text" class="form-control" id="dxtx" name="dxtx" required>
                    <br>
                </div>

                <!-- area de textos -->
                    
                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">MEDICAMENTOS</label>
                    <!-- <input type="text-area" class="form-control" id="esp" name="esp"> -->
                    <textarea style = "height: 80px;" class="form-control" id="esp" name="esp" rows="10" cols="30" placeholder="ESCRIBE AQUI TUS MEDICAMENTOS...."></textarea>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">SOLUCION</label>
                    <!-- <input type="text-area" class="form-control" id="esp" name="esp"> -->
                    <textarea style = "height: 80px;" class="form-control" id="esp" name="esp" rows="10" cols="30" placeholder="ESCRIBE AQUI TUS SOLUCIONES...."></textarea>
                    <br>
                </div>

            </div>

            <h5 style="margin-left: 25px;">REPORTE DE ENFERMERIA</h5>
            <div class="row">   
                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">AYUNO</label>
                    <input style="width: 100px;" type="text" class="form-control" id="ayuno" name="ayuno" required>
                    <br>
                </div> 

                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">CX</label>
                    <input style="width: 100px;" type="text" class="form-control" id="cx" name="cx" required>
                    <br>
                </div> 


                <div style=" margin-left: 25px;" class="col-sm-3" >
                    <label style="color: red;">ALERGIAS</label>
                    <input style="width: 100px;" type="text" class="form-control" id="al" name="al" required>
                    <br>
                </div> 


                <div style=" margin-left: 25px;" class="col-sm-3" >
                    <label style="color: red;">TRANSFUCIONES</label>
                    <input style="width: 100px;" type="text" class="form-control" id="ts" name="ts" required>
                    <br>
                </div>
            

                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">TOXICO</label>
                    <input style="width: 100px;" type="text" class="form-control" id="tox" name="tox" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">PROTESIS</label>
                    <input style="width: 100px;" type="text" class="form-control" id="tox" name="tox" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">Med.AGREO.</label>
                    <input style="width: 100px;" type="text" class="form-control" id="med" name="med" required>
                    <br>
                </div>

            </div>

                
            <div class="modal-body" style="text-align: center;">PRESIONE ENVIAR PARA GUARDAR LA HOJA DE PREPARACION EN EL SISTEMA</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" name="agregar" type="submit" style="background-color: seagreen;">Enviar</button>
            </div>
        </form>
        <?php include_once "db/insertar_doctor.php"; ?>  <!-- incluye captura de datos a bd -->
    </div>
    </div>
</div>

<!-- quirofano -->
<div class="modal fade" id="quirofano" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE ENFERMERIA - HOJA DE QUIROFANO</h5>

            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
        </div>
        <form action="·" method="POST">
            <div class="row">   
                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">CIRUJANO</label>
                    <input style="width: 50px;" type="text" class="form-control" id="cirujano" name="cirujano" required>
                    <br>
                </div> 

                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">AYUDANTE</label>
                    <input style="width: 150px;" type="text" class="form-control" id="ayudante" name="ayudante" required>
                    <br>
                </div> 


                <div style=" margin-left: 25px;" class="col-sm-3" >
                    <label style="color: red;">ANESTESIOLOGO</label>
                    <input style="width: 150px;" type="text" class="form-control" id="anestesiologo" name="anestesiologo" required>
                    <br>
                </div> 


                <div style=" margin-left: 25px;" class="col-sm-3" >
                    <label style="color: red;">TIPO DE ANESTESIA</label>
                    <input style="width: 150px;" type="text" class="form-control" id="anestesia" name="anestesia" required>
                    <br>
                </div>
            

                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">DIAGNOSTICO</label>
                    <input style="width: 150px;" type="text" class="form-control" id="diagnostico" name="diagnostico" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">CX. REALIZADA</label>
                    <input style="width: 150px;" type="text" class="form-control" id="cxrealizada" name="cxrealizada" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">ENFERMERA QCA.</label>
                    <input style="width: 150px;" type="text" class="form-control" id="qca" name="qca" required>
                    <br>
                </div>

                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">CIRCULANTE</label>
                    <input style="width: 150px;" type="text" class="form-control" id="circulante" name="circulante" required>
                    <br>
                </div>

            </div>

            <div style=" margin-left: 25px;" class="col-sm-3">
                <label style="color: red;">HORA DE INGRESO</label>
                <input  type="time" class="form-control" id="ingreso" name="ingreso" required>
                <br>
            </div>

            <div style=" margin-left: 25px;" class="col-sm-3">
                <label style="color: red;">INICIO</label>
                <input  type="time" class="form-control" id="inicio" name="inicio" required>
                <br>
            </div>

            <div style=" margin-left: 25px;" class="col-sm-3">
                <label style="color: red;">TERMINA</label>
                <input  type="time" class="form-control" id="termina" name="termina" required>
                <br>
            </div>

            <div style=" margin-left: 25px;" class="col-sm-3">
                <label style="color: red;">EGRESA</label>
                <input  type="time" class="form-control" id="egresa" name="egresa" required>
                <br>
            </div>

            
            <h5 style=" margin-left: 25px;">REPORTE DE ENFERMERIA TRANSOPERATORIO:</h5>
            <div style=" margin-left: 25px;" class="col-sm-3">
               
                <label style="color: red;">REPORTE</label>
                <!-- <input type="text-area" class="form-control" id="esp" name="esp"> -->
                <textarea style = "height: 80px; width: 900px;" class="form-control" id="reporte" name="reporte" rows="10" cols="30" placeholder="ESCRIBA SU REPORTE AQUI....."></textarea>
                <br>
            </div>

                <!-- area de insumos-->
            <div class="row"> 
                  
                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">INGRESOS</label>
                    <textarea style = "height: 80px;" class="form-control" id="medicamento_2" name="medicamento_2" rows="10" cols="30" placeholder="ESCRIBE TUS MEDICAMENTOS AQUI..."></textarea>
                    <textarea style = "height: 80px;" class="form-control" id="soluciones" name="soluciones" rows="10" cols="30" placeholder="ESCRIBE TUS SOLUCIONES AQUI..."></textarea>
                    <br>
                </div> 

                <div style=" margin-left: 25px;" class="col-sm-3">
                    <label style="color: red;">EGRESOS</label>
                    <textarea style = "height: 80px;" class="form-control" id="diuresis" name="med" rows="10" cols="30" placeholder="ESCRIBE AQUI TUS DIURESIS"></textarea>
                    <textarea style = "height: 80px;" class="form-control" id="sangrado" name="sol" rows="10" cols="30" placeholder="ESCRIBE AQUI SUS SANGRADOS"></textarea>
                    <br>
                </div>

            </div>
            <h5 style=" margin-left: 25px;">CUENTA COMPLETA:</h5>
            
            <div style=" margin-left: 25px;" class="col-sm-3" >

                <input type="radio" id="gasas" name="gasas" value="X">
                <input style="width: 80px;" type="number" for="gasas">
                <label for="gasas">GASAS</label><br>
                
                <input type="radio" id="compresas" name="compresas" value="X">
                <input style="width: 80px;" type="number" for="compresas">
                <label for="compresas">COMPRESAS</label><br>

                <input type="radio" id="otros" name="otros" value="X">
                <input style="width: 80px;" type="number" for="otros">
                <label for="otros">OTROS</label>
            </div> 


            <div class="modal-body" style="text-align: center;">PRESIONE ENVIAR PARA GUARDAR LA HOJA DE QUIROFANO EN EL SISTEMA</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" name="agregar" type="submit" style="background-color: seagreen;">Enviar</button>
                <button class="btn btn-primary" name="agregar" type="submit" style="background-color: rgb(41, 128, 185);">Editar</button>
            </div>
        </form>
        <?php include_once "db/insertar_doctor.php"; ?>  <!-- incluye captura de datos a bd -->
    </div>
    </div>
</div>

<!-- RECUPERACION INMEDIATA -->
<div class="modal fade" id="recu_inmediata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE ENFERMERIA - HOJA DE RECUPERACION INMEDIATA</h5>

            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
        </div>

        <form action="·" method="POST">
            <!-- area de insumos-->
            <div class="table-responsive" style=" margin-top: 20PX;">
               <table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
                   <thead style="text-align: center;">
                       <tr>
                           <th>HORA</th>
                           <th>T/A</th>
                           <th>FR.</th>
                           <th>FC.</th>
                           <th>Tº</th>
                           <th>SAT,02</th>
                           <th>MEDICAMENTOS</th>
                       </tr>
                   </thead>
                   <tbody class="tabla">
                       <tr>
                           <td><input style = "width: 130px" type="time" name="hora1"></td>
                           <td><input style = "width: 130px" type="text" name="ta1"></td>
                           <td><input style = "width: 130px" type="text" name="fr1"></td>
                           <td><input style = "width: 130px" type="text" name="fc1"></td>
                           <td><input style = "width: 130px" type="text" name="t1"></td>
                           <td><input style = "width: 130px" type="text" name="sat1"></td>
                           <td><input style = "width: 130px" type="text" name="med1"></td>
                       </tr>
                       <tr>
                           <td><input style = "width: 130px"  type="time" name="hora2"></td>
                           <td><input style = "width: 130px"  type="text" name="ta2"></td>
                           <td><input style = "width: 130px"  type="text" name="fr2"></td>
                           <td><input style = "width: 130px"  type="text" name="fc2"></td>
                           <td><input style = "width: 130px"  type="text" name="t2"></td>
                           <td><input style = "width: 130px"  type="text" name="sat2"></td>
                           <td><input style = "width: 130px"  type="text" name="med2"></td>
                       </tr>
                       <tr>
                           <td><input style = "width: 130px"  type="time" name="hora3"></td>
                           <td><input style = "width: 130px"  type="text" name="ta3"></td>
                           <td><input style = "width: 130px"  type="text" name="fr3"></td>
                           <td><input style = "width: 130px"  type="text" name="fc3"></td>
                           <td><input style = "width: 130px"  type="text" name="t3"></td>
                           <td><input style = "width: 130px"  type="text" name="sat3"></td>
                           <td><input style = "width: 130px"  type="text" name="med3"></td>
                       </tr>
                       <tr>
                           <td><input style = "width: 130px"  type="time" name="hora4"></td>
                           <td><input style = "width: 130px"  type="text" name="ta4"></td>
                           <td><input style = "width: 130px"  type="text" name="fr4"></td>
                           <td><input style = "width: 130px"  type="text" name="fc4"></td>
                           <td><input style = "width: 130px"  type="text" name="t4"></td>
                           <td><input style = "width: 130px"  type="text" name="sat4"></td>
                           <td><input style = "width: 130px"  type="text" name="med4"></td>
                       </tr>
                       <tr>
                           <td><input style = "width: 130px"  type="time" name="hora5"></td>
                           <td><input style = "width: 130px"  type="text" name="ta5"></td>
                           <td><input style = "width: 130px"  type="text" name="fr5"></td>
                           <td><input style = "width: 130px"  type="text" name="fc5"></td>
                           <td><input style = "width: 130px"  type="text" name="t5"></td>
                           <td><input style = "width: 130px"  type="text" name="sat5"></td>
                           <td><input style = "width: 130px"  type="text" name="med5"></td>
                       </tr>
                       <tr>
                           <td><input style = "width: 130px"  type="time" name="hora6"></td>
                           <td><input style = "width: 130px"  type="text" name="ta6"></td>
                           <td><input style = "width: 130px"  type="text" name="fr6"></td>
                           <td><input style = "width: 130px"  type="text" name="fc6"></td>
                           <td><input style = "width: 130px"  type="text" name="t6"></td>
                           <td><input style = "width: 130px"  type="text" name="sat6"></td>
                           <td><input style = "width: 130px"  type="text" name="med6"></td>
                       </tr>
                   </tbody>
               </table>
           </div>

           <div class="row">

               <div style=" margin-left: 25px;" class="col-sm-3">
               <label>REPORTE DE ENFERMERIA</label>
               <textarea style = "height: 80px; width: 500px;" class="form-control" id="recu_reporte" name="recu_reporte" rows="10" cols="30" placeholder="ESCRIBA SU REPORTE DE ENFERMERIA"></textarea>
               </div>
               
           </div>
            
            <div class="row"> 
               <div style=" margin-left: 20px; margin-top: 20PX;" >
              
                   <div class="table-responsive">
                       <table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
                           
                           <tbody class="tabla">
                               <tr>
                                   <th>SANGRADO</th>
                                   <td><input style = "width: 130px" type="text" name="hora1"></td>
                                   <td><input style = "width: 130px" type="text" name="ta1"></td>
                                   <td><input style = "width: 130px" type="text" name="fr1"></td>
                            
                               </tr>
                               <tr>
                                   <th>DIURESIS</th>
                                   <td><input style = "width: 130px"  type="text" name="hora2"></td>
                                   <td><input style = "width: 130px"  type="text" name="ta2"></td>
                                   <td><input style = "width: 130px"  type="text" name="fr2"></td>
                              
                               </tr>
                               <tr>
                                   <th>EMESIS</th>
                                   <td><input style = "width: 130px"  type="text" name="hora3"></td>
                                   <td><input style = "width: 130px"  type="text" name="ta3"></td>
                                   <td><input style = "width: 130px"  type="text" name="fr3"></td>
                                  
                               </tr>
                               
                           </tbody>
                       </table>
                   </div>
               </div>

           </div>


       <div class="modal-body" style="text-align: center;">PRESIONE ENVIAR PARA GUARDAR LA HOJA DE RECUPERACION EN EL SISTEMA</div>
       <div class="modal-footer">
           <button class="btn btn-secondary" name="agregar" type="submit" style="background-color: seagreen;">Enviar</button>
           <button class="btn btn-primary" name="agregar" type="submit" style="background-color: rgb(41, 128, 185);">Editar</button>
       </div>
   </form>
        <?php include_once "db/insertar_doctor.php"; ?>  <!-- incluye captura de datos a bd -->
    </div>
    </div>
</div>

<!-- RECUPERACION  -->
<div class="modal fade" id="recu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE ENFERMERIA - HOJA DE RECUPERACION</h5>

            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
        </div>

        <form action="·" method="POST">
                 <!-- area de insumos-->
                 <div class="table-responsive" style=" margin-top: 20PX;">
                    <table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
                        <thead style="text-align: center;">
                            <tr>
                                <th>HORA</th>
                                <th>T/A</th>
                                <th>FR.</th>
                                <th>FC.</th>
                                <th>Tº</th>
                                <th>SAT,02</th>
                                <th>MEDICAMENTOS</th>
                            </tr>
                        </thead>
                        <tbody class="tabla">
                            <tr>
                                <td><input style = "width: 130px" type="time" name="hora1"></td>
                                <td><input style = "width: 130px" type="text" name="ta1"></td>
                                <td><input style = "width: 130px" type="text" name="fr1"></td>
                                <td><input style = "width: 130px" type="text" name="fc1"></td>
                                <td><input style = "width: 130px" type="text" name="t1"></td>
                                <td><input style = "width: 130px" type="text" name="sat1"></td>
                                <td><input style = "width: 130px" type="text" name="med1"></td>
                            </tr>
                            <tr>
                                <td><input style = "width: 130px"  type="time" name="hora2"></td>
                                <td><input style = "width: 130px"  type="text" name="ta2"></td>
                                <td><input style = "width: 130px"  type="text" name="fr2"></td>
                                <td><input style = "width: 130px"  type="text" name="fc2"></td>
                                <td><input style = "width: 130px"  type="text" name="t2"></td>
                                <td><input style = "width: 130px"  type="text" name="sat2"></td>
                                <td><input style = "width: 130px"  type="text" name="med2"></td>
                            </tr>
                            <tr>
                                <td><input style = "width: 130px"  type="time" name="hora3"></td>
                                <td><input style = "width: 130px"  type="text" name="ta3"></td>
                                <td><input style = "width: 130px"  type="text" name="fr3"></td>
                                <td><input style = "width: 130px"  type="text" name="fc3"></td>
                                <td><input style = "width: 130px"  type="text" name="t3"></td>
                                <td><input style = "width: 130px"  type="text" name="sat3"></td>
                                <td><input style = "width: 130px"  type="text" name="med3"></td>
                            </tr>
                            <tr>
                                <td><input style = "width: 130px"  type="time" name="hora4"></td>
                                <td><input style = "width: 130px"  type="text" name="ta4"></td>
                                <td><input style = "width: 130px"  type="text" name="fr4"></td>
                                <td><input style = "width: 130px"  type="text" name="fc4"></td>
                                <td><input style = "width: 130px"  type="text" name="t4"></td>
                                <td><input style = "width: 130px"  type="text" name="sat4"></td>
                                <td><input style = "width: 130px"  type="text" name="med4"></td>
                            </tr>
                            <tr>
                                <td><input style = "width: 130px"  type="time" name="hora5"></td>
                                <td><input style = "width: 130px"  type="text" name="ta5"></td>
                                <td><input style = "width: 130px"  type="text" name="fr5"></td>
                                <td><input style = "width: 130px"  type="text" name="fc5"></td>
                                <td><input style = "width: 130px"  type="text" name="t5"></td>
                                <td><input style = "width: 130px"  type="text" name="sat5"></td>
                                <td><input style = "width: 130px"  type="text" name="med5"></td>
                            </tr>
                            <tr>
                                <td><input style = "width: 130px"  type="time" name="hora6"></td>
                                <td><input style = "width: 130px"  type="text" name="ta6"></td>
                                <td><input style = "width: 130px"  type="text" name="fr6"></td>
                                <td><input style = "width: 130px"  type="text" name="fc6"></td>
                                <td><input style = "width: 130px"  type="text" name="t6"></td>
                                <td><input style = "width: 130px"  type="text" name="sat6"></td>
                                <td><input style = "width: 130px"  type="text" name="med6"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">

                    <div style=" margin-left: 25px;" class="col-sm-3">
                    <label>REPORTE DE ENFERMERIA</label>
                    <textarea style = "height: 80px; width: 500px;" class="form-control" id="recu_reporte" name="recu_reporte" rows="10" cols="30" placeholder="ESCRIBA SU REPORTE DE ENFERMERIA"></textarea>
                    </div>
                    
                </div>
                 
                 <div class="row"> 
                    <div style=" margin-left: 20px; margin-top: 20PX;" >
                   
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
                                
                                <tbody class="tabla">
                                    <tr>
                                        <th>SANGRADO</th>
                                        <td><input style = "width: 130px" type="text" name="hora1"></td>
                                        <td><input style = "width: 130px" type="text" name="ta1"></td>
                                        <td><input style = "width: 130px" type="text" name="fr1"></td>
                                 
                                    </tr>
                                    <tr>
                                        <th>DIURESIS</th>
                                        <td><input style = "width: 130px"  type="text" name="hora2"></td>
                                        <td><input style = "width: 130px"  type="text" name="ta2"></td>
                                        <td><input style = "width: 130px"  type="text" name="fr2"></td>
                                   
                                    </tr>
                                    <tr>
                                        <th>EMESIS</th>
                                        <td><input style = "width: 130px"  type="text" name="hora3"></td>
                                        <td><input style = "width: 130px"  type="text" name="ta3"></td>
                                        <td><input style = "width: 130px"  type="text" name="fr3"></td>
                                       
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                </div>


            <div class="modal-body" style="text-align: center;">PRESIONE ENVIAR PARA GUARDAR LA HOJA DE RECUPERACION EN EL SISTEMA</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" name="agregar" type="submit" style="background-color: seagreen;">Enviar</button>
                <button class="btn btn-primary" name="agregar" type="submit" style="background-color: rgb(41, 128, 185);">Editar</button>
            </div>
        </form>
        <?php include_once "db/insertar_doctor.php"; ?>  <!-- incluye captura de datos a bd -->
    </div>
    </div>
</div>

<!-- verificacion de la seguridad de la cirugia -->
<!-- FASE 1 -->
<div class="modal fade" id="fase1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">LISTA DE VERIFICACION DE LA SEGURIDAD DE LA CIRUGIA - ENTRADA: ANTES DE LA INDUCCION DE LA ANESTESIA</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button> 
        </div>
        
        <form action="·" method="POST">
            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">EL CIRUJANO, EL ANESTESIOLOGO Y EL PERSONAL DE ENFERMERIA EN PRESENCIA DEL PACIENTE HAN CONFIRMADO:</h6>
            <div style=" margin-left: 25px;" class="col-sm-3" >

                <input type="radio" id="identidad" name="identidad" value="X">
                <label for="identidad">SU IDENTIDAD</label><br>
                
                <input type="radio" id="quirurgico" name="quirurgico" value="X">
                <label for="quirurgico">EL SITIO QUIRURGICO</label><br>

                <input type="radio" id="procedimiento" name="procedimiento" value="X">
                <label for="procedimiento">PROCEDIMIENTO QUIRURGICO</label>

                <input type="radio" id="consentimiento" name="consentimiento" value="X">
                <label for="consentimiento">SU CONSENTIMIENTO</label>
            </div> 

            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">¿EL ANESTESIOLOGO HA CONFIRMADO CON EL CIRUJANO QUE ESTE MARCADO EL SITIO QUIRURGICO?</h6> 
            <div style=" margin-left: 25px;" class="col-sm-3" >

                <input type="radio" id="si_confirmacion" name="si_confirmacion" value="X">
                <label for="si_confirmacion">SI</label><br>
                
                <input type="radio" id="no_confirmacion" name="no_confirmacion" value="X">
                <label for="no_confirmacion">NO</label><br>

            </div> 

            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">EL CIRUJANO HA CONFIRMADO LA ASEPSIA EN EL SITIO QUIRURGICO</h6> 
            <div style=" margin-left: 25px;" class="col-sm-3" >

                <input type="radio" id="si_asepsia" name="si_asepsia" value="X">
                <label for="si_confirmacion">SI</label><br>
                
                <input type="radio" id="no_asepsia" name="no_asepsia" value="X">
                <label for="no_asepsia">NO</label><br>

            </div> 

            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">EL ANESTESIOLOGO HA COLOCADO Y COMPROBADO QUE FUNCIONE EL OXIMETRO DE PULSO CORRECTAMENTE</h6> 
            <div style=" margin-left: 25px;" class="col-sm-3" >

                <input type="radio" id="si_oximetro" name="si_oximetro" value="X">
                <label for="si_oximetro">SI</label><br>
                
                <input type="radio" id="no_oximetro" name="no_oximetro" value="X">
                <label for="no_oximetro">NO</label><br>

            </div> 

            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">EL ANESTESIOLOGO HA CONFIRMADO SI EL PACIENTE TIENE:</h6> 
            <div style=" margin-left: 25px;"  >
                <hr>
                <h6>¿ALERGIAS CONOCIDAS?</h6>
                <input type="radio" id="si_alergias" name="si_alergias" value="X">
                <label for="si_alergias">SI</label>
                
                <br>
                <input type="radio" id="no_alergias" name="no_alergias" value="X">
                <label for="no_alergias">NO</label>
                <hr>
                <br>
                <h6>¿VIA AEREA DIFICIL Y/O RIESGO DE ASPIRACION?</h6>
                <input type="radio" id="si_aerea" name="si_aerea" value="X">
                <label for="si_aerea">SI</label>
                
                <br>
                <input type="radio" id="no_aerea" name="no_aerea" value="X">
                <label for="no_aerea">NO</label>
                <br><hr>

                <h6>¿VIA AEREA DIFICIL Y/O RIESGO DE ASPIRACION?</h6>
                <input type="radio" id="si_aeread" name="si_aeread" value="X">
                <label for="si_aeread">SI, y se cuenta con material, equipo y ayuda disponible</label>
                
                <br>
                <input type="radio" id="no_aerea" name="no_aeread" value="X">
                <label for="no_aeread">NO</label>
                <br><hr>

                <h6>¿RIESGO DE HEMORRAGEA EN ADULTOS >500mL? (NIÑOS > 7mL./KG)</h6>
                <input type="radio" id="si_hemorragea" name="si_hemorragea" value="X">
                <label for="si_hemorragea">SI, y se ha previsto la disponibilidad de liquidos y dos vias centrales</label>
                
                <br>
                <input type="radio" id="no_hemorragea" name="no_hemorragea" value="X">
                <label for="no_hemorragea">NO</label>
                <br>
                <hr>

                <h6>¿POSIBLE NECESIDAD DE HEMODERIVADOS Y SOLUCIONES DISPONIBLES</h6>
                <input type="radio" id="si_hemoderivados" name="si_hemoderivados" value="X">
                <label for="si_hemoderivados">SI, y se ha realizado el cruce de sangre previamente</label>
                
                <br>
                <input type="radio" id="no_hemoderivados" name="no_hemoderivados" value="X">
                <label for="no_hemoderivados">NO</label>
                <hr>
                <br>
                
            </div> 



                
            <div class="modal-body" style="text-align: center;">PRESIONE ENVIAR PARA CONFIRMAR LA FASE 1</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" name="agregar" type="submit" style="background-color: seagreen;">Enviar</button>
            </div>
        </form>
        <?php include_once "db/insertar_doctor.php"; ?>  <!-- incluye captura de datos a bd -->
    </div>
    </div>
</div>

<!-- FASE 2 -->
<div class="modal fade" id="fase2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">LISTA DE VERIFICACION DE LA SEGURIDAD DE LA CIRUGIA - PAUSA: ANTES DE LA INCISION CUTANEA</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button> 
        </div>
        
        <form action="·" method="POST">
            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">LA INSTRUMENTISTA HA IDENTIFICADO CADA UNO DE LOS MIEMBROS DEL EQUIPO QUIRURGICO PARA QUE SE PRESENTEN POR SU NOMBRE Y FUNCION, SIN OMISIONES</h6>
            <div style=" margin-left: 25px;" class="col-sm-3" >

                <input type="radio" id="fase2_cirujano" name="fase2_cirujano" value="X">
                <label for="fase2_cirujano">CIRUJANO</label><br>
                
                <input type="radio" id="fase2_cirujano2" name="fase2_cirujano2" value="X">
                <label for="fase2_cirujano2">AYUDANTE DE CIRUJANO</label><br>

                <input type="radio" id="fase2_anestesiologo" name="fase2_anestesiologo" value="X">
                <label for="fase2_anestesiologo">ANESTESIOLOGO</label><br>

                <input type="radio" id="fase2_circulante" name="fase2_anestesiologo" value="X">
                <label for="fase2_anestesiologo">CIRCULANTE</label><br>

                <input type="radio" id="fase2_otro" name="fase2_otro" value="X">
                <label for="fase2_otro">OTROS</label>
            </div> 
            <hr>
            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">EL CIRUJAN, HA CONFIRMADO DE MANERA VERBAL CON EL ANESTESIOLOGO Y EL PERSONAL DE ENFERMERIA(INSTRUMENTISTA Y CIRCULANTE):</h6> 
            <div style=" margin-left: 25px;">

                <input type="radio" id="paciente_correcto" name="paciente_correcto" value="X">
                <label for="paciente_correcto">PACIENTE CORRECTO</label><br>
                
                <input type="radio" id="procedimiento_correcto" name="procedimiento_correcto" value="X">
                <label for="procedimiento_correcto">PROCEDIMIENTO CORRECTO</label><br>

                <input type="radio" id="sitio_correcto" name="sitio_correcto" value="X">
                <label for="sitio_correcto">SITIO QUIRURGICO CORRECTO</label><br>
                
                <input type="radio" id="organo_correcto" name="organo_correcto" value="X">
                <label for="organo_correcto">EN CASO DE ORGANO BILATERAL HA MARCADO DERECHO O IZQUIERDO SEGUN CORRESPONDA</label><br>

                <input type="radio" id="estrucutura_multiple" name="estrucutura_multiple" value="X">
                <label for="estrucutura_multiple">EN CASO DE ESTRUCTURA MULTIPLE, HA ESPECIFICADO EL NIVEL A OPERAR</label><br>
                
                <input type="radio" id="posicion_correcta" name="posicion_correcta" value="X">
                <label for="posicion_correcta">POSICION CORRECTA DEL PACIENTE</label><br>

            </div> 
            <hr>
            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">EL ANESTESIOLOGO HA VERIFICADO QUE SE HAYA APLICADO LA PROFILAXIS ANTIBIOTICA CONFORME A LAS INDICACIONES MEDICAS?</h6> 
            <div style=" margin-left: 25px;" class="col-sm-3" >

                <input type="radio" id="si_profilaxis" name="si_profilaxis" value="X">
                <label for="si_profilaxis">SI</label><br>
                
                <input type="radio" id="no_profilaxis" name="no_profilaxis" value="X">
                <label for="no_profilaxis">NO</label><br>

                <input type="radio" id="nop_profilaxis" name="nop_profilaxis" value="X">
                <label for="nop_profilaxis">NO PROCEDE</label><br>

            </div> 
            <hr>   
            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">EL CIRUJANO HA VERIFICADOQUE CUENTA CON LOS ESTUDIOS DE IMAGEN QUE REQUIERE</h6> 
            <div style=" margin-left: 25px;" class="col-sm-3" >

                <input type="radio" id="si_estudio" name="si_estudio" value="X">
                <label for="si_estudio">SI</label><br>
                
                <input type="radio" id="no_estudio" name="no_estudio" value="X">
                <label for="no_estudio">NO</label><br>

                <input type="radio" id="nop_estudio" name="nop_estudio" value="X">
                <label for="nop_estudio">NO PROCEDE</label><br>

            </div> 
            <hr>   
            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">PREVENCION DE EVENTOS CRITICOS</h6> 
            <div style=" margin-left: 25px;"  >
                
                <h6>-EL CIRUJANO HA INFORMADO</h6>
                <input type="radio" id="criticos" name="criticos" value="X">
                <label for="criticos">LOS PASOS CRITICOS O NO SISTEMATIZADOS</label>
                <br>
                <input type="radio" id="duracion_operacion" name="duracion_operacion" value="X">
                <label for="duracion_operacion">LA DURACION DE LA OPERACION</label>
                <br>
                <input type="radio" id="perdida_sangre" name="perdida_sangre" value="X">
                <label for="perdida_sangre">LA PERDIDA DE SANGRE PREVISTA</label>
                <br>
                <br>
                <h6 style="font-weight: bold;">*EL ANESTESIOLOGO HA CONFIRMADO</h6>
                <input type="radio" id="riesgo_paciente" name="riesgo_paciente" value="X">
                <label for="riesgo_paciente">SI LA EXISTENCIA DE ALGUN RIESGO O ENFERMEDAD EN EL PACIENTE QUE PUEDA CONPLICAR LA CIRUGIA</label>
                <br>
                <br>
                <h6 style="font-weight: bold;">*EL PERSONAL DE ENFERMERIA HA CONFIRMADO</h6>
                <input type="radio" id="fecha_metodo" name="fecha_metodo" value="X">
                <label for="fecha_metodo">LA FECHA Y METODO DE LA ESTERILIZACION DEL EQUIPO Y EL INSTRUMENTAL</label>
                <br>
                <input type="radio" id="existencia_problema" name="existencia_problema" value="X">
                <label for="existencia_problema">LA EXISTENCIA DE ALGUN PROBLEMA CON EL INTRUMENTAL, LOS EQUIPOS Y EL CONTEO DEL MISMO.</label>
                
                <hr>
                <br>
                
            </div> 



                
            <div class="modal-body" style="text-align: center;">PRESIONE ENVIAR PARA CONFIRMAR LA FASE 2</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" name="agregar" type="submit" style="background-color: seagreen;">Enviar</button>
            </div>
        </form>
        <?php include_once "db/insertar_doctor.php"; ?>  <!-- incluye captura de datos a bd -->
    </div>
    </div>
</div>

<!-- FASE 3 -->
<div class="modal fade" id="fase3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">LISTA DE VERIFICACION DE LA SEGURIDAD DE LA CIRUGIA - SALIDA: ANTES DE QUE EL PACIENTE SALGA DEL QUIROFANO</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button> 
        </div>
        
        <form action="·" method="POST">
            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">EL CIRUJANO RESPONSABLE DE LA ATENCION DEL PACIENTE EN PRESENCIA DEL ANESTESIOLOGO
             Y EL PERSONAL DE ENFERMERIA, HA APLICADO LA LISTA DE VERIFICACION DE LA SEGURIDAD DE LA CIRUGIA Y HA CONFIRMADO VERBALMENTE.</h6>
            <div style=" margin-left: 25px;">

                <input type="radio" id="fase2_cirujano" name="fase2_cirujano" value="X">
                <label for="fase2_cirujano">EL NOMBRE DEL PROCEDIMIENTO REALIZADO</label><br>
                
                <input type="radio" id="fase2_cirujano2" name="fase2_cirujano2" value="X">
                <label for="fase2_cirujano2">EL RECUENTO COMPLETO DEL INSTRUMENTAL, GASAS Y AGUJAS</label><br>

                <input type="radio" id="fase2_anestesiologo" name="fase2_anestesiologo" value="X">
                <label for="fase2_anestesiologo">EL ETIQUETADO DE LAS MUESTRAS (NOMBRE COMPLETO DEL PACIENTE, FECHA DE NACIMIENTO, FECHA DE LA CIRUGIA Y DESCRIPCION GRAL)</label><br>

                <input type="radio" id="fase2_circulante" name="fase2_anestesiologo" value="X">
                <label for="fase2_anestesiologo">LOS PROBLEMAS CON EL INSTRUMENTAL Y LOS EQUIPOS QUE DEBEN SER NOTIFICADOS Y RESUELTOS</label><br>

            </div> 
            <hr>
            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">EL CIRUJANO, EL ANESTESIOLOGO Y EL PERSONAL DE ENFERMERIA HAN COMENTADO AL CIRCULANTE</h6> 
            <div style=" margin-left: 25px;">

                <input type="radio" id="paciente_correcto" name="paciente_correcto" value="X">
                <label for="paciente_correcto">LOS PRINCIPALES ASPECTOS DE LA RECUPERACION POSTOPERATORIA</label><br>
                
                <input type="radio" id="procedimiento_correcto" name="procedimiento_correcto" value="X">
                <label for="procedimiento_correcto">EL PLAN DE TRATAMIENTO</label><br>

                <input type="radio" id="sitio_correcto" name="sitio_correcto" value="X">
                <label for="sitio_correcto">LOS REGISTROS DEL PACIENTE</label><br>
                

            </div> 
            <hr>
            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">¿OCURRIERON EVENTOS ADVERSOS?</h6> 
            <div style=" margin-left: 25px;" class="col-sm-3" >

                <input type="radio" id="si_profilaxis" name="si_profilaxis" value="X">
                <label for="si_profilaxis">SI</label><br>
                
                <input type="radio" id="no_profilaxis" name="no_profilaxis" value="X">
                <label for="no_profilaxis">NO</label><br>

            </div> 
            <hr>   
            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px;">¿SE REGISTRO EL EVENTO ADVERSO?</h6> 
            <div style=" margin-left: 25px;" >

                <input type="radio" id="si_estudio" name="si_estudio" value="X">
                <label for="si_estudio">SI</label><br>
                
                <input type="radio" id="no_estudio" name="no_estudio" value="X">
                <label for="no_estudio">NO</label><br>
                
                <label for="nop_estudio">¿DONDE?</label>
                <input type="text" id="nop_estudio" name="nop_estudio" placeholder="escriba el evento">
                

            </div> 
            <hr>   
            <h6 style="font-weight: bold; margin-left: 25px; margin-top: 20px; text-align: center;">LISTADO DEL PERSONAL RESPONSABLE QUE PARTICIPO EN LA APLICACION Y LLENADO DE ESTA LISTA DE VERIFICACION</h6> 
            <div style=" margin-left: 25px;"  >
                
                <h6 style="font-weight: bold; margin-top: 20px; text-align: center;">CIRUJANO(S)</h6>
               
                
                <hr>
                <br>
                
            </div> 



                
            <div class="modal-body" style="text-align: center;">PRESIONE ENVIAR PARA CONFIRMAR LA FASE 3 FINAL</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" name="agregar" type="submit" style="background-color: seagreen;">Enviar</button>
            </div>
        </form>
        <?php include_once "db/insertar_doctor.php"; ?>  <!-- incluye captura de datos a bd -->
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