<?php
    session_start();
    if(!isset($_SESSION['Admin_Nombre']) && !isset($_SESSION['Admin_Apellido'])){
    	header("Location: ListadoReservaAdmin.php");
    }
?>