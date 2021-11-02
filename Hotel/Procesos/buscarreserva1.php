<?php
    include "seguridadcliente.php";

    $mysqli = new mysqli("localhost", "root", "", "dbhotel");

    $busqueda = $_SESSION['Cli_Id'];
    $salida = "";
    $query = "SELECT * FROM tblreserva WHERE Res_IdCliente = '".$busqueda."'";

    if(isset($_POST['consulta'])){
    	$q = $mysqli->real_escape_string($_POST['consulta']);
    	$query = "SELECT Res_NumeroHabitacion, Res_Fecha, Res_FechaIngreso, Res_HoraIngreso, Res_FechaSalida, Res_HoraSalida, Res_CantidadDias, Res_Costo, Res_Estado FROM tblreserva WHERE Res_IdCliente = '".$busqueda."' OR Res_NumeroHabitacion LIKE '%".$q."%' OR Res_Fecha LIKE '%".$q."%' OR Res_FechaIngreso LIKE '%".$q."%' OR Res_HoraIngreso LIKE '%".$q."%' OR Res_FechaSalida LIKE '%".$q."%' OR Res_HoraSalida LIKE '%".$q."%' OR Res_CantidadDias LIKE '%".$q."%' OR Res_Costo LIKE '%".$q."%' OR Res_Estado LIKE '%".$q."%'";
    }

    $resultado = $mysqli->query($query);

    if($resultado->num_rows > 0){

    	$salida.="<table class='table table-hover table-bordered table-dark table-sm'>
	<thead class='thead-light'>
		<tr>
			<th>Número de habitación</th>
			<th>Fecha de la reserva</th>
			<th>Fecha de ingreso</th>
			<th>Hora de ingreso</th>
			<th>Fecha de salida</th>
			<th>Hora de salida</th>
			<th>Cantidad de días</th>
			<th>Costo total (Dolar)</th>
			<th>Estado de la reserva</th>
		</tr>
	</thead>
	<tbody>";

	    while($fila = $resultado->fetch_assoc()){
	    	$salida.="<tr>
		    		    <td>".$fila['Res_NumeroHabitacion']."</td>
		    		    <td>".$fila['Res_Fecha']."</td>
		    		    <td>".$fila['Res_FechaIngreso']."</td>
		    		    <td>".$fila['Res_HoraIngreso']."</td>
		    		    <td>".$fila['Res_FechaSalida']."</td>
		    		    <td>".$fila['Res_HoraSalida']."</td>
		    		    <td>".$fila['Res_CantidadDias']."</td>
		    		    <td>".$fila['Res_Costo']."</td>
		    		    <td>".$fila['Res_Estado']."</td>
		    		</tr>";
	    }

	    $salida.="</tbody></table>";

    } else {
    	$salida.="<tr>
		    	    <td colspan='4'>No hay datos</td>
		        </tr>";
    }

    echo $salida;

    $mysqli->close();
?>