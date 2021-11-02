<?php
    $consulta = $pdo -> prepare("SELECT * FROM tblcliente");
    $consulta -> execute();
    if($consulta -> rowCount() >= 1){
    	while($fila = $consulta -> fetch()){
    		echo "<tr>
    		    <td><i>".$fila['Cli_Id']."</i></td>
    		    <td><i>".$fila['Cli_Nombre']."</i></td>
    		    <td><i>".$fila['Cli_Apellido']."</i></td>
    		    <td><i>".$fila['Cli_TipoIdentificacion']."</i></td>
    		    <td><i>".$fila['Cli_NumeroIdentificacion']."</i></td>
    		    <td><i>".$fila['Cli_Nacionalidad']."</i></td>
    		    <td><i>".$fila['Cli_Ciudad']."</i></td>
    		    <td><i>".$fila['Cli_Direccion']."</i></td>
    		    <td><i>".$fila['Cli_Telefono']."</i></td>
    		    <td><i>".$fila['Cli_Email']."</i></td>
    		    <td><a class='btn btn-dark' href='ListadoCliente.php?id=".$fila['Cli_Id']."'><i>Eliminar</i></a></td>
    		</tr>";
    	}
    }else{
    	echo "<tr>
    	        <td colspan='4'><i>No hay datos</i></td>
    	    </tr>";
    }
?>