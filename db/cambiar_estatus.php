<?php
require "conexion.php";
if(isset($_POST['estatus_btn']))
{
    
    $id = $_POST['estatus_id'];
    $estatus = $_POST['selected_e'];
    if(strcasecmp($estatus,"Alta")==0)
        $estatus="2";
    elseif(strcasecmp($estatus,"En operacion")==0)
        $estatus="3";
    elseif(strcasecmp($estatus,"Recuperacion")==0)
        $estatus="4";
    elseif(strcasecmp($estatus,'Traslado')==0)
        $estatus="5";

    $query = "UPDATE paciente SET status='".$estatus."' WHERE num_paciente='".$id."' ";
    $consulta = mysqli_query($conn,$query);
    echo "<meta http-equiv='refresh' content='0'>";
}

$conn->close();
?>