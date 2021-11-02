<?php
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['tipo']) && isset($_POST['identificacion']) && isset($_POST['nacionalidad']) && isset($_POST['ciudad']) && isset($_POST['direccion']) && isset($_POST['telefono'])){
    	$id = $_POST['id'];
    	$nombre = $_POST['nombre'];
    	$apellido = $_POST['apellido'];
    	$tipo = $_POST['tipo'];
    	$identificacion = $_POST['identificacion'];
    	$nacionalidad = $_POST['nacionalidad'];
    	$ciudad = $_POST['ciudad'];
    	$direccion = $_POST['direccion'];
    	$telefono = $_POST['telefono'];
    	$emailA = $_POST['emailA'];
    	$emailN = $_POST['emailN'];
    	$claveN1 = password_hash($_POST['claveN1'], PASSWORD_DEFAULT, ['cost' => 10]);
    	$claveN2 = password_hash($_POST['claveN2'], PASSWORD_DEFAULT, ['cost' => 10]);

    	if($emailA != $emailN){
    		$consulta1 = $pdo -> prepare("SELECT * FROM tblcliente WHERE Cli_Email = :email");
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
    			$consulta2 = $pdo -> prepare("UPDATE tblcliente SET Cli_Nombre = :nombre, Cli_Apellido = :apellido, Cli_TipoIdentificacion = :tipo, Cli_NumeroIdentificacion = :identificacion, Cli_Nacionalidad = :nacionalidad, Cli_Ciudad = :ciudad, Cli_Direccion = :direccion, Cli_Telefono = :telefono, Cli_Email = :email, Cli_Contrasena = :contrasena WHERE Cli_Id = :id");
    			$consulta2 -> bindParam(":nombre", $nombre);
    			$consulta2 -> bindParam(":apellido", $apellido);
    			$consulta2 -> bindParam(":tipo", $tipo);
    			$consulta2 -> bindParam(":identificacion", $identificacion);
    			$consulta2 -> bindParam(":nacionalidad", $nacionalidad);
    			$consulta2 -> bindParam(":ciudad", $ciudad);
    			$consulta2 -> bindParam(":direccion", $direccion);
    			$consulta2 -> bindParam(":telefono", $telefono);
    			$consulta2 -> bindParam(":email", $emailF);
    			$consulta2 -> bindParam(":contrasena", $claveN2);
    			$consulta2 -> bindParam(":id", $id);
    		}
    	}else{
	        $consulta2 = $pdo -> prepare("UPDATE tblcliente SET Cli_Nombre = :nombre, Cli_Apellido = :apellido, Cli_TipoIdentificacion = :tipo, Cli_NumeroIdentificacion = :identificacion, Cli_Nacionalidad = :nacionalidad, Cli_Ciudad = :ciudad, Cli_Direccion = :direccion, Cli_Telefono = :telefono, Cli_Email = :email WHERE Cli_Id = :id");
    			$consulta2 -> bindParam(":nombre", $nombre);
    			$consulta2 -> bindParam(":apellido", $apellido);
    			$consulta2 -> bindParam(":tipo", $tipo);
    			$consulta2 -> bindParam(":identificacion", $identificacion);
    			$consulta2 -> bindParam(":nacionalidad", $nacionalidad);
    			$consulta2 -> bindParam(":ciudad", $ciudad);
    			$consulta2 -> bindParam(":direccion", $direccion);
    			$consulta2 -> bindParam(":telefono", $telefono);
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
    	$consulta = $pdo -> prepare("SELECT * FROM tblcliente WHERE Cli_Id = :id");
    	$consulta -> bindParam(":id", $id);
    	$consulta -> execute();
    	if($consulta -> rowCount() >= 1){
    		$fila = $consulta -> fetch();
    		echo '<center><form action="" method="POST" autocomplete="off" class="col-md-6 bg-light py-3">
    <input type="hidden" name="id" value="'.$fila['Cli_Id'].'">
    <div class="row">
    <div class="form-group col-md">
	<label><i>Nombre</i></label>
	<input type="text" name="nombre" value="'.$fila['Cli_Nombre'].'" class="form-control">
    </div>
    <div class="form-group col-md">
	<label><i>Apellido</i></label>
	<input type="text" name="apellido" value="'.$fila['Cli_Apellido'].'" class="form-control">
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
	<label><i>Tipo de Identificación</i></label>
	<select name="tipo" class="form-control">
	    <option value="'.$fila['Cli_TipoIdentificacion'].'">'.$fila['Cli_TipoIdentificacion'].'</option>
		<option value="CC">Cedula de Ciudadania</option>
		<option value="CE">Cedula de Extranjeria</option>
		<option value="PAP">Pasaporte</option>
		<option value="NIT">Número de Identificación Tributaria</option>
	</select>
    </div>
    <div class="form-group col-md">
	<label><i>Número de Identificación</i></label>
	<input type="text" name="identificacion" value="'.$fila['Cli_NumeroIdentificacion'].'" class="form-control">
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
	<label><i>Nacionalidad</i></label>
	<input type="text" name="nacionalidad" value="'.$fila['Cli_Nacionalidad'].'" class="form-control">
    </div>
    <div class="form-group col-md">
	<label><i>Ciudad</i></label>
	<input type="text" name="ciudad" value="'.$fila['Cli_Ciudad'].'" class="form-control">
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
	<label><i>Dirección</i></label>
	<input type="text" name="direccion" value="'.$fila['Cli_Direccion'].'" class="form-control">
    </div>
    <div class="form-group col-md">
	<label><i>Teléfono</i></label>
	<input type="text" name="telefono" value="'.$fila['Cli_Telefono'].'" class="form-control">
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
	<label><i>Email</i></label>
	<input type="hidden" name="emailA" value="'.$fila['Cli_Email'].'">
	<input type="email" name="emailN" value="'.$fila['Cli_Email'].'" class="form-control">
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
	<input type="submit" value="Actualizar Perfil" class="btn btn-dark">
</form></center>';
    	}else{
    		echo "Ocurrio un error";
    	}
    }else{
    	echo "Error no se pudo procesar la peticion";
    }
?>