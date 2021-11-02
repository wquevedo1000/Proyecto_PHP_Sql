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
					<a href="ListadoHabitacion.php" class="nav-link active"><i>Listado de Habitaciones</i></a>
				</li>
				<li class="nav-item">
					<a href="ListadoCliente.php" class="nav-link"><i>Listado de Clientes</i></a>
				</li>
				<li class="nav-item">
					<a href="ListadoAdministrador.php" class="nav-link"><i>Listado de Administradores</i></a>
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
<center><h2 class="py-3" style="color: WHITE;"><i>Registro de Habitación</i></h2></center>
<center><form action="" method="POST" autocomplete="off" class="col-md-6 bg-light py-3">
	<div class="row">
	<div class="form-group col-md">
	<label><i>Número de Habitación</i></label>
	<input type="number" name="numero" min="100" required="" class="form-control">
    </div>
    <div class="form-group col-md">
	<label><i>Piso</i></label>
	<select name="piso" required="" class="form-control">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select>
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
	<label><i>Descripción</i></label>
	<textarea name="descripcion" maxlength="200" required="" class="form-control"></textarea>
    </div>
    <div class="form-group col-md">
	<label><i>Características</i></label>
	<textarea name="caracteristica" required="" class="form-control"></textarea>
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
	<label><i>Precio Día (Dolar)</i></label>
	<input type="number" name="precio" min="650" required="" class="form-control">
    </div>
    <div class="form-group col-md">
	<label><i>Tipo</i></label>
	<select name="tipo" required="" class="form-control">
		<option value="Individual">Individual</option>
		<option value="Doble">Doble</option>
		<option value="Cuadruple">Cuádruple</option>
		<option value="Matrimonial">Matrimonial</option>
		<option value="Familiar">Familiar</option>
	</select>
    </div>
    </div>
	<input type="submit" value="Registrar Habitación" class="btn btn-dark">
</form></center>
<?php
    if(isset($_POST['numero']) && isset($_POST['piso']) && isset($_POST['descripcion']) && isset($_POST['caracteristica']) && isset($_POST['precio']) && isset($_POST['tipo'])){
    	require_once "Conectar/connect.php";
    	require_once "Procesos/guardarhabitacion.php";
    }
?>
<center><a href="ListadoHabitacion.php" class="btn btn-light"><i>Volver</i></a></center>
<br>
<footer class="col-md-12 bg-light">
	<br>
	<center><font size="4px"><i>© 2021 El Manantial</i></font></center>
	<br>
</footer>
</body>
</html>