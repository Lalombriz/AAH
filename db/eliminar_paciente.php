<?php
    $host= 'localhost';
    $user= 'root';      
    $password ='';
    $db = 'hospital';           
    $mysqli = new mysqli($host,$user,$password,$db);


        $delete_id = $_GET['did'];
        $query = "DELETE from paciente where num_paciente = '$delete_id'";
        $data = $mysqli->query($query);
        header("location:../administrativo.php");
        
?>