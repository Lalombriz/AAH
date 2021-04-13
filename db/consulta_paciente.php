<?php

    $host= 'localhost';
    $user= 'root';      
    $password ='';
    $db = 'hospital';           
    $mysqli = new mysqli($host,$user,$password,$db);

    $consulta = "";
    $query =  "SELECT * FROM paciente 
               ORDER BY num_paciente
               LIMIT 10";

    $buscar_paciente = $mysqli->query($query);
    if (!$buscar_paciente) {
        trigger_error('Invalid query: ' . $mysqli->error);
    }
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
                                    </tr>
                                </thead>
                            <tbody>";
        while($paciente = $buscar_paciente->fetch_assoc())
        {
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
            $consulta .= '<td><button class="btn btn-primary border detalle_btn">Detalles</button></td>';
            $consulta .= '</tr>';
        }
        $consulta.="</tbody></table>";
    }
    echo $consulta;
    $mysqli->close();
?>

<div class="modal fade" id="detail_p"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detalles</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       <div id="results"></div>
            </div>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function){
    //     $('.detalle_btn').click(function(){
    //         $('#detail_p').modal('show');
    //     });
    // });
</script>