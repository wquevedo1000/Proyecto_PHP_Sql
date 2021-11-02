<?php
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $consulta = $pdo -> prepare("SELECT * FROM tbladministrador WHERE Admin_Email = :email");

    $consulta -> bindParam(":email", $email);
    $consulta -> execute();

    $fila = $consulta -> fetch();

    if(password_verify($contrasena, $fila['Admin_Contrasena'])){
    	session_start();
    	$_SESSION['Admin_Nombre'] = $fila['Admin_Nombre'];
    	$_SESSION['Admin_Apellido'] = $fila['Admin_Apellido'];
    	$_SESSION['Admin_Email'] = $fila['Admin_Email'];
        $_SESSION['token'] = password_hash(uniqid(mt_rand(), true), PASSWORD_DEFAULT, ['cost' => 10]);
    	header("Location: ListadoReservaAdmin.php");
    }else{
    	echo "<center><font size='5px' color='WHITE'><i>¡Usuario no registrado!</i></font></center>";
    }
?>