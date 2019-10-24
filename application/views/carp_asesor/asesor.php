<?php
if(@!$_SESSION['rol']){
	echo "<script type=\"text/javascript\">
           history.go(-1);
       </script>";
}else if($_SESSION['rol'] == '3' || $_SESSION['rol'] == '4'){
$jurado_asesor = "";
if($_SESSION['rol'] == '4'){
$url = base_url();
$jurado_asesor = "<div class='logout'><form action='".$url."index.php/jurado'><button class='btn btn-primary'>Ir a jurado</button></form></div>&nbsp;";
}
}else{
	echo "<script type=\"text/javascript\">
	history.go(-1);
</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilos.css"> 
	<link rel="icon" href="<?php echo base_url(); ?>src/favico.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<title>Asesor</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded-0">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
				aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<img width='60px' height='65px' src="<?= base_url(); ?>src/uniajc_logo.png" class="img-fluid" alt="Responsive image">
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
				<ul>
						<dl class="nav-item dropdown">

							<a class="nav-link dropdown-toggle nav-hover" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false">Entregas</a>
							<div class="dropdown-menu">
								<a class="dropdown-item nav-hover" href='<?php echo site_url('asesor/crud_primera_entrega')?>' >Primera entega</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item nav-hover" href='<?php echo site_url('asesor/crud_entregafinal')?>' >Segunda entrega </a>
							</div>
						</dl>
					</ul>
					<a class="nav-item nav-link nav-hover" href='<?php echo site_url('asesor/crud_asesorias')?>'>Asesorias</a>
					<a class="nav-item nav-link nav-hover" href='<?php echo site_url('asesor/crud_grupo')?>'>Grupos</a>
					<a class="nav-item nav-link nav-hover" href='<?php echo site_url('asesor/cal_estudiante')?>'>Calificaciones</a>
				</div>
			</div>
			<?= $jurado_asesor; ?>
			<div class="logout">
			<form action="<?php echo base_url();?>index.php/grupo/logout">
				<button type="submit" class="btn btn-hover color-yellow" ><i class="fas fa-power-off"></i> cerrar sesión</button>
			</form>
		    </div>
		</nav>

	
	<div style='height:20px;'></div>
	<div style="padding: 10px">
		<?php echo $output; ?>
	</div><br><br><br><br>
	<br>
	<br>
	<br>
	<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="https://cdn.jsdelivr.net/es6-promise/latest/es6-promise.auto.min.js"></script>
</body>

</html>