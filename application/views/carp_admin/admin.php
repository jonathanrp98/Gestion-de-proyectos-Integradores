<?php
if(@!$_SESSION['rol']){
	echo "<script type=\"text/javascript\">
           history.go(-1);
       </script>";
}else if($_SESSION['rol'] != '1'){
	echo "<script type=\"text/javascript\">
           history.go(-1);
       </script>";
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo base_url(); ?>src/favico.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilos.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<title>Admin</title>
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
							<a class="nav-link dropdown-toggle nav-hover" data-toggle="dropdown" href='<?php echo site_url('admin/crud_estudiante')?>' role="button"
								aria-haspopup="true" aria-expanded="false">Gestión De Usuarios</a>
							<div class="dropdown-menu">
								<a class="dropdown-item nav-hover"
									href='<?php echo site_url('admin/crud_estudiante')?>'>Estudiantes</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item nav-hover" href='<?php echo site_url('admin/crud_usuario')?>'>Admin /
									Jurado / Asesor</a>
							</div>
						</dl>
					</ul>
					<a class="nav-item nav-link nav-hover" href='<?php echo site_url('admin/crud_proyecto')?>'>Proyectos</a>
					
					<a class="nav-item nav-link nav-hover" href='<?php echo site_url('admin/crud_staff')?>' >Staff</a>
		
					<a class="nav-item nav-link nav-hover" href='<?php echo site_url('admin/sustentacion_grupos_staff')?>'>Cronograma sustentación</a>
					<a class="nav-item nav-link nav-hover" href='<?php echo site_url('admin/crud_asesorias')?>'>Asesorias</a>
					<a class="nav-item nav-link nav-hover" href='<?php echo site_url('admin/crud_formulario')?>'>Formulario </a>
					<ul>
						<dl class="nav-item dropdown">

							<a class="nav-link dropdown-toggle nav-hover" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false">Gestión de grupos</a>
							<div class="dropdown-menu">
								<a class="dropdown-item nav-hover" href='<?php echo site_url('admin/crud_grupo')?>' >Crear Grupos</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item nav-hover" href='<?php echo site_url('admin/crud_Asignar')?>' >Asignar Grupos a estudiantes</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item nav-hover" href='<?php echo site_url('admin/nota_proyecto')?>' >Nota final proyecto</a>
							</div>
						</dl>
					</ul>
				
					<ul>
						<dl class="nav-item dropdown">

							<a class="nav-link dropdown-toggle nav-hover" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false">Gestión De Entregas</a>
							<div class="dropdown-menu">
								<a class="dropdown-item nav-hover" href='<?php echo site_url('admin/crud_primera_entrega')?>' >Primera Entrega</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item nav-hover" href='<?php echo site_url('admin/crud_entregafinal')?>' >Entrega Final</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item nav-hover" href='<?php echo site_url('admin/crud_calificacion_ent')?>' >Calificacion de Entregas</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item nav-hover" href='<?php echo site_url('admin/crud_calificaiones_sus')?>' >Calificaciones Sustentaciones</a>
								
							</div>
						</dl>
					</ul>
					<a class="nav-item nav-link nav-hover" href='<?php echo site_url('admin/crud_porcentaje_calificacion')?>'>Porcentajes de Calificación</a>
					<a class="nav-item nav-link nav-hover" href='<?php echo site_url('admin/enviar_correos')?>'>Envio de correos</a>
				</div>
			</div>
			<div class="logout">
			<form action="<?php echo base_url();?>index.php/grupo/logout">
				<button type="submit" class="btn btn-hover color-yellow" ><i class="fas fa-power-off"></i> cerrar sesión</button>
			</form>
		    </div>
		</nav>
	<!-- <div style='height:20px;'></div> -->

		<?php echo $output; ?>
	
	<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>

	
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
	</script>
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
	</script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="https://cdn.jsdelivr.net/es6-promise/latest/es6-promise.auto.min.js"></script>
</body>

</html>