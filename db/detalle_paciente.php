<?php
 if(isset($_POST["num_paciente"]))
 {
    $host= 'localhost';
    $user= 'root';      
    $password ='';
    $db = 'hospital';           
    $mysqli = new mysqli($host,$user,$password,$db);
    $consulta = "";
    $consulta .= '  
      <div class="table-responsive">  
           <table id="paciente" class="table table-bordered">'; 
    $query =  "SELECT * FROM paciente where num_paciente =  '".$_POST['num_paciente']."' ";
    $buscar_paciente = $mysqli->query($query);
    while($paciente = $buscar_paciente->fetch_assoc())
    {
        $consulta.='
                    <tr>  
                        <td width="30%"><label>No. de paciente</label></td>  
                        <td width="70%">'.$paciente["num_paciente"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Expediente</label></td>  
                        <td width="70%">'.$paciente["exp_procedencia"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Nombre:</label></td>  
                        <td width="70%">'.$paciente["nombre_p"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Nombre:</label></td>  
                        <td width="70%">'.$paciente["CURP"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Sexo</label></td>  
                        <td width="70%">'.$paciente["sexo"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Edad</label></td>  
                        <td width="70%">'.$paciente["edad"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Fecha de nacimiento</label></td>  
                        <td width="70%">'.$paciente["fecha_nacimiento"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Telefono</label></td>  
                        <td width="70%">'.$paciente["telefono_p"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Numero de afiliacion</label></td>  
                        <td width="70%">'.$paciente["num_afiliacion"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Direccion</label></td>  
                        <td width="70%">'.$paciente["direccion_p"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Poblacion</label></td>  
                        <td width="70%">'.$paciente["poblacion"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Estado</label></td>  
                        <td width="70%">'.$paciente["estado"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Procedencia</label></td>  
                        <td width="70%">'.$paciente["procedencia"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Medico especialista</label></td>  
                        <td width="70%">'.$paciente["medico_esp"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Especialidad</label></td>  
                        <td width="70%">'.$paciente["especialidad"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Anestesiologo</label></td>  
                        <td width="70%">'.$paciente["anestesiologo"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Diagnostico</label></td>  
                        <td width="70%">'.$paciente["diagnostico"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Procedimiento a realizar</label></td>  
                        <td width="70%">'.$paciente["procedimiento"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Acompañante</label></td>  
                        <td width="70%">'.$paciente["nombre_a"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Parentesco</label></td>  
                        <td width="70%">'.$paciente["parentesco"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Direccion</label></td>  
                        <td width="70%">'.$paciente["direccion_a"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Telefono</label></td>  
                        <td width="70%">'.$paciente["telefono_a"].'</td>  
                    </tr>
                ';
    }
    echo $consulta;
    $mysqli->close();
 }
?>