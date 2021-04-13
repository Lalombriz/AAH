<?php
    $host= 'localhost';
    $user= 'root';      
    $password= '';
    $db = 'hospital';                
    $mysqli = new mysqli($host,$user,$password,$db);

    if( isset($_POST['usuario']) && isset($_POST['contraseña']) && isset($_POST['tipo']) && isset($_POST['nombre_doctor']) && isset($_POST['escuela']) && isset($_POST['cedula']))
    {
        $user = $_POST['usuario'];
        $pass = password_hash($_POST['contraseña'],PASSWORD_BCRYPT);
        $type = $_POST['tipo'];
        $name = $_POST['nombre_doctor'];
        $estudios = $_POST['escuela'];
        $cedula = $_POST['cedula'];
       
        
            switch ($type) {
                case "Medico":
                    $query = "INSERT INTO medicos (cedula_p, contrasena, estudios, nombre_completo, usuario) values( $cedula, $pass, $estudios, $name, $user)";
                    break;
                case "Enfermero":
                    $query = "INSERT INTO enfermeros (cedula_p, contrasena, estudios, nombre_completo, usuario) values( $cedula, $pass, $estudios, $name, $user)";
                    break;
                case "Anestesiologo":
                    $query = "INSERT INTO anestesiologos (cedula_p, contrasena, estudios, nombre_completo, usuario) values( $cedula, $pass, $estudios, $name, $user)";
                    break;
            }
         
        
    }
    $mysqli->close();
?>