<?php
    include "Procesos/seguridadadmin.php";
?>
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
				<li class="nav-item">
					<a href="ListadoReservaAdmin.php" class="nav-link"><i>Listado de Reservas</i></a>
				</li>
				<li class="nav-item">
					<a href="ListadoHabitacion.php" class="nav-link"><i>Listado de Habitaciones</i></a>
				</li>
				<li class="nav-item">
					<a href="ListadoCliente.php" class="nav-link"><i>Listado de Clientes</i></a>
				</li>
				<li class="nav-item">
					<a href="ListadoAdministrador.php" class="nav-link active"><i>Listado de Administradores</i></a>
				</li>
			</ul>
			<span class="navbar-text mr-sm-2">
				<i><?php echo $_SESSION['Admin_Nombre']." ".$_SESSION['Admin_Apellido']; ?></i>
			</span>
			<span class="navbar-text mr-sm-2">
				<a href="CierreAdministrador.php?tk=<?php echo $_SESSION['token']; ?>"><i>Cerrar Sesion</i></a>
			</span>
		</div>
	</nav>
<center><h2 class="py-3" style="color: WHITE;"><i>Registro de Administrador</i></h2></center>
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
	<label><i>Tipo de Documento</i></label>
	<select name="tipo" required="" class="form-control">
		<option value="CC">Cedula de Ciudadania</option>
		<option value="CE">Cedula de Extranjeria</option>
		<option value="PAP">Pasaporte</option>
	</select>
    </div>
    <div class="form-group col-md">
	<label><i>Número de Documento</i></label>
	<input type="text" name="documento" required="" class="form-control" title="Por favor introduce número de identificación">
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
	<label><i>Cargo</i></label>
	<select name="cargo" required="" class="form-control">
		<option value="Recepcionista">Recepcionista</option>
		<option value="Mantenimiento de Computo">Mantenimiento de Computo</option>
		<option value="Director General">Director General</option>
	</select>
    </div>
    <div class="form-group col-md">
	<label><i>Email</i></label>
	<input type="email" name="email" class="form-control" id="email">
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
	<label><i>Contraseña</i></label>
	<input type="password" name="contrasena" class="form-control" id="contrasena">
    </div>
    <div class="form-group col-md">
	<label><i>Confirmar Contraseña</i></label>
	<input type="password" name="confirma" class="form-control" id="confirma">
    </div>
    </div>
	<input type="submit" value="Registrar Administrador" class="btn btn-dark">
</form></center>
<?php
    if(isset($_POST['nombre']) && isset($_POST['apellido']
        ) && isset($_POST['tipo']) && isset($_POST['documento']) && isset($_POST['direccion']) && isset($_POST['telefono']) && isset($_POST['cargo']) && isset($_POST['email']) && isset($_POST['contrasena'])){
    	require_once "Conectar/connect.php";
        require_once "Procesos/guardaradministrador.php";
    }
?>
<center><a href="ListadoAdministrador.php" class="btn btn-light"><i>Volver</i></a></center>
<br>
<footer class="col-md-12 bg-light" style="margin-top: 168px;">
    <br>
    <center><font size="4px"><i>© 2021 El Manantial</i></font></center>
    <br>
</footer>
</body>
</html>