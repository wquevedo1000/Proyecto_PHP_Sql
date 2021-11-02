<?php
    $id = $_GET['id'];
    $consulta2 = $pdo -> prepare("DELETE FROM tblcliente WHERE Cli_Id = :id");
    $consulta2 -> bindParam(":id", $id);
    if($consulta2 -> execute()){
    	echo "<center><font size='5px' color='WHITE'><i>¡El usuario se eliminó exitosamente!</i></font></center>";
    }else{
    	echo "<center><font size='5px' color='WHITE'><i>¡No se pudo eliminar el usuario inténtelo más tarde!</i></font></center>";
    }
?>