<?php
    session_start();
    if(!isset($_SESSION['Cli_Id']) && !isset($_SESSION['Cli_Nombre']) && !isset($_SESSION['Cli_Apellido'])){
    	header("Location: principal.php");
    }
?>