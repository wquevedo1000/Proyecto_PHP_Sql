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
		</div>
	</nav>
<center><h2 class="py-3" style="color: WHITE;"><i>Iniciar sesión administrador</i></h2>
<form action="" method="POST" autocomplete="off" class="col-md-6 bg-light py-3">
	<div class="row">
	<div class="form-group col-md">
	<label><i>Email</i></label>
	<input type="email" name="email" required="" class="form-control">
    </div>
    </div>
	<div class="row">
	<div class="form-group col-md">
	<label><i>Clave</i></label>
	<input type="password" name="contrasena" required="" class="form-control">
    </div>
    </div>
	<input type="submit" value="Iniciar sesión" class="btn btn-dark">
</form></center>
<?php
    if(isset($_POST['email']) && isset($_POST['contrasena'])){
    	require_once "Conectar/connect.php";
    	require_once "Procesos/loginadministrador.php";
    }
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer class="col-md-12 bg-light" style="margin-top: 278px;">
	<br>
	<center><font size="4px"><i>© 2021 El Manantial</i></font></center>
	<br>
</footer>
</body>
</html>