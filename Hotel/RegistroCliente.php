<html lang="es">
<head>
	<meta charset="utf-8">
	<title>El Manantial</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>	
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script>
    	
    	$(document).ready(function() {
    		$("#form_registro").validate({
    			rules:{
    				email:{
    					required:true,
    					email:true
    				},
    				contrasena:{
    					required:true,
    					rangelength:[8, 16]
    				},
    				confirma:{
    					equalTo:"#contrasena"
    				}
    			},

    			messages:{
    				email:{
    					required:"Por favor introduce email",
    					email:"El formato es erróneo"
    				},
    				contrasena:{
    					required:"Por favor introduce contraseña",
    					rangelength:"Entre 8 y 16 caracteres"
    				},
    				confirma:{
    					equalTo:"No coinciden los campos"
    				}
    			}
    		});
    	});

    </script>
</head>
<body class="bg-dark">
	<nav class="navbar navbar-expand-lg bg-light navbar-light">
		<a href="#" class="navbar-brand"><img src="images/image6.png" width="50px" height="50px"><i>El Manantial</i></a>
		<button class="navbar-toggler" data-toggle="collapse" data-target="#menu" type="button">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div id="menu" class="collapse navbar-collapse">
			<ul class="navbar-nav mr-auto">	
			</ul>
			<span class="navbar-text mr-sm-2">
				<a href="index.php"><i>Home</i></a>
			</span>
		</div>
	</nav>
<center><h2 class="py-3" style="color: WHITE;"><i>Registro</i></h2></center>
<center><form action="" method="POST" autocomplete="off" class="col-md-6 bg-light py-3" id="form_registro">
	<div class="row">
	<div class="form-group col-md">
	<label><i>Nombre</i></label>
	<input type="text" name="nombre" required="" class="form-control" title="Por favor introduce nombre">
    </div>
	<div class="form-group col-md">
	<label><i>Apellido</i></label>
	<input type="text" name="apellido" required="" class="form-control" title="Por favor introduce apellido">
    </div>
    </div>
	<div class="row">
	<div class="form-group col-md">
	<label><i>Tipo de Identificación</i></label>
	<select name="tipo" required="" class="form-control">
		<option value="CC">Cedula de Ciudadania</option>
		<option value="CE">Cedula de Extranjeria</option>
		<option value="PAP">Pasaporte</option>
		<option value="NIT">Número de Identificación Tributaria</option>
	</select>
    </div>
	<div class="form-group col-md">	
	<label><i>Número de Identificación</i></label>
	<input type="text" name="identificacion" required="" class="form-control" title="Por favor introduce número de identificación">
    </div>
    </div>
	<div class="row">
	<div class="form-group col-md">
	<label><i>Nacionalidad</i></label>
	<input type="text" name="nacionalidad" required="" class="form-control" title="Por favor introduce nacionalidad">
    </div>
	<div class="form-group col-md">		
	<label><i>Ciudad</i></label>
	<input type="text" name="ciudad" required="" class="form-control" title="Por favor introduce ciudad">
    </div>
    </div>
	<div class="row">
	<div class="form-group col-md">
	<label><i>Dirección</i></label>
	<input type="text" name="direccion" required="" class="form-control" title="Por favor introduce dirección">
    </div>
	<div class="form-group col-md">	
	<label><i>Teléfono</i></label>
	<input type="text" name="telefono" required="" class="form-control" title="Por favor introduce teléfono">
    </div>
    </div>
	<div class="row">
	<div class="form-group col-md">
	<label><i>Email</i></label>
	<input type="email" name="email" id="email" class="form-control">
    </div>
    </div>
	<div class="row">
	<div class="form-group col-md">
	<label><i>Contraseña</i></label>
	<input type="password" name="contrasena" class="form-control" id="contrasena">
    </div>
	<div class="form-group col-md">	
	<label><i>Confirmar Contraseña</i></label>
	<input type="password" class="form-control" name="confirma" id="confirma">
    </div>
    </div>	
	<input type="submit" value="Registrarme" class="btn btn-dark">
</form></center>
<?php
    if(isset($_POST['nombre']) && isset($_POST['apellido']
        ) && isset($_POST['tipo']) && isset($_POST['identificacion']) && isset($_POST['nacionalidad']) && isset($_POST['ciudad']) && isset($_POST['direccion']) && isset($_POST['telefono']) && isset($_POST['email']) && isset($_POST['contrasena'])){
    	require_once "Conectar/connect.php";
        require_once "Procesos/guardarcliente.php";
    }
?>
<footer class="col-md-12 bg-light" style="margin-top: 128;">
	<br>
	<center><font size="4px"><i>© 2021 El Manantial</i></font></center>
	<br>
</footer>
</body>
</html>