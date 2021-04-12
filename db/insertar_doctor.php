<?php
    $host= 'localhost';
    $user= 'root';      
    $password ='';
    $db = 'hospital';                
    $mysqli = new mysqli($host,$user,$password,$db);
    if()
    {
        $user = $_POST['Usuario'];
        $pass = password_hash($_POST['Contraseña'],PASSWORD_BCRYPT);
        $type = $_POST['Tipo'];
        if(isset($_POST['agregar']))
        {
            if($type="Medico")
            {
                $query = "INSERT INTO medicos(fecha) values()";
            }
            elseif($type="Enfermero")
            {
                $query = "INSERT INTO enfermeros(fecha) values()";
            }
            else($type="Anestesiologo")
            {
                $query = "INSERT INTO anestesiologos(fecha) values()";
            }
        }
    }

    $mysqli->close();

?>