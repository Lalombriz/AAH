<?php
require '../db/conexion.php';
session_start();
$usuario = $_SESSION['variable']; //guardamos la variable de sesion

$validarUsuario = "SELECT usuario from usuarios where usuario = '$usuario'";
$consultaUsuario = mysqli_query($conn,$validarUsuario);
$getArrayUsuario = mysqli_fetch_array($consultaUsuario);


if ($usuario == $getArrayUsuario['usuario']) {
    setcookie(session_destroy());
    header('location: ../index.php');
} else if($usuario =! $getArrayUsuario['usuario']) {
    header('location: ../404.php'); //si no hay una sesion activada arrojamos el error 404
}



?>