<?php
    if(isset($_POST['piso']) && isset($_POST['descripcion']) && isset($_POST['caracteristica']) && isset($_POST['precio']) && isset($_POST['tipo'])){
    	$id = $_POST['id'];
    	$piso = $_POST['piso'];
    	$descripcion = $_POST['descripcion'];
        $caracteristica = $_POST['caracteristica'];
    	$precio = $_POST['precio'];
    	$tipo = $_POST['tipo'];

         $consulta2 = $pdo -> prepare("UPDATE tblhabitacion SET Hab_Piso = :piso, Hab_Descripcion = :descripcion, Hab_Caracteristicas = :caracteristica, Hab_PrecioDia = :precio, Hab_Tipo = :tipo, Hab_Estado = 'Disponible' WHERE Hab_Numero = :id");
            $consulta2 -> bindParam(":piso", $piso);
            $consulta2 -> bindParam(":descripcion", $descripcion);
            $consulta2 -> bindParam(":caracteristica", $caracteristica);
            $consulta2 -> bindParam(":precio", $precio);
            $consulta2 -> bindParam(":tipo", $tipo);
            $consulta2 -> bindParam(":id", $id);

    	if($consulta2 -> execute()){
    		echo "<center><font size='5px' color='WHITE'><i>¡La habitación se actualizo exitosamente!</i></font></center>";
    	}else{
    		echo "<center><font size='5px' color='WHITE'><i>¡No se pudo actualizar la habitación inténtelo más tarde!</i></font></center>";
    	}
    }

    if(isset($_GET['id'])){
    	$id = $_GET['id'];
    	$consulta = $pdo -> prepare("SELECT * FROM tblhabitacion WHERE Hab_Numero = :id");
    	$consulta -> bindParam(":id", $id);
    	$consulta -> execute();
    	if($consulta -> rowCount() >= 1){
    		$fila = $consulta -> fetch();
    		echo '<center><form action="" method="POST" autocomplete="off" class="col-md-6 bg-light py-3">
	<input type="hidden" name="id" value="'.$fila['Hab_Numero'].'">
	<input type="hidden" name="piso" value="'.$fila['Hab_Piso'].'">
	<input type="hidden" name="descripcion" value="'.$fila['Hab_Descripcion'].'">
	<input type="hidden" name="caracteristica" value="'.$fila['Hab_Caracteristicas'].'">
    <div class="form-group col-md">
	<label><i>Precio Día (Dolar)</i></label>
	<input type="number" name="precio" min="20,93" value="'.$fila['Hab_PrecioDia'].'" class="form-control"><br><br>
    </div>
	<input type="hidden" name="tipo" value="'.$fila['Hab_Tipo'].'">
	<input type="submit" value="Actualizar Habitación" class="btn btn-dark">
</form></center>';
    	}else{
    		echo "Ocurrio un error";
    	}
    }else{
    	echo "Error no se pudo procesar la petición";
    }
?>