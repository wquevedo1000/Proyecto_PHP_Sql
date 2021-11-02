<?php
    $nombre = ucwords($_POST['nombre']);
    $apellido = ucwords($_POST['apellido']);
    $tipo = $_POST['tipo'];
    $documento = $_POST['documento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $cargo = $_POST['cargo'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT, ['cost' => 10]);

    $consulta = $pdo -> prepare("INSERT INTO tbladministrador(Admin_Id, Admin_Nombre, Admin_Apellido, Admin_TipoDocumento, Admin_NumeroDocumento, Admin_Direccion, Admin_Telefono, Admin_Cargo, Admin_Email, Admin_Contrasena) VALUES('', ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $consulta -> bindParam(1, $nombre);
    $consulta -> bindParam(2, $apellido);
    $consulta -> bindParam(3, $tipo);
    $consulta -> bindParam(4, $documento);
    $consulta -> bindParam(5, $direccion);
    $consulta -> bindParam(6, $telefono);
    $consulta -> bindParam(7, $cargo);
    $consulta -> bindParam(8, $email);
    $consulta -> bindParam(9, $contrasena);

    if($consulta -> execute()){
    	echo "<center><font size='5px' color='WHITE'><i>¡Usuario registrado exitosamente!</i></font></center>";
    }else{
    	echo "<center><font size='5px' color='WHITE'><i>¡No se pudo registrar usuario inténtelo más tarde!</i></font></center>";
    }
?>