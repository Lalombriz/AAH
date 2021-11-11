<?php
    require "conexion.php";

    if( isset($_POST['usuario']) && isset($_POST['contraseña']) && isset($_POST['tipo']) && isset($_POST['nombre_doctor']) && isset($_POST['escuela']) && isset($_POST['prof']) && isset($_POST['cedula']) && isset($_POST['esp']) && isset($_POST['cedula_esp']))
    {
        $user = $_POST['usuario'];
        // $pass = password_hash($_POST['contraseña'],PASSWORD_BCRYPT);
        $pass = md5($_POST['contraseña']);  //cambiamos la encryptacion para mayor facilidad para el login
        $type = $_POST['tipo'];
        $name = $_POST['nombre_doctor'];
        $estudios = $_POST['escuela'];
        $cedula = $_POST['cedula'];
        $especialidad = $_POST['esp'];
        $profesion = $_POST['prof'];
        $cedula_esp = $_POST['cedula_esp'];
       
                $insertar_dato = "INSERT INTO usuarios (cedula, contrasena, escuela_estudios, nombre_completo, usuario, especialidad, tipo, profesion, cedula_especialidad) VALUES( '$cedula', '$pass', '$estudios', '$name', '$user', '$especialidad', '$type', '$profesion', '$cedula_esp')";
                $consulta = mysqli_query($conn,$insertar_dato);
        
    }
    $conn->close();
?>