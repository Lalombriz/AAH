<?php
require 'conexion.php';
session_start();

$usuario = $_POST['usuario'];
$clave =$_POST['clave'];
$pass= md5($clave);  //encripta la clave a md5

$validarUsuario = "SELECT usuario,contrasena,adm from usuarios where usuario = '$usuario'";
$consultaUsuario = mysqli_query($conn,$validarUsuario);
$getArrayUsuario = mysqli_fetch_array($consultaUsuario);
echo($getArrayUsuario['usuario']);

if($usuario === $getArrayUsuario['usuario'] &&  $pass === $getArrayUsuario['contrasena'])
{
    if($getArrayUsuario['adm'] == 1)
    {
        header("location:../OpAdm.html");
    }
    else
    {
        header("location:../Opciones.html");
    }
}


?>
