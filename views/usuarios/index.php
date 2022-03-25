<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
<head>
    <?php require_once("../head/head.php");?>
	<title>Usuarios</title>
</head>
<body class="with-side-menu">

    <?php require_once("../header/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../aside/aside.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Usuarios</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li class="active">Usuarios</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
				<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 10%;">Nombre</th>
							<th style="width: 10%;">Apellido</th>
							<th class="d-none d-sm-table-cell" style="width: 40%;">Usuario</th>
							<th class="d-none d-sm-table-cell" style="width: 5%;">Sexo</th>
							<th class="d-none d-sm-table-cell" style="width: 5%;">Roles</th>
							<th class="text-center" style="width: 5%;"></th>
							<th class="text-center" style="width: 5%;"></th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!-- Contenido -->

	<?php //require_once("modalUsuario.php");?>

	<?php require_once("../scripts/js.php");?>
	
	<script type="text/javascript" src="usuarios.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>