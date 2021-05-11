<?php
    $host= 'localhost';
    $user= 'root';      
    $password ='';
    $db = 'hospital';           
    $mysqli = new mysqli($host,$user,$password,$db);
    $accion_id='accion';
    $consulta = "";
    $query =  "SELECT * FROM paciente where status='0'
               ORDER BY num_paciente
               ";
    $buscar_paciente = $mysqli->query($query);
    if($buscar_paciente -> num_rows > 0)
    {
        $consulta.="<table id='paciente' class='table table-bordered table-hover' style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>No. de paciente</th>
                                        <th>Nombre</th>
                                        <th>Edad</th>
                                        <th>Sexo</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Telefono</th>
                                        <th>Numero de afiliacion</th>
                                        <th>Procedencia</th>
                                        <th>Acompañante</th>
                                        <th>Telefono</th>
                                        <th>Accion</th>
                                        <th style='display:none;'></th>
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
            $consulta .= '<td class="num_afil">' . $paciente['num_afiliacion'] . '</td>';
            $consulta .= '<td class="proc">' . $paciente['procedencia'] . '</td>';
            $consulta .= '<td class="acomp">' . $paciente['nombre_a'] . '</td>';
            $consulta .= '<td class="tel_p">' . $paciente['telefono_p'] . '</td>';
            $consulta .= '<td>
                            <li class="nav-item text-center" style="list-style: none;">
                                <a data-toggle="collapse" data-target="#'.$accion_id.'" aria-expanded="true" aria-controls="collapseUtilities">
                                    <i class="fas fa-fw fa-chevron-circle-down text-primary"></i>
                                </a>
                                <div id="'.$accion_id.'" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <a class="collapse-item detalle_pac" href="#" id="'.$paciente['num_paciente'].'" data-dismiss="modal">Ver mas</a>
                                        <a class="collapse-item" target="_blank" href="db/imprimir_paciente.php?did='.$paciente['num_paciente'].'" >Imprimir</a><br>
                                        <a class="collapse-item cancelar_cita" name="btn_c" id="'.$paciente['num_paciente'].'" href="#" data-dismiss="modal">Cancelar</a><br>
                                    </div>
                                </div>
                            </li>
                           </td>';
            $consulta .= '<td style="display:none;" class="motivo_c">' . $paciente['motivo_cancelacion'] . '</td>';
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