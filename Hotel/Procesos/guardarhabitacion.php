<?php
    $numero = $_POST['numero'];
    $piso = $_POST['piso'];
    $descripcion = $_POST['descripcion'];
    $caracteristica = $_POST['caracteristica'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];

    $consulta = $pdo -> prepare("INSERT INTO tblhabitacion(Hab_Numero, Hab_Piso, Hab_Descripcion, Hab_Caracteristicas, Hab_PrecioDia, Hab_Tipo, Hab_Estado) VALUES(?, ?, ?, ?, ?, ?,'Disponible')");

    $consulta -> bindParam(1, $numero);
    $consulta -> bindParam(2, $piso);
    $consulta -> bindParam(3, $descripcion);
    $consulta -> bindParam(4, $caracteristica);
    $consulta -> bindParam(5, $precio);
    $consulta -> bindParam(6, $tipo);

    if($consulta -> execute()){
    	echo "<center><font size='5px' color='WHITE'><i>¡La habitación se registró exitosamente!</i></font></center>";
    }else{
    	echo "<center><font size='5px' color='WHITE'><i>¡No se pudo registrar la habitación inténtelo más tarde!</i></font></center>";
    }
?>