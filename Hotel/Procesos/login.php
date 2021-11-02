<?php
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $consulta = $pdo -> prepare("SELECT * FROM tblcliente WHERE Cli_Email = :email");

    $consulta -> bindParam(":email", $email);
    $consulta -> execute();

    $fila = $consulta -> fetch();

    if(password_verify($contrasena, $fila['Cli_Contrasena'])){
    	session_start();
    	$_SESSION['Cli_Id'] = $fila['Cli_Id'];
    	$_SESSION['Cli_Nombre'] = $fila['Cli_Nombre'];
    	$_SESSION['Cli_Apellido'] = $fila['Cli_Apellido'];
        $_SESSION['Cli_TipoIdentificacion'] = $fila['Cli_TipoIdentificacion'];
        $_SESSION['Cli_NumeroIdentificacion'] = $fila['Cli_NumeroIdentificacion'];
        $_SESSION['Cli_Nacionalidad'] = $fila['Cli_Nacionalidad'];
        $_SESSION['Cli_Ciudad'] = $fila['Cli_Ciudad'];
        $_SESSION['Cli_Direccion'] = $fila['Cli_Direccion'];
        $_SESSION['Cli_Telefono'] = $fila['Cli_Telefono'];
    	$_SESSION['Cli_Email'] = $fila['Cli_Email'];
    	$_SESSION['token'] = password_hash(uniqid(mt_rand(), true), PASSWORD_DEFAULT, ['cost' => 10]);
    	header("Location: principal.php");
    }else{
    	echo "<center><font size='5px' color='WHITE'><i>¡Usuario no registrado!</i></font></center>";
    }
?>