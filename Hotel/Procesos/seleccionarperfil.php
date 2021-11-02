<?php
    $consulta = $pdo -> prepare("SELECT * FROM tblcliente WHERE Cli_Id = '$_SESSION['Cli_Id']'");
    $consulta -> execute();
    if($consulta -> rowCount() >= 1){
    	while($fila = $consulta -> fetch()){
    		echo "<div class='row col-md-12 col-xs-12 col-sm-12 col-lg-12'>
    		<div class='col-md-6'>
    		<div class='card'>
    		<div class='card-body'>
    		<div class='row'>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'>Nombre:</h6>
    		<p class='card-text'>
    		    ".$fila['Cli_Nombre']."
    		</p>
    		</div>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'>Apellido:</h6>
    		<p class='card-text'>
                ".$fila['Cli_Apellido']."
    		</p>
    		</div>
    		</div>
    		<div class='row'>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'>Tipo de Identificación:</h6>
    		<p class='card-text'>
    		    ".$fila['Cli_TipoIdentificacion']."
    		</p>
    		</div>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'>Número de Identificación:</h6>
    		<p class='card-text'>
                ".$fila['Cli_NumeroIdentificacion']."
    		</p>
    		</div>
    		</div>
    		<div class='row'>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'>Nacionalidad:</h6>
    		<p class='card-text'>
    		    ".$fila['Cli_Nacionalidad']."
    		</p>
    		</div>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'>Ciudad:</h6>
    		<p class='card-text'>
                ".$fila['Cli_Ciudad']."
    		</p>
    		</div>
    		</div>
    		<div class='row'>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'>Dirección:</h6>
    		<p class='card-text'>
    		    ".$fila['Cli_Direccion']."
    		</p>
    		</div>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'>Teléfono:</h6>
    		<p class='card-text'>
                ".$fila['Cli_Telefono']."
    		</p>
    		</div>
    		</div>
    		<div class='row'>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'>Email:</h6>
    		<p class='card-text'>
    		    ".$fila['Cli_Email']."
    		</p>
    		</div>
    		<div class='form-group col-md'>
    		<center><a class='card-link btn btn-dark' href='datoscliente.php?id=".$fila['Cli_Id']."'>Actualizar</a></center>
    		</div>
    		</div>
    		</div>
    		</div>
    		</div>
    		</div>";
    	}
    }else{
    	echo "<h3 style:'color: WHITE;'>No hay datos</h3>";
    }
?>