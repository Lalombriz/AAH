<?php
$usuario = 'root';
$password = '';
$db = new PDO('mysql:host=localhost;dbname=hospital', $usuario, $password);

$query = $db->prepare("SELECT * FROM usuarios WHERE tipo = 'Anestesiologo'");
$query->execute();
$data = $query->fetchAll();

foreach ($data as $valores):
echo '<option  value="'.$valores["nombre_completo"].'">'.$valores["nombre_completo"].'</option>';
// id="medico" name="medico"
endforeach;

?>