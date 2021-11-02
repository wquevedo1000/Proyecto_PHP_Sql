<?php
   $id = $_GET['id'];

   require_once "Conectar/connect2.php";
   $query = "SELECT Res_NumeroHabitacion FROM tblreserva WHERE Res_Id = '$id'";

   $consulta3 = consultarSQL($query);

   while($registro = $consulta3 -> fetch_assoc()){
   	   $habitacion = $registro['Res_NumeroHabitacion'];
   }

   $consulta2 = $pdo -> prepare("DELETE FROM tblreserva WHERE Res_Id = :id");
   $consulta2 -> bindParam(":id", $id);

   $consulta4 = $pdo -> prepare("UPDATE tblhabitacion SET Hab_Estado = 'Disponible' WHERE Hab_Numero = ?");

   $consulta4 -> bindParam(1, $habitacion);

   if($consulta2 -> execute() && $consulta4 -> execute()){
   	   echo "<center><font size='5px' color='WHITE'><i>¡La reserva se canceló exitosamente!</i></font></center>";
   }else{
   	   echo "<center><font size='5px' color='WHITE'><i>¡No se pudo cancelar la reserva inténtelo más tarde!</i></font></center>";
   }
?>