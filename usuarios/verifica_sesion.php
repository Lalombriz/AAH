<?php
session_start();
if (!isset($_SESSION['variable'])) { //verificamos si hay una sesion activada y si no lo hay no inicia el sistema
    header('location:../index.php');
}
?>
