<?php
session_start();
require '../db/conexion.php';

if (isset($_POST['contrasena'])){

    $clave = md5($_POST['contrasena']);  //encriptacion por MD5
    $password = $clave;
    $usuario = $_SESSION['variable'];

   
    $validarUsuario = "UPDATE usuarios SET contrasena = '$password' WHERE usuario = '$usuario'";
    $consultaUsuario = mysqli_query($conn,$validarUsuario);
    header('location: ../index/php');
}

?>