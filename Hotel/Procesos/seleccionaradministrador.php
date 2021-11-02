<?php
    $consulta = $pdo -> prepare("SELECT * FROM tbladministrador");
    $consulta -> execute();
    if($consulta -> rowCount() >= 1){
    	while($fila = $consulta -> fetch()){
    		echo "<tr>
    		    <td><i>".$fila['Admin_Id']."</i></td>
    		    <td><i>".$fila['Admin_Nombre']."</i></td>
    		    <td><i>".$fila['Admin_Apellido']."</i></td>
    		    <td><i>".$fila['Admin_Direccion']."</i></td>
    		    <td><i>".$fila['Admin_Telefono']."</i></td>
    		    <td><i>".$fila['Admin_Cargo']."</i></td>
    		    <td><i>".$fila['Admin_Email']."</i></td>
    		    <td><a class='btn btn-dark' href='datosadministrador.php?id=".$fila['Admin_Id']."'><i>Actualizar</i></a></td>
    		    <td><a class='btn btn-dark' href='ListadoAdministrador.php?id=".$fila['Admin_Id']."'><i>Eliminar</i></a></td>
    		 </tr>";
    	}
    }else{
    	echo "<tr>
    		    <td colspan='4'><i>No hay datos</i></td>
    		</tr>";
    }
?>