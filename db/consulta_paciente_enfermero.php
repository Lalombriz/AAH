<?php
    $host= 'localhost';
    $user= 'root';      
    $password ='';
    $db = 'hospital';           
    $mysqli = new mysqli($host,$user,$password,$db);
    $accion_id='accion';
    $consulta = "";
    $query =  "SELECT * FROM paciente where status!='1'
               ORDER BY num_paciente
               ";
    $buscar_paciente = $mysqli->query($query);
    $status="";
    if($buscar_paciente -> num_rows > 0)
    {
        $consulta.="<table id='paciente' class='table table-bordered table-hover' style='width:100%;'>
                                <thead>
                                    <tr>
                                        <th>No. de paciente</th>
                                        <th>Nombre</th>
                                        <th>Edad</th>
                                        <th>Sexo</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Telefono</th>
                                        <th>Acompañante</th>
                                        <th>Telefono</th>
                                        <th>Estatus</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                            <tbody>";
        while($paciente = $buscar_paciente->fetch_assoc())
        {
            switch($paciente['status']){
                case "0": $status="Ingreso"; break;
                case "1": $status="Cancelado"; break;
                case "2": $status="Alta"; break;
                case "3": $status="En operacion"; break;
                case "4": $status="Recuperacion"; break;
                case "5": $status="Traslado"; break;
            }
            $accion_id .= strval($paciente['num_paciente']);
            $consulta .= '<tr class="trID_' .$paciente['num_paciente']. '">';
            $consulta .= '<td class="numero">' . $paciente['num_paciente'] . '</td>';
            $consulta .= '<td class="td_nombre">' . $paciente['nombre_p'] . '</td>';
            $consulta .= '<td class="edad">' . $paciente['edad'] . '</td>';
            $consulta .= '<td class="sexo">' . $paciente['sexo'] . '</td>';
            $consulta .= '<td class="fecha_n">' . $paciente['fecha_nacimiento'] . '</td>';
            $consulta .= '<td class="tel_a">' . $paciente['telefono_a'] . '</td>';
            $consulta .= '<td class="acomp">' . $paciente['nombre_a'] . '</td>';
            $consulta .= '<td class="tel_p">' . $paciente['telefono_p'] . '</td>';
            $consulta .= '<td class="estado">' . $status . '</td>';
            $consulta .= '<td>
                            <li class="nav-item text-center" style="list-style: none;">
                                <a data-toggle="collapse" data-target="#'.$accion_id.'" aria-expanded="true" aria-controls="collapseUtilities">
                                    <i class="fas fa-fw fa-chevron-circle-down text-primary"></i>
                                </a>
                                <div id="'.$accion_id.'" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <a class="collapse-item detalle_pac" href="#" id="'.$paciente['num_paciente'].'" data-dismiss="modal">Ver mas</a>
                                        <a class="collapse-item imprimir" href="#" id="'.$paciente['num_paciente'].'" data-dismiss="modal">Opciones</a></a>
                                        <a class="collapse-item cambio_estatus" href="#" id="'.$paciente['num_paciente'].'" data-dismiss="modal">Estatus</a>
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
        $consulta.= "<div class=\"w-100 p-3 text-center\"><h1 class=\"text-center text-danger\">No hay datos</h1></div>"; 
    }
    echo $consulta;
    $mysqli->close();
?>