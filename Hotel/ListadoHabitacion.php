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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css"/>  
    <style>
    	label{
    		color: WHITE;
    	}

    	#example_info{
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
<center><h2 class="py-3" style="color: WHITE;"><i>Listado de Habitaciones</i></h2></center>
<a href="RegistroHabitacion.php" class="btn btn-light"><i>Registrar Habitación Nueva</i></a><br><br>
<?php
    require_once "Conectar/connect.php";
    if(isset($_GET['id'])){
    	require_once "Procesos/eliminarhabitacion.php";
    }
?>
<div class="table-responsive">
<table class="table table-bordered table-sm" id="example">
	<thead class="thead-light">
		<tr>
			<th><i>Número</i></th>
			<th><i>Piso</i></th>
			<th><i>Descripción</i></th>
			<th><i>Características</i></th>
			<th><i>Precio Día (Dolar)</i></th>
			<th><i>Tipo</i></th>
			<th><i>Estado</i></th>
			<th><i>Actualizar</i></th>
			<th><i>Eliminar</i></th>
		</tr>
	</thead>
	<tbody>
		<?php
		    require_once "Procesos/seleccionarhabitacion.php";
		?>
	</tbody>
</table>
</div>
<br>
<footer class="col-md-12 bg-light">
	<br>
	<center><font size="4px"><i>© 2021 El Manantial</i></font></center>
	<br>
</footer>
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
</script>
</body>
</html>