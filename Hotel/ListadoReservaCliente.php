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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css"/>
    <style>
    	label{
    		color: WHITE;
    	}

    	#example_info{
    		color: WHITE;
    	}

    	#example2_info{
    		color: WHITE;
    	}
    </style>
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
					<a href="ListadoReservaCliente.php" class="nav-link active"><i>Mis Reservas</i></a>
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
<center><h2 class="py-3" style="color: WHITE;"><i>Mis Reservas</i></h2></center>
<h3 class="py-3" style="color: WHITE;"><i>Reservas Activas:</i></h3>
<?php
    require_once "Conectar/connect.php";
    if(isset($_GET['id'])){
    	require_once "Procesos/eliminarreservacliente.php";
    }
?>
<div class="table-responsive">
<table class="table table-bordered table-sm" id="example">
	<thead class="thead-light">
		<tr>
			<th><i>Número de habitación</i></th>
			<th><i>Fecha de la reserva</i></th>
			<th><i>Fecha de ingreso</i></th>
			<th><i>Hora de ingreso</i></th>
			<th><i>Fecha de salida</i></th>
			<th><i>Hora de salida</i></th>
			<th><i>Tipo de habitación</i></th>
			<th><i>Cantidad de días</i></th>
			<th><i>Costo total (Dolar)</i></th>
			<th><i>Actualizar</i></th>
			<th><i>Cancelar</i></th>
		</tr>
	</thead>
	<tbody>
		<?php
		    $busqueda = $_SESSION['Cli_Id'];

		    $consulta = $pdo -> prepare("SELECT Res_Id, Res_NumeroHabitacion, Res_Fecha, Res_FechaIngreso, Res_HoraIngreso, Res_FechaSalida, Res_HoraSalida, Hab_Tipo, Res_CantidadDias, Res_Costo FROM tblhabitacion INNER JOIN tblreserva ON Hab_Numero = Res_NumeroHabitacion WHERE Res_IdCliente = '".$busqueda."' AND Res_Estado = 'Activa'");

		    $consulta -> execute();
		    if($consulta -> rowCount() >= 1){
		    	while($fila = $consulta -> fetch()){
		    		echo "<tr>
		    		    <td><i>".$fila['Res_NumeroHabitacion']."</i></td>
		    		    <td><i>".$fila['Res_Fecha']."</i></td>
		    		    <td><i>".$fila['Res_FechaIngreso']."</i></td>
		    		    <td><i>".$fila['Res_HoraIngreso']."</i></td>
		    		    <td><i>".$fila['Res_FechaSalida']."</i></td>
		    		    <td><i>".$fila['Res_HoraSalida']."</i></td>
		    		    <td><i>".$fila['Hab_Tipo']."</i></td>
		    		    <td><i>".$fila['Res_CantidadDias']."</i></td>
		    		    <td><i>".$fila['Res_Costo']."</i></td>
		    		    <td><a class='btn btn-dark' href='datosreservacli.php?id=".$fila['Res_Id']."'><i>Actualizar</i></a></td>
		    		    <td><a class='btn btn-dark' href='ListadoReservaCliente.php?id=".$fila['Res_Id']."'><i>Cancelar</i></a></td>
		    		</tr>";
		    	}
		    }else{
		    	echo "<tr>
		    	        <td colspan='4'><i>No hay datos</i></td>
		    	    </tr>";
		    }
		?>
	</tbody>
</table>
</div>
<h3 class="py-3" style="color: WHITE;"><i>Reservas Pagas:</i></h3>
<div class="table-responsive">
<table class="table table-bordered table-sm" id="example2">
	<thead class="thead-light">
		<tr>
			<th><i>Número de habitación</i></th>
			<th><i>Fecha de la reserva</i></th>
			<th><i>Fecha de ingreso</i></th>
			<th><i>Hora de ingreso</i></th>
			<th><i>Fecha de salida</i></th>
			<th><i>Hora de salida</i></th>
			<th><i>Tipo de habitación</i></th>
			<th><i>Cantidad de días</i></th>
			<th><i>Costo total (Dolar)</i></th>
		</tr>
	</thead>
	<tbody>
		<?php
		    $busqueda = $_SESSION['Cli_Id'];

		    $consulta = $pdo -> prepare("SELECT Res_Id, Res_NumeroHabitacion, Res_Fecha, Res_FechaIngreso, Res_HoraIngreso, Res_FechaSalida, Res_HoraSalida, Hab_Tipo, Res_CantidadDias, Res_Costo FROM tblhabitacion INNER JOIN tblreserva ON Hab_Numero = Res_NumeroHabitacion WHERE Res_IdCliente = '".$busqueda."' AND Res_Estado = 'Paga'");

		    $consulta -> execute();
		    if($consulta -> rowCount() >= 1){
		    	while($fila = $consulta -> fetch()){
		    		echo "<tr>
		    		    <td><i>".$fila['Res_NumeroHabitacion']."</i></td>
		    		    <td><i>".$fila['Res_Fecha']."</i></td>
		    		    <td><i>".$fila['Res_FechaIngreso']."</i></td>
		    		    <td><i>".$fila['Res_HoraIngreso']."</i></td>
		    		    <td><i>".$fila['Res_FechaSalida']."</i></td>
		    		    <td><i>".$fila['Res_HoraSalida']."</i></td>
		    		    <td><i>".$fila['Hab_Tipo']."</i></td>
		    		    <td><i>".$fila['Res_CantidadDias']."</i></td>
		    		    <td><i>".$fila['Res_Costo']."</i></td>
		    		</tr>";
		    	}
		    }else{
		    	echo "<tr>
		    	        <td colspan='4'><i>No hay datos</i></td>
		    	    </tr>";
		    }
		?>
	</tbody>
</table>
</div>
<script src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>

<script>
	$(document).ready(function(){
		var table = $('#example').DataTable({
			orderCellsTop: true,
			fixedHeader: true
		});

	$('#example thead tr').clone(true).appendTo( '#example thead' );

	$('#example thead tr:eq(1) th').each( function (i) {
		var title = $(this).text();
		$(this).html( '<input type="text" placeholder="Buscar '+title+'" class="form-control" />' );

		$( 'input', this ).on( 'keyup change', function() {
			if ( table.column(i).search() !== this.value ) {
				table
				    .column(i)
				    .search( this.value )
				    .draw();
			}
		} );
	} );

	});

	$(document).ready(function(){
		var table = $('#example2').DataTable({
			orderCellsTop: true,
			fixedHeader: true
		});

	$('#example2 thead tr').clone(true).appendTo( '#example2 thead' );

	$('#example2 thead tr:eq(1) th').each( function (i) {
		var title = $(this).text();
		$(this).html( '<input type="text" placeholder="Buscar '+title+'" class="form-control" />' );

		$( 'input', this ).on( 'keyup change', function() {
			if ( table.column(i).search() !== this.value ) {
				table
				    .column(i)
				    .search( this.value )
				    .draw();
			}
		} );
	} );

	});
</script>
<br>
<footer class="col-md-12 bg-light">
	<br>
	<center><font size="4px"><i>© 2021 El Manantial</i></font></center>
	<br>
</footer>
</body>
</html>