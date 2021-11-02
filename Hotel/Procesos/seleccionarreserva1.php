<?php
    $consulta = $pdo -> prepare("SELECT Res_Id, Cli_Nombre, Cli_Apellido, Res_NumeroHabitacion, Res_Fecha, Res_FechaIngreso, Res_HoraIngreso, Res_FechaSalida, Res_HoraSalida, Hab_Tipo, Res_CantidadDias, Res_Costo FROM tblcliente INNER JOIN tblreserva ON Cli_Id = Res_IdCliente INNER JOIN tblhabitacion ON Hab_Numero = Res_NumeroHabitacion WHERE Res_Estado = 'Activa'");
    $consulta -> execute();
    if($consulta -> rowCount() >= 1){
    	while($fila = $consulta -> fetch()){
    		echo "<tr>
                 <td><i>".$fila['Res_Id']."</i></td>
                 <td><i>".$fila['Cli_Nombre']."</i></td>
                 <td><i>".$fila['Cli_Apellido']."</i></td>
                 <td><i>".$fila['Res_NumeroHabitacion']."</i></td>
                 <td><i>".$fila['Res_Fecha']."</i></td>
                 <td><i>".$fila['Res_FechaIngreso']."</i></td>
                 <td><i>".$fila['Res_HoraIngreso']."</i></td>
                 <td><i>".$fila['Res_FechaSalida']."</i></td>
                 <td><i>".$fila['Res_HoraSalida']."</i></td>
                 <td><i>".$fila['Hab_Tipo']."</i></td>
                 <td><i>".$fila['Res_CantidadDias']."</i></td>
                 <td><i>".$fila['Res_Costo']."</i></td>
                 <td><a class='btn btn-dark' href='datosreserva.php?id=".$fila['Res_Id']."'><i>Actualizar</i></a></td>
    		</tr>";
    	}
    }else{
    	echo "<tr>
    	        <td colspan='4'><i>No hay datos</i></td>
    	    </tr>";
    }
?>