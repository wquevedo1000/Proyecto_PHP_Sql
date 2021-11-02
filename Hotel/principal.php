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
<center><h2 class="py-3" style="color: WHITE;"><i>Habitaciónes</i></h2></center>
		<center><img src="images/image8.jpg" width="1300px" height="300px" class="img-fluid"></center><br>
<center>
<div class="row col-md-12 col-xs-12 col-sm-12 col-lg-12">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<center><h3 class="card-title"><i>Habitación individual</i></h3></center>
            <img src="images/image1.jpg" class="card-img"><br>
            <br>
			<div class="row">
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Descripción:</i></h6>
				   <p class="card-text">
				   	   <i>Habitación con vista a la calle con superficie de 8 a 9 metros cuadrados, cuenta con baño privado perfecta para una persona.</i>
				   </p>
				</div>
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Características:</i></h6>
				   <p class="card-text">
				   	   <i>Cama individual(120cm), Conexión Wi-Fi gratuita, Televisión LCD de pantalla plana, Teléfono directo en la habitación, Nevera/minibar, Climatización individual.</i>
				   </p>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Precio por día:</i></h6>
				   <p class="card-text">
				   	   <i>20,93 Dolares. <font size="2px" color="GREEN">20% OFF</font></i>
				   </p>
				</div>
				<div class="form-group col-md">
				   <center><a href="RegistroReserva1.php" class="card-link btn btn-dark"><i>Reserva Ya</i></a></center>
				</div>
			</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<center><h3 class="card-title"><i>Habitación doble</i></h3></center>
            <img src="images/img2.jpg" class="card-img"><br>
            <br>
			<div class="row">
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Descripción:</i></h6>
				   <p class="card-text">
				   	   <i>Habitación con vista a la calle de 12 metros cuadrados con baño privado especializada para dos personas.</i>
				   </p>
				</div>
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Características:</i></h6>
				   <p class="card-text">
				   	   <i>Dos camas separadas, nevera/minibar, televisor LED de pantalla plana, conexión de Wi-Fi gratuita, aire acondicionado, teléfono de línea directa.</i>
				   </p>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Precio por día:</i></h6>
				   <p class="card-text">
				   	   <i>31,39 Dolares.</i>
				   </p>
				</div>
				<div class="form-group col-md">
				   <center><a href="RegistroReserva2.php" class="card-link btn btn-dark"><i>Reserva Ya</i></a></center>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row col-md-12 col-xs-12 col-sm-12 col-lg-12">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<center><h3 class="card-title"><i>Habitación cuádruple</i></h3></center>
            <img src="images/img3.jpg" class="card-img"><br>
            <br>
			<div class="row">
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Descripción:</i></h6>
				   <p class="card-text">
				   	   <i>Perfecta para grupos de 4 personas esta habitación contiene 2 camas individuales y una cama doble si tiene niños en brazos se dispone una cuna a la habitación, vista hacia la calle y baño privado.</i>
				   </p>
				</div>
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Características:</i></h6>
				   <p class="card-text">
				   	   <i>Cama Doble de 160cm de ancho x 195cm de largo, 2 camas individuales de 100cm de ancho x 190cm de largo, conexión a Wi-Fi gratuita, televisor LED pantalla plana, aire acondicionado, teléfono de línea directa y si el cliente lo desea una cuna de 70cm de ancho x 140cm de largo.</i>
				   </p>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Precio por día:</i></h6>
				   <p class="card-text">
				   	   <i>41,86 Dolares.</i>
				   </p>
				</div>
				<div class="form-group col-md">
				   <center><a href="RegistroReserva3.php" class="card-link btn btn-dark"><i>Reserva Ya</i></a></center>
				</div>
			</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<center><h3 class="card-title"><i>Habitación familiar</i></h3></center>
            <img src="images/image4.jpg" class="card-img"><br>
            <br>
			<div class="row">
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Descripción:</i></h6>
				   <p class="card-text">
				   	   <i>Son dos habitaciones dobles continuas que le brindan a las familias más espacio y privacidad su área es de 40 metros cuadrados.</i>
				   </p>
				</div>
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Características:</i></h6>
				   <p class="card-text">
				   	   <i>Cada una cuenta con 2 camas individuales, conexión a Wi-Fi gratuita, aire acondicionado, teléfono con línea directa, baño privado, televisor de pantalla plana y minibar.</i>
				   </p>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Precio por día:</i></h6>
				   <p class="card-text">
				   	   <i>47,14 Dolares. <font size="2px" color="GREEN">30% OFF</font></i>
				   </p>
				</div>
				<div class="form-group col-md">
				   <center><a href="RegistroReserva4.php" class="card-link btn btn-dark"><i>Reserva Ya</i></a></center>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row col-md-12 col-xs-12 col-sm-12 col-lg-12">
	<center><div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<center><h3 class="card-title"><i>Habitación matrimonial</i></h3></center>
            <img src="images/image5.jpg" class="card-img"><br>
            <br>
			<div class="row">
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Descripción:</i></h6>
				   <p class="card-text">
				   	   <i>Si usted y su pareja quieren pasar una velada inolvidable esta es su habitación ideal con hermosa vista hacia la ciudad, cuenta con espacio amplio y privacidad perfecta para parejas.</i>
				   </p>
				</div>
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Características:</i></h6>
				   <p class="card-text">
				   	   <i>Cama matrimonial, conexión Wi-Fi gratuita, televisor LED pantalla plana, baño privado con tina, nevera/minibar, teléfono con línea directa y de cortesía una botella de champaña.</i>
				   </p>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md">
				   <h6 class="card-subtitle"><i>Precio por día:</i></h6>
				   <p class="card-text">
				   	   <i>52,09 Dolares.</i>
				   </p>
				</div>
				<div class="form-group col-md">
				   <center><a href="RegistroReserva5.php" class="card-link btn btn-dark"><i>Reserva Ya</i></a></center>
				</div>
			</div>
			</div>
		</div>
	</div></center>
</div>
</center>
<br>
<footer class="col-md-12 bg-light">
	<br>
	<center><font size="4px"><i>© 2021 El Manantial</i></font></center>
	<br>
</footer>
</body>
</html>