<?php
   $id = $_GET['id'];
   $consulta2 = $pdo -> prepare("DELETE FROM tblhabitacion WHERE Hab_Numero = :id");
   $consulta2 -> bindParam(":id", $id);
   if($consulta2 -> execute()){
   	   echo "<center><font size='5px' color='WHITE'><i>¡La habitación se eliminó exitosamente!</i></font></center>";
   }else{
   	   echo "<center><font size='5px' color='WHITE'><i>¡No se pudo eliminar la habitación inténtelo más tarde!</i></font></center>";
   }
?>