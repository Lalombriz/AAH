<?php
$host = "localhost";
$usuario = "root"; 
$clave = "";    
$db = "hospital";

$conn = mysqli_connect($host,$usuario,$clave,$db) or die("Connection failed: " . mysqli_connect_error());

//if($conexion){
  //  echo "conectado correctamente";
//}else{
//    echo "no se puede conectar";


/* check connection */
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
 exit();
}
//}
?>