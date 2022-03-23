<?php
	require_once("../../config/conexion.php");
	if(isset($_SESSION["id_usuario"])) {
?>
<!DOCTYPE html>
<html>
<head lang="es">
	<?php require_once("../head/head.php"); ?>
	<title>CCTV México - Home</title>
</head>
<body class="with-side-menu" style="background-color: white">

	<?php
		include_once("../header/header.php");
	?>

	<div class="mobile-menu-left-overlay"></div>
	
	<?php
		include_once("../aside/aside.php");
	?>

	<div class="page-content">
		<div class="container-fluid">
            <?php
                if ($_SESSION["id_rol"] == 1){
            ?>
                <h1>Bienvenido administrador</h1>
            <?php
                } else {
            ?>
                <h1>Bienvenido seguridad</h1>
            <?php
                }
            ?>
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<?php require_once("../scripts/js.php"); ?>
	<script type="text/javascript" src="home.js"></script>
</body>
</html>
<?php
	} else {
		header("Location:".Conectar::ruta()."index.php");
	}
?>