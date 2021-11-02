<?php
    $nombre = ucwords($_POST['nombre']);
    $apellido = ucwords($_POST['apellido']);
    $tipo = $_POST['tipo'];
    $identificacion = $_POST['identificacion'];
    $nacionalidad = ucwords($_POST['nacionalidad']);
    $ciudad = ucwords($_POST['ciudad']);
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT, ['cost' => 10]);

    $consulta = $pdo -> prepare("INSERT INTO tblcliente(Cli_Id, Cli_Nombre, Cli_Apellido, Cli_TipoIdentificacion, Cli_NumeroIdentificacion, Cli_Nacionalidad, Cli_Ciudad, Cli_Direccion, Cli_Telefono, Cli_Email, Cli_Contrasena) VALUES('', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $consulta -> bindParam(1, $nombre);
    $consulta -> bindParam(2, $apellido);
    $consulta -> bindParam(3, $tipo);
    $consulta -> bindParam(4, $identificacion);
    $consulta -> bindParam(5, $nacionalidad);
    $consulta -> bindParam(6, $ciudad);
    $consulta -> bindParam(7, $direccion);
    $consulta -> bindParam(8, $telefono);
    $consulta -> bindParam(9, $email);
    $consulta -> bindParam(10, $contrasena);

    if($consulta -> execute()){
    	echo "<center><font size='5px' color='WHITE'><i>¡Usuario registrado exitosamente!</i></font></center>";
    }else{
    	echo "<center><font size='5px' color='WHITE'><i>¡No se pudo registrar usuario inténtelo más tarde!</i></font></center>";
    }
?>