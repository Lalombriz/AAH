<?php
    $host= 'localhost';
    $user= 'root';      
    $password= '';
    $db = 'hospital';                
    $conn = new mysqli($host,$user,$password,$db);

    if( isset($_POST['usuario']) && isset($_POST['contraseña']) && isset($_POST['tipo']) && isset($_POST['nombre_doctor']) && isset($_POST['escuela']) && isset($_POST['cedula']) && isset($_POST['esp']))
    {
        $user = $_POST['usuario'];
        // $pass = password_hash($_POST['contraseña'],PASSWORD_BCRYPT);
        $pass = md5($_POST['contraseña']);  //cambiamos la encryptacion para mayor facilidad para el login
        $type = $_POST['tipo'];
        $name = $_POST['nombre_doctor'];
        $estudios = $_POST['escuela'];
        $cedula = $_POST['cedula'];
        $especialidad = $_POST['esp'];
       
                $insertar_dato = "INSERT INTO usuarios (cedula, contrasena, escuela_estudios, nombre_completo, usuario, especialidad, tipo) VALUES( '$cedula', '$pass', '$estudios', '$name', '$user', '$especialidad', '$type')";
                $consulta = mysqli_query($conn,$insertar_dato);

            // if($type = "Enfermero"){
            //     $insertar_dato = "INSERT INTO enfermeros (cedula_p, contrasena, estudios, nombre_completo, usuario) VALUES( '$cedula', '$pass', '$estudios', '$name', '$user')";
            //     $consulta = mysqli_query($conn,$insertar_dato);
            // }elseif($type = "Medico"){
            //     $query = "INSERT INTO medicos (cedula_p, contrasena, estudios, nombre_completo, usuario) VALUES( '$cedula', '$pass', '$estudios', '$name', '$user')";
            //     $consulta = mysqli_query($conn,$insertar_dato);
            // }else{
            //     $query = "INSERT INTO anestesiologos (cedula_p, contrasena, estudios, nombre_completo, usuario) VALUES( '$cedula', '$pass', '$estudios', '$name', '$user')";
            //     $consulta = mysqli_query($conn,$insertar_dato);
            // }


            // switch ($type) {
            //     case "Enfermero":
            //         $insertar_dato = "INSERT INTO enfermeros (cedula_p, contrasena, estudios, nombre_completo, usuario) VALUES( '$cedula', '$pass', '$estudios', '$name', '$user')";
            //         $consulta = mysqli_query($conn,$insertar_dato);
            //         break;
            //     case "Medico":
            //         $query = "INSERT INTO medicos (cedula_p, contrasena, estudios, nombre_completo, usuario) VALUES( '$cedula', '$pass', '$estudios', '$name', '$user')";
            //         $consulta = mysqli_query($conn,$insertar_dato);
            //         break;
            //     case "Anestesiologo":
            //         $query = "INSERT INTO anestesiologos (cedula_p, contrasena, estudios, nombre_completo, usuario) VALUES( '$cedula', '$pass', '$estudios', '$name', '$user')";
            //         $consulta = mysqli_query($conn,$insertar_dato);
            //         break;
            // }
         
        
    }
    $conn->close();
?>