<?php

    $nombre = $_POST['nombre']; 
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $para = "wquevedo1000@outlook.com";
    $asunto = "Nuevo mensaje de $nombre";

    $mensaje = '
      Nombre del remitente: ".$nombre."
      Correo: ".$email."
      Mensaje: ".$mensaje."
    ';

    mail($para, $asunto, utf8_decode($mensaje));

    header("location: index.php");

?>