<?php
$usuario = 'root';
$password = '';
$db = new PDO('mysql:host=localhost;dbname=hospital', $usuario, $password);

$query = $db->prepare("SELECT * FROM usuarios WHERE tipo = 'Medico'");
$query->execute();
$data = $query->fetchAll();

foreach ($data as $valores):
echo '<option  value="'.$valores["nombre_completo"].'">'.$valores["nombre_completo"].'</option>';
endforeach;

?>