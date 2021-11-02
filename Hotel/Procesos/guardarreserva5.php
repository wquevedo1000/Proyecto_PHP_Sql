<?php
    $idcliente = $_POST['idcliente'];
    $habitacion = $_POST['habitacion'];
    $fecha = $_POST['fecha'];
    $fechaingreso = $_POST['fechaingreso'];
    $horaingreso = $_POST['horaingreso'];
    $fechasalida = $_POST['fechasalida'];
    $horasalida = $_POST['horasalida'];

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

    $costo = ($dato[2]*52.09)*0.19;

    $consulta2 = $pdo -> prepare("INSERT INTO tblreserva(Res_Id, Res_IdCliente, Res_NumeroHabitacion, Res_Fecha, Res_FechaIngreso, Res_HoraIngreso, Res_FechaSalida, Res_HoraSalida, Res_CantidadDias, Res_Costo, Res_Estado) VALUES ('', ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Activa')");

    $consulta2 -> bindParam(1, $idcliente);
    $consulta2 -> bindParam(2, $habitacion);
    $consulta2 -> bindParam(3, $fecha);
    $consulta2 -> bindParam(4, $fechaingreso);
    $consulta2 -> bindParam(5, $horaingreso);
    $consulta2 -> bindParam(6, $fechasalida);
    $consulta2 -> bindParam(7, $horasalida);
    $consulta2 -> bindParam(8, $dato[2]);
    $consulta2 -> bindParam(9, $costo);

    $consulta3 = $pdo -> prepare("UPDATE tblhabitacion SET Hab_Estado = 'Ocupada' WHERE Hab_Numero = ?");

    $consulta3 -> bindParam(1, $habitacion);

    if($consulta2 -> execute() && $consulta3 -> execute()){
    	echo "<center><font size='5px' color='WHITE'><i>¡Reserva hecha exitosamente!</i></font></center>";
    }else{
    	echo "<center><font size='5px' color='WHITE'><i>¡No se pudo hacer la reserva inténtelo más tarde!</i></font></center>";
    }
?>