<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../head/head.php");?>
	<title>AnderCode</>::Consultar Ticket</title>
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
							<h3>Consultar registros entradas / salidas de residentes.</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Consultar registros</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<table id="ticket_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 20%;">Residente</th>
							<th style="width: 20%;">Registro salida</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Fecha de salida</th>
							<th class="d-none d-sm-table-cell" style="width: 5%;">Hora de salida</th>
							<th class="d-none d-sm-table-cell" style="width: 20%;">Registro de entrada</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;">Fecha de entrada</th>
							<th class="d-none d-sm-table-cell" style="width: 5%;">Hora de entrada</th>
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
	<?php require_once("modal_registro.php");?>

	<?php require_once("../scripts/js.php");?>

	<script type="text/javascript" src="consultarticket.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>