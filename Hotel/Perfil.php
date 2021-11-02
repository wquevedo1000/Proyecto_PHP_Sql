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
					<a href="principal.php" class="nav-link"><i>Habitaciónes</i></a>
				</li>
				<li class="nav-item">
					<a href="ListadoReservaCliente.php" class="nav-link"><i>Mis Reservas</i></a>
				</li>
				<li class="nav-item">
					<a href="Perfil.php" class="nav-link active"><i>Mi Perfil</i></a>
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
<center><h2 class="py-3" style="color: WHITE;"><i>Mi Perfil</i></h2></center>
<center>
    		<div class='col-md-6'>
    		<div class='card'>
    		<div class='card-body'>
    		<div class='row'>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'><i>Nombre:</i></h6>
    		<p class='card-text'>
    		    <i><?php echo $_SESSION['Cli_Nombre']; ?></i>
    		</p>
    		</div>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'><i>Apellido:</i></h6>
    		<p class='card-text'>
                <i><?php echo $_SESSION['Cli_Apellido']; ?></i>
    		</p>
    		</div>
    		</div>
    		<div class='row'>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'><i>Tipo de Identificación:</i></h6>
    		<p class='card-text'>
    		    <i><?php echo $_SESSION['Cli_TipoIdentificacion']; ?></i>
    		</p>
    		</div>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'><i>Número de Identificación:</i></h6>
    		<p class='card-text'>
                <i><?php echo $_SESSION['Cli_NumeroIdentificacion']; ?></i>
    		</p>
    		</div>
    		</div>
    		<div class='row'>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'><i>Nacionalidad:</i></h6>
    		<p class='card-text'>
    		    <i><?php echo $_SESSION['Cli_Nacionalidad']; ?></i>
    		</p>
    		</div>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'><i>Ciudad:</i></h6>
    		<p class='card-text'>
                <i><?php echo $_SESSION['Cli_Ciudad']; ?></i>
    		</p>
    		</div>
    		</div>
    		<div class='row'>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'><i>Dirección:</i></h6>
    		<p class='card-text'>
    		    <i><?php echo $_SESSION['Cli_Direccion']; ?></i>
    		</p>
    		</div>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'><i>Teléfono:</i></h6>
    		<p class='card-text'>
                <i><?php echo $_SESSION['Cli_Telefono']; ?></i>
    		</p>
    		</div>
    		</div>
    		<div class='row'>
    		<div class='form-group col-md'>
    		<h6 class='card-subtitle'><i>Email:</i></h6>
    		<p class='card-text'>
    		    <i><?php echo $_SESSION['Cli_Email']; ?></i>
    		</p>
    		</div>
    		<div class='form-group col-md'>
    		<center><a class='card-link btn btn-dark' href='datoscliente.php?id=<?php echo $_SESSION['Cli_Id']; ?>'><i>Actualizar</i></a></center>
    		</div>
    		</div>
    		</div>
    		</div>
    		</div>
            </center>
<br>
<br>
<br>
<br>
<br>
<footer class="col-md-12 bg-light" style="margin-top: 280px;">
    <br>
    <center><font size="4px"><i>© 2021 El Manantial</i></font></center>
    <br>
</footer>
</body>
</html>