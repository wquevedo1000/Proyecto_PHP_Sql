<?php
    session_start();
    if(isset($_GET['tk']) && isset($_SESSION['token']) && password_verify($_GET['tk'], $_GET['tk']) == password_verify($_SESSION['token'], $_SESSION['token'])){
    	session_destroy();
        header("Location: Inicioadministrador.php");
    }
?>