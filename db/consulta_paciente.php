<?php

    $host= 'localhost';
    $user= 'root';      
    $password ='';
    $db = 'hospital';           
    $mysqli = new mysqli($host,$user,$password,$db);
    $accion_id='accion';
    $consulta = "";
    $query =  "SELECT * FROM paciente 
               ORDER BY num_paciente
               LIMIT 10";
    if(isset($_POST['btn_buscar']))
    {
        $q = $_POST['buscar'];
        if(is_numeric($_POST['buscar']))
        {
            $q = $mysqli->real_escape_string($_POST['buscar']);
            $query = "SELECT * FROM paciente WHERE num_paciente=".$q."";
        }
        else
        {
            $query = "SELECT * FROM paciente WHERE nombre_p like '%".$q."%' OR procedencia like '%".$q."%'";
        }
    }
    $buscar_paciente = $mysqli->query($query);
    if($buscar_paciente -> num_rows > 0)
    {
        $consulta.="<table class='table table-bordered'>
                                <thead>
                                    <tr>
                                        <th>No. de paciente</th>
                                        <th>Nombre</th>
                                        <th>Edad</th>
                                        <th>Sexo</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Telefono</th>
                                        <th>Estado</th>
                                        <th>Poblacion</th>
                                        <th>Numero de afiliacion</th>
                                        <th>Procedencia</th>
                                        <th>Acompañante</th>
                                        <th>Parentesco</th>
                                        <th>Telefono</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                            <tbody>";
        while($paciente = $buscar_paciente->fetch_assoc())
        {
            $accion_id .= strval($paciente['num_paciente']);
            $consulta .= '<tr class="trID_' .$paciente['num_paciente']. '">';
            $consulta .= '<td class="numero">' . $paciente['num_paciente'] . '</td>';
            $consulta .= '<td class="td_nombre">' . $paciente['nombre_p'] . '</td>';
            $consulta .= '<td class="edad">' . $paciente['edad'] . '</td>';
            $consulta .= '<td class="sexo">' . $paciente['sexo'] . '</td>';
            $consulta .= '<td class="fecha_n">' . $paciente['fecha_nacimiento'] . '</td>';
            $consulta .= '<td class="tel_a">' . $paciente['telefono_a'] . '</td>';
            $consulta .= '<td class="estado">' . $paciente['estado'] . '</td>';
            $consulta .= '<td class="poblacion">' . $paciente['poblacion'] . '</td>';
            $consulta .= '<td class="num_afil">' . $paciente['num_afiliacion'] . '</td>';
            $consulta .= '<td class="proc">' . $paciente['procedencia'] . '</td>';
            $consulta .= '<td class="acomp">' . $paciente['nombre_a'] . '</td>';
            $consulta .= '<td class="parentesco">' . $paciente['parentesco'] . '</td>';
            $consulta .= '<td class="tel_p">' . $paciente['telefono_p'] . '</td>';
            $consulta .= '<td>
                            <li class="nav-item">
                                <a class="nav-link collapsed" data-toggle="collapse" data-target="#'.$accion_id.'" aria-expanded="true" aria-controls="collapseUtilities">
                                    <i class="fas fa-fw fa-chevron-circle-down"></i>
                                </a>
                                <div id="'.$accion_id.'" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <a class="collapse-item" href="db/eliminar_paciente.php?did='.$paciente['num_paciente'].'">Cancelar</a><br>
                                        <a class="collapse-item" href="db/imprimir_paciente.php?did='.$paciente['num_paciente'].'" >Imprimir</a><br>
                                        <a class="collapse-item" href="#" >Ver mas</a>
                                    </div>
                                </div>
                            </li>
                           </td>';
            $consulta .= '</tr>';
        }
        $consulta.="</tbody></table>";
    }
    else
    {
        $consulta.= "<div class=\"w-100 p-3 text-center\"><h1 class=\"text-center text-danger\">No hay coincidencias</h1></div>"; 
    }
    echo $consulta;
    $mysqli->close();
?>