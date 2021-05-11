<?php

if(isset($_POST['aceptar_btn']))
{
    $host= 'localhost';
    $user= 'root';      
    $password ='';
    $db = 'hospital';
    $mysqli = new mysqli($host,$user,$password,$db);
    $id = $_POST['cancel_id'];
    $motivo = $_POST['motivo'];           
    $query = "UPDATE paciente SET status='1' , motivo_cancelacion='".$motivo."' WHERE num_paciente='".$id."' ";
    $mysqli->query($query);
    $mysqli->close();
}
?>