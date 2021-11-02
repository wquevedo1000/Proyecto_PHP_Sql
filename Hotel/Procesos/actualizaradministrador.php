<?php
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['tipo']) && isset($_POST['documento']) && isset($_POST['direccion']) && isset($_POST['telefono']) && isset($_POST['cargo'])){
    	$id = $_POST['id'];
    	$nombre = $_POST['nombre'];
    	$apellido = $_POST['apellido'];
    	$tipo = $_POST['tipo'];
    	$documento = $_POST['documento'];
    	$direccion = $_POST['direccion'];
    	$telefono = $_POST['telefono'];
    	$cargo = $_POST['cargo'];
    	$emailA = $_POST['emailA'];
    	$emailN = $_POST['emailN'];
    	$claveN1 = password_hash($_POST['claveN1'], PASSWORD_DEFAULT, ['cost' => 10]);
    	$claveN2 = password_hash($_POST['claveN2'], PASSWORD_DEFAULT, ['cost' => 10]);

    	if($emailA != $emailN){
    		$consulta1 = $pdo -> prepare("SELECT * FROM tbladministrador WHERE Admin_Email = :email");
    		$consulta1 -> bindParam(":email", $emailN);
    		$consulta1 -> execute();
    		if($consulta1 -> rowCount() >= 1){
    			echo "Error: el email ya esta registrado";
    			exit();
    		}else{
    			$emailF = $emailN;
    		}
    	}else{
    		$emailF = $emailA;
    	}

    	if(password_verify($claveN1, $claveN1) != "" && password_verify($claveN2, $claveN2) != ""){
    		if(password_verify($claveN1, $claveN1) != password_verify($claveN2, $claveN2)){
    			echo "Error: las contraseñas no coinciden";
    			exit();
    		}else{
    			$consulta2 = $pdo -> prepare("UPDATE tbladministrador SET Admin_Nombre = :nombre, Admin_Apellido = :apellido, Admin_TipoDocumento = :tipo, Admin_NumeroDocumento = :documento, Admin_Direccion = :direccion, Admin_Telefono = :telefono, Admin_Cargo = :cargo, Admin_Email = :email, Admin_Contrasena = :contrasena WHERE Admin_Id = :id");
    			$consulta2 -> bindParam(":nombre", $nombre);
    			$consulta2 -> bindParam(":apellido", $apellido);
    			$consulta2 -> bindParam(":tipo", $tipo);
    			$consulta2 -> bindParam(":documento", $documento);
    			$consulta2 -> bindParam(":direccion", $direccion);
    			$consulta2 -> bindParam(":telefono", $telefono);
    			$consulta2 -> bindParam(":cargo", $cargo);
    			$consulta2 -> bindParam(":email", $emailF);
    			$consulta2 -> bindParam(":contrasena", $claveN2);
    			$consulta2 -> bindParam(":id", $id);
    		}
    	}else{
    		$consulta2 = $pdo -> prepare("UPDATE tbladministrador SET Admin_Nombre = :nombre, Admin_Apellido = :apellido, Admin_TipoDocumento = :tipo, Admin_NumeroDocumento = :documento, Admin_Direccion = :direccion, Admin_Telefono = :telefono, Admin_Cargo = :cargo, Admin_Email = :email WHERE Admin_Id = :id");
    			$consulta2 -> bindParam(":nombre", $nombre);
    			$consulta2 -> bindParam(":apellido", $apellido);
    			$consulta2 -> bindParam(":tipo", $tipo);
    			$consulta2 -> bindParam(":documento", $documento);
    			$consulta2 -> bindParam(":direccion", $direccion);
    			$consulta2 -> bindParam(":telefono", $telefono);
    			$consulta2 -> bindParam(":cargo", $cargo);
    			$consulta2 -> bindParam(":email", $emailF);
    			$consulta2 -> bindParam(":id", $id);
    	}

    	if($consulta2 -> execute()){
    		echo "<center><font size='5px' color='WHITE'><i>¡Los datos se actualizaron exitosamente!</i></font></center>";
    	}else{
    		echo "<center><font size='5px' color='WHITE'><i>¡No se pudieron actualizar los datos inténtelo más tarde!</i></font></center>";
    	}
    }

    if(isset($_GET['id'])){
    	$id = $_GET['id'];
    	$consulta = $pdo -> prepare("SELECT * FROM tbladministrador WHERE Admin_Id = :id");
    	$consulta -> bindParam(":id", $id);
    	$consulta -> execute();
    	if($consulta -> rowCount() >= 1){
    		$fila = $consulta -> fetch();
    		echo '<center><form action="" method="POST" autocomplete="off" class="col-md-6 bg-light py-3">
	<input type="hidden" name="id" value="'.$fila['Admin_Id'].'">
    <div class="row">
    <div class="form-group col-md">
	<label><i>Nombre</i></label>
	<input type="text" name="nombre" value="'.$fila['Admin_Nombre'].'" class="form-control">
    </div>
    <div class="form-group col-md">
	<label><i>Apellido</i></label>
	<input type="text" name="apellido" value="'.$fila['Admin_Apellido'].'" class="form-control">
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
	<label><i>Tipo de Documento</i></label>
	<select name="tipo" class="form-control">
        <option value="'.$fila['Admin_TipoDocumento'].'">'.$fila['Admin_TipoDocumento'].'</option>
		<option value="CC">Cedula de Ciudadania</option>
		<option value="CE">Cedula de Extranjeria</option>
		<option value="PAP">Pasaporte</option>
	</select>
    </div>
    <div class="form-group col-md">
	<label><i>Número de Documento</i></label>
	<input type="text" name="documento" value="'.$fila['Admin_NumeroDocumento'].'" class="form-control">
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
	<label><i>Dirección</i></label>
	<input type="text" name="direccion" value="'.$fila['Admin_Direccion'].'" class="form-control">
    </div>
    <div class="form-group col-md">
	<label><i>Teléfono</i></label>
	<input type="text" name="telefono" value="'.$fila['Admin_Telefono'].'" class="form-control">
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
	<label><i>Cargo</i></label>
	<select name="cargo" class="form-control">
        <option value="'.$fila['Admin_Cargo'].'">'.$fila['Admin_Cargo'].'</option>
		<option value="Recepcionista">Recepcionista</option>
		<option value="Mantenimiento de Computo">Mantenimiento de Computo</option>
		<option value="Director General">Director General</option>
	</select>
    </div>
    <div class="form-group col-md">
	<input type="hidden" name="emailA" value="'.$fila['Admin_Email'].'">
	<label><i>Email</i></label>
	<input type="email" name="emailN" value="'.$fila['Admin_Email'].'" class="form-control">
    </div>
    </div>
	<p><i>Para actualizar la contraseña por favor ingrese la nueva contraseña y repitala</i></p>
    <div class="row">
    <div class="form-group col-md">
	<label><i>Contraseña</i></label>
	<input type="password" name="claveN1" class="form-control">
    </div>
    <div class="form-group col-md">
	<label><i>Confirmar Contraseña</i></label>
	<input type="password" name="claveN2" class="form-control">
    </div>
    </div>
	<input type="submit" value="Actualizar Administrador" class="btn btn-dark">
</form></center>';
    	}else{
    		echo "Ocurrio un error";
    	}
    }else{
    	echo "Error no se pudo procesar la peticion";
    }
?>