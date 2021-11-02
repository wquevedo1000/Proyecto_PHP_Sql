<?php
    $consulta = $pdo -> prepare("SELECT * FROM tblhabitacion");
    $consulta -> execute();
    if($consulta -> rowCount() >= 1){
    	while($fila = $consulta -> fetch()){
    		echo "<tr>
    		    <td><i>".$fila['Hab_Numero']."</i></td>
    		    <td><i>".$fila['Hab_Piso']."</i></td>
    		    <td><i>".$fila['Hab_Descripcion']."</i></td>
    		    <td><i>".$fila['Hab_Caracteristicas']."</i></td>
    		    <td><i>".$fila['Hab_PrecioDia']."</i></td>
    		    <td><i>".$fila['Hab_Tipo']."</i></td>
    		    <td><i>".$fila['Hab_Estado']."</i></td>
    		    <td><a class='btn btn-dark' href='datoshabitacion.php?id=".$fila['Hab_Numero']."'><i>Actualizar</i></td>
    		    <td><a class='btn btn-dark' href='ListadoHabitacion.php?id=".$fila['Hab_Numero']."'><i>Eliminar</i></a></td>
    		</tr>";
    	}
    }else{
    	echo "<tr>
    	        <td colspan='4'><i>No hay datos</i></td>
    	    </tr>";
    }
?>