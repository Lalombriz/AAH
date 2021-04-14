<?php
session_destroy();
session_start();
require '../db/conexion.php';


$usuario = $_POST['usuario'];
// $clave = password_hash($_POST['pass'],PASSWORD_BCRYPT);
$clave = md5($_POST['pass']);  //encriptacion por MD5
$password = $clave;

$validarUsuario = "SELECT usuario,contrasena,tipo from usuarios where usuario = '$usuario'";
$consultaUsuario = mysqli_query($conn,$validarUsuario);
$getArrayUsuario = mysqli_fetch_array($consultaUsuario);
// echo($getArrayUsuario['usuario']);
// echo "<br>";
// echo($getArrayUsuario['tipo']);
// echo "<br>";
// echo($getArrayUsuario['contrasena']); //contraseña de la BD
// echo "<br>";
// echo $clave;                          //contraseña capturada del gui


if($usuario === $getArrayUsuario['usuario'] &&  $password === $getArrayUsuario['contrasena'])
{
    if($getArrayUsuario['tipo'] == "Enfermero")
    {
        $_SESSION['variable']=$getArrayUsuario['usuario'];
        header("location:../enfermeros.php");
        echo "Menu de Enfermeros";

    }elseif($getArrayUsuario['tipo'] == "Medico"){
        $_SESSION['variable']=$getArrayUsuario['usuario'];
        header("location:../medicos.php");
        // echo "Menu de Medico";

    }elseif($getArrayUsuario['tipo'] == "Anestesiologo"){
        $_SESSION['variable']=$getArrayUsuario['usuario'];
        header("location:../anestesiologo.php");
        // echo "Menu de anestesiologo";

    }elseif($getArrayUsuario['tipo'] == "Administrativo"){
        $_SESSION['variable']=$getArrayUsuario['usuario'];
        header("location:../index.php");
       
        // echo "Menu de administrativos";
    }
    else
    {
        echo "No Existe el usuario ingresado o contraseña es la incorrecta";
        // header("location:../Opciones.html");
    }
}


?>
