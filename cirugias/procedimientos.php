<?php
$usuario = 'root';
$password = '';
$db = new PDO('mysql:host=localhost;dbname=hospital', $usuario, $password);

$query = $db->prepare("SELECT * FROM procedimientos_quirurgico");
$query->execute();
$data = $query->fetchAll();

foreach ($data as $valores):
echo '<option  value="'.$valores["descripcion"].'">'.$valores["descripcion"].'</option>';
endforeach;

?>