<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../head/head.php");?>
	<title>Registrar salidas de residente</title>
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
							<h3>Nuevo registro</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li class="active">Nuevo registro</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<p>
					Desde esta ventana podra registrar las salidas de los residentes
				</p>

				<h5 class="m-t-lg with-border">Ingresar Información</h5>

				<div class="row">
					<form method="post" id="registro_rs_form">
						<div class="col-lg-12">
						<fieldset class="form-group">
								<label class="form-label semibold" for="id_colono">Residente:</label>
								<select id="id_colono" name="id_colono" class="form-control" required>

								</select>
							</fieldset>
						</div>

						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="fecha_salidacl">Fecha de salida</label>
								<input type="date" class="form-control" name="fecha_salidacl" id="fecha_salidacl">
							</fieldset>
						</div>

						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="salida_cl">Hora de salida</label>
								<input type="time" class="form-control" name="salida_cl" id="salida_cl">
							</fieldset>
						</div>

						<div class="col-lg-12">
						<fieldset class="form-group">
								<label class="form-label semibold" for="usuario_salida">Persona que hace el registro</label>
								<select id="usuario_salida" name="usuario_salida" class="form-control" required>

								</select>
							</fieldset>
						</div>
						
						<div class="col-lg-12">
							<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("../scripts/js.php");?>

	<script type="text/javascript" src="registro_rs.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>