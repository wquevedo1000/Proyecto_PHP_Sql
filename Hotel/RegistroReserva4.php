<?php
    include "Procesos/seguridadcliente.php";
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
					<a href="principal.php" class="nav-link active"><i>Habitaciónes</i></a>
				</li>
				<li class="nav-item">
					<a href="ListadoReservaCliente.php" class="nav-link"><i>Mis Reservas</i></a>
				</li>
				<li class="nav-item">
					<a href="Perfil.php" class="nav-link"><i>Mi Perfil</i></a>
				</li>
			</ul>
			<span class="navbar-text mr-sm-2">
				<i><?php echo $_SESSION['Cli_Nombre']." ".$_SESSION['Cli_Apellido']; ?></i>
			</span>
			<span class="navbar-text mr-sm-2">
				<a href="CierreCliente.php?tk=<?php echo $_SESSION['token']; ?>"><i>Cerrar Sesion</i></a>
			</span>
		</div>
	</nav>
<center><h2 class="py-3" style="color: WHITE;"><i>Reserva para habitación familiar</i></h2></center>
<center><form action="" method="POST" autocomplete="off" class="col-md-6 bg-light py-3">
    <div class="row">
    <div class="form-group col-md">
    <input type="hidden" name="idcliente" value="<?php echo $_SESSION['Cli_Id']; ?>">
    <label><i>Número de Habitación</i></label>
    <select name="habitacion" class="form-control">
    <?php
        require_once "Conectar/connect2.php";
        $query = "SELECT Hab_Numero FROM tblhabitacion WHERE Hab_Tipo = 'Familiar' AND Hab_Estado = 'Disponible'";

        $consulta1 = consultarSQL($query);

        while($registro = $consulta1 -> fetch_assoc()){
        	echo '<option>'.$registro['Hab_Numero'].'</option>';
        }
    ?>
    </select>
    </div>
    <div class="form-group col-md">
    <label><i>Fecha Actual</i></label>
    <input type="date" name="fecha" class="form-control" required="">
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
    <label><i>Fecha de Ingreso</i></label>
    <input type="date" name="fechaingreso" class="form-control" required="">
    </div>
    <div class="form-group col-md">
    <label><i>Hora de Ingreso</i></label>
    <input type="time" name="horaingreso" value="15:00" class="form-control" required="">	
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md">
    <label><i>Fecha de Salida</i></label>
    <input type="date" name="fechasalida" class="form-control" required="">	
    </div>
    <div class="form-group col-md">
    <label><i>Hora de Salida</i></label>
    <input type="time" name="horasalida" value="15:00" class="form-control" required="">
    </div>	
    </div>
    <input type="submit" value="Reservar" class="btn btn-dark">
</form></center>
<?php
    if(isset($_POST['idcliente']) && isset($_POST['habitacion']) && isset($_POST['fecha']) && isset($_POST['fechaingreso']) && isset($_POST['horaingreso']) && isset($_POST['fechasalida']) && isset($_POST['horasalida'])){
    	require_once "Conectar/connect.php";
    	require_once "Procesos/guardarreserva4.php";
    }
?>
<center><a href="principal.php" class="btn btn-light"><i>Volver</i></a></center>
<br>
<br>
<footer class="col-md-12 bg-light" style="margin-top: 278px;">
    <br>
    <center><font size="4px"><i>© 2021 El Manantial</i></font></center>
    <br>
</footer>
</body>
</html>