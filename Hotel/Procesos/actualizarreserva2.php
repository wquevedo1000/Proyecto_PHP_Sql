<?php
    if(isset($_POST['idreserva']) && isset($_POST['idcliente']) && isset($_POST['habitacion']) && isset($_POST['fecha']) && isset($_POST['fechaingreso']) && isset($_POST['horaingreso']) && isset($_POST['fechasalida']) && isset($_POST['horasalida']) && isset($_POST['estado'])){
    	$idreserva = $_POST['idreserva'];
    	$idcliente = $_POST['idcliente'];
    	$habitacion = $_POST['habitacion'];
    	$fecha = $_POST['fecha'];
    	$fechaingreso = $_POST['fechaingreso'];
    	$horaingreso = $_POST['horaingreso'];
    	$fechasalida = $_POST['fechasalida'];
    	$horasalida = $_POST['horasalida'];
        $estado = $_POST['estado'];

        function calculaTiempo($fechainicio, $fechafin){
            $datetime1 = date_create($fechainicio);
            $datetime2 = date_create($fechafin);
            $interval = date_diff($datetime1, $datetime2);

            $tiempo = array();

            foreach($interval as $valor){
        	    $tiempo[] = $valor;
            }

            return $tiempo;
        }

        $dato = calculaTiempo($fechaingreso, $fechasalida);

        require_once "Conectar/connect2.php";
        $query = "SELECT Hab_PrecioDia FROM tblhabitacion WHERE Hab_Numero = '$habitacion'";

        $consulta1 = consultarSQL($query);

        while($registro = $consulta1 -> fetch_assoc()){
        	$preciodia = $registro['Hab_PrecioDia'];
        }

        $costo = ($dato[2]*$preciodia)*0.19;

        if($estado == "Paga"){
            $consulta2 = $pdo -> prepare("UPDATE tblreserva SET  Res_Fecha = :fecha, Res_FechaIngreso = :fechaingreso, Res_HoraIngreso = :horaingreso, Res_FechaSalida = :fechasalida, Res_HoraSalida = :horasalida, Res_CantidadDias = :cantidad, Res_Costo = :costo, Res_Estado = :estado WHERE Res_Id = :idreserva AND Res_IdCliente = :idcliente AND Res_NumeroHabitacion = :habitacion");
            $consulta2 -> bindParam(":fecha", $fecha);
            $consulta2 -> bindParam(":fechaingreso", $fechaingreso);
            $consulta2 -> bindParam(":horaingreso", $horaingreso);
            $consulta2 -> bindParam(":fechasalida", $fechasalida);
            $consulta2 -> bindParam(":horasalida", $horasalida);
            $consulta2 -> bindParam(":cantidad", $dato[2]);
            $consulta2 -> bindParam(":costo", $costo);
            $consulta2 -> bindParam(":estado", $estado);
            $consulta2 -> bindParam(":idreserva", $idreserva);
            $consulta2 -> bindParam(":idcliente", $idcliente);
            $consulta2 -> bindParam(":habitacion", $habitacion); 
              
            $consulta3 = $pdo -> prepare("UPDATE tblhabitacion SET Hab_Estado = 'Mantenimiento' WHERE Hab_Numero = ?");  

            $consulta3 -> bindParam(1, $habitacion);

        }else{
            $consulta2 = $pdo -> prepare("UPDATE tblreserva SET  Res_Fecha = :fecha, Res_FechaIngreso = :fechaingreso, Res_HoraIngreso = :horaingreso, Res_FechaSalida = :fechasalida, Res_HoraSalida = :horasalida, Res_CantidadDias = :cantidad, Res_Costo = :costo, Res_Estado = :estado WHERE Res_Id = :idreserva AND Res_IdCliente = :idcliente AND Res_NumeroHabitacion = :habitacion");
            $consulta2 -> bindParam(":fecha", $fecha);
            $consulta2 -> bindParam(":fechaingreso", $fechaingreso);
            $consulta2 -> bindParam(":horaingreso", $horaingreso);
            $consulta2 -> bindParam(":fechasalida", $fechasalida);
            $consulta2 -> bindParam(":horasalida", $horasalida);
            $consulta2 -> bindParam(":cantidad", $dato[2]);
            $consulta2 -> bindParam(":costo", $costo);
            $consulta2 -> bindParam(":estado", $estado);
            $consulta2 -> bindParam(":idreserva", $idreserva);
            $consulta2 -> bindParam(":idcliente", $idcliente);
            $consulta2 -> bindParam(":habitacion", $habitacion); 
              
            $consulta3 = $pdo -> prepare("UPDATE tblhabitacion SET Hab_Estado = 'Ocupada' WHERE Hab_Numero = ?");  

            $consulta3 -> bindParam(1, $habitacion);

        }

        if($consulta2 -> execute() && $consulta3 -> execute()){
        	echo "<center><font size='5px' color='WHITE'><i>¡La reserva se actualizo exitosamente!</i></font></center>";
        }else{
        	echo "<center><font size='5px' color='WHITE'><i>¡No se pudo actualizar la reserva inténtelo más tarde!</i></font></center>";
        }
    }

    if(isset($_GET['id'])){
    	$id = $_GET['id'];
    	$consulta = $pdo -> prepare("SELECT * FROM tblreserva WHERE Res_Id = :id");
    	$consulta -> bindParam(":id", $id);
    	$consulta -> execute();
    	if($consulta -> rowCount() >= 1){
    		$fila = $consulta -> fetch();
    		echo '<center><form action="" method="POST" autocomplete="off" class="col-md-6 bg-light py-3">
    <div class="row">
    <div class="form-group col-md">
    <input type="hidden" name="idreserva" value="'.$fila['Res_Id'].'">
    <input type="hidden" name="idcliente" value="'.$fila['Res_IdCliente'].'">
    <label><i>Número de Habitación</i></label>
    <input type="text" name="habitacion" value="'.$fila['Res_NumeroHabitacion'].'" class="form-control">
    </div>
    <div class="form-group col-md">
    <label><i>Fecha Actual</i></label>
    <input type="date" name="fecha" class="form-control" value="'.$fila['Res_Fecha'].'">
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
    <label><i>Fecha de Ingreso</i></label>
    <input type="date" name="fechaingreso" class="form-control" value="'.$fila['Res_FechaIngreso'].'">
    </div>
    <div class="form-group col-md">
    <label><i>Hora de Ingreso</i></label>
    <input type="time" name="horaingreso" value="'.$fila['Res_HoraIngreso'].'" class="form-control">	
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
    <label><i>Fecha de Salida</i></label>
    <input type="date" name="fechasalida" class="form-control" value="'.$fila['Res_FechaSalida'].'">	
    </div>
    <div class="form-group col-md">
    <label><i>Hora de Salida</i></label>
    <input type="time" name="horasalida" value="'.$fila['Res_HoraSalida'].'" class="form-control">
    </div>	
    </div>
    <div class="row">
    <div class="form-group col-md">
    <label><i>Estado</i></label>
    <select name="estado" class="form-control">
        <option value="'.$fila['Res_Estado'].'">'.$fila['Res_Estado'].'</option>
        <option value="Paga">Paga</option>
    </select>
    </div>
    </div>
    <input type="submit" value="Actualizar Reserva" class="btn btn-dark">
</form></center>';
    	}else{
    		echo "Ocurrio un error";
    	}
    }else{
    	echo "Error no se pudo procesar la petición";
    }
?>