<?php
    $host= 'localhost';
    $user= 'root';      
    $password ='';
    $db = 'hospital';                
    $mysqli = new mysqli($host,$user,$password,$db);

    if(isset($_POST['date_in']) && isset($_POST['date_nac']) && isset($_POST['dir_p']) && isset($_POST['tel_p']) && isset($_POST['num_afiliacion']) 
        && isset($_POST['poblacion_p']) && isset($_POST['acompanante']) && isset($_POST['contacto_p']) && isset($_POST['tel_c']) && isset($_POST['medico']) 
        && isset($_POST['especialidad']) && isset($_POST['anestesiologo']) && isset($_POST['diagnostico']) && isset($_POST['procedimiento']) && isset($_POST['edad_p'])
        && isset($_POST['nombre_p']) && isset($_POST['estado']) && isset($_POST['parentesco']) && isset($_POST['proc']) && isset($_POST['sexo']))
    {
        $nombre_p = $_POST['nombre_p'];
        $fecha_in = $_POST['date_in'];
        $fecha_nac= $_POST['date_nac'];
        $direccion_p = $_POST['dir_p'];
        $telefono_p = $_POST['tel_p'];
        $num_afil = $_POST['num_afiliacion'];
        $pob_p = $_POST['poblacion_p'];
        $estado = $_POST['estado'];
        $edad = $_POST['edad_p'];
        $procedencia = $_POST['proc']; 
        $sexo = $_POST['sexo'];       
        $nombre_a = $_POST['acompanante'];
        $parentesco = $_POST['parentesco'];
        $direccion_a = $_POST['contacto_p'];
        $telefono_a = $_POST['tel_c'];
        $nombre_m = $_POST['medico'];
        $esp = $_POST['especialidad'];
        $anest = $_POST['anestesiologo'];
        $diagnostico = $_POST['diagnostico'];
        $procedimiento = $_POST['procedimiento'];
        if(isset($_POST['agregar']))
        {
            $query = "INSERT INTO recepcion(fecha) values('$fecha_in')";
            $mysqli->query($query);
            $last_id= $mysqli->insert_id;
            $query = "INSERT INTO paciente(exp_procedencia,nombre_p,fecha_nacimiento,direccion_p,telefono_p,poblacion,estado,edad,sexo,nombre_a,parentesco,direccion_a,
                                           telefono_a,medico_esp,especialidad,anestesiologo,diagnostico,procedimiento,procedencia,num_afiliacion) 
                      values('$last_id','$nombre_p','$fecha_nac','$direccion_p','$telefono_p','$pob_p','$estado','$edad','$sexo','$nombre_a','$parentesco','$direccion_a',
                             '$telefono_a','$nombre_m','$esp','$anest','$diagnostico','$procedimiento','$procedencia','$num_afil')";
            $mysqli->query($query);
        }
    }

    $mysqli->close();
?>