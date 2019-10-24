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
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo base_url(); ?>src/favico.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilos.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilosdash.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
		integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<title>Envio de correos</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
			aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<img width='60px' height='65px' src="<?= base_url(); ?>src/uniajc_logo.png" class="img-fluid"
			alt="Responsive image">
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<ul>
					<dl class="nav-item dropdown">
						<a class="nav-link dropdown-toggle nav-hover" data-toggle="dropdown"
							href='<?php echo site_url('admin/crud_estudiante')?>' role="button" aria-haspopup="true"
							aria-expanded="false">Gestión De Usuarios</a>
						<div class="dropdown-menu">
							<a class="dropdown-item nav-hover"
								href='<?php echo site_url('admin/crud_estudiante')?>'>Estudiantes</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item nav-hover" href='<?php echo site_url('admin/crud_usuario')?>'>Admin
								/
								Jurado / Asesor</a>
						</div>
					</dl>
				</ul>
				<a class="nav-item nav-link nav-hover" href='<?php echo site_url('admin/crud_proyecto')?>'>Proyectos</a>

				<a class="nav-item nav-link nav-hover" href='<?php echo site_url('admin/crud_staff')?>'>Staff</a>

				<a class="nav-item nav-link nav-hover"
					href='<?php echo site_url('admin/sustentacion_grupos_staff')?>'>Cronograma sustentación</a>
				<a class="nav-item nav-link nav-hover"
					href='<?php echo site_url('admin/crud_asesorias')?>'>Asesorias</a>
				<a class="nav-item nav-link nav-hover" href='<?php echo site_url('admin/crud_formulario')?>'>Formulario
				</a>
				<ul>
					<dl class="nav-item dropdown">

						<a class="nav-link dropdown-toggle nav-hover" data-toggle="dropdown" href="#" role="button"
							aria-haspopup="true" aria-expanded="false">Gestión de grupos</a>
						<div class="dropdown-menu">
							<a class="dropdown-item nav-hover" href='<?php echo site_url('admin/crud_grupo')?>'>Crear
								Grupos</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item nav-hover"
								href='<?php echo site_url('admin/crud_Asignar')?>'>Asignar Grupos a estudiantes</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item nav-hover" href='<?php echo site_url('admin/nota_proyecto')?>'>Nota
								final proyecto</a>
						</div>
					</dl>
				</ul>
				<ul>
					<dl class="nav-item dropdown">

						<a class="nav-link dropdown-toggle nav-hover" data-toggle="dropdown" href="#" role="button"
							aria-haspopup="true" aria-expanded="false">Gestión De Entregas</a>
						<div class="dropdown-menu">
							<a class="dropdown-item nav-hover"
								href='<?php echo site_url('admin/crud_primera_entrega')?>'>Primera Entrega</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item nav-hover"
								href='<?php echo site_url('admin/crud_entregafinal')?>'>Entrega Final</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item nav-hover"
								href='<?php echo site_url('admin/crud_calificacion_ent')?>'>Calificacion de Entregas</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item nav-hover"
								href='<?php echo site_url('admin/crud_calificaiones_sus')?>'>Calificaciones
								Sustentaciones</a>

						</div>
					</dl>
				</ul>
				<a class="nav-item nav-link nav-hover"
					href='<?php echo site_url('admin/crud_porcentaje_calificacion')?>'>Porcentajes de Calificación</a>
				<a class="nav-item nav-link nav-hover" href='<?php echo site_url('admin/enviar_correos')?>'>Envio de
					correos</a>
			</div>
		</div>
		<div class="logout">
			<form action="<?php echo base_url();?>index.php/grupo/logout">
				<button type="submit" class="btn btn-hover color-yellow"><i class="fas fa-power-off"></i> cerrar sesión</button>
			</form>
		</div>
	</nav>

<!-- /////////////////////////////             TABLAS Y FILTROS       /////////////////////////// -->


	<div class="container "><br>
		<?= $mensaje; ?>
		<div class="form-row">
			<div class="col-12"><br>
				<h3 style="text-align:center;">Destinatarios</h3>
				<form id="myform" action="<?= base_url(); ?>index.php/admin/info_envio_correos" method="post">
					<table class="table-bordered table pull-right">
						<form id="formEjemplo">
							<tr role="row">
								<td>Filtros: </td>
								<td>
									<div class="form-group" class="position-right">
										<input type="text" class="form-control pull-right" style="width:80%" id="codigo"
											placeholder="Código">
									</div>
								</td>
								<td>
									<div class="form-group" class="position-right">
										<input type="text" class="form-control pull-right" style="width:80%"
											id="semestre" placeholder="Semestre">
									</div>
								</td>
								<td>
									<div class="form-group" class="position-right">
										<input type="text" class="form-control pull-right" style="width:80%"
											id="jornada" placeholder="Jornada">
									</div>
								</td>
								<td>
									<div class="form-group" class="position-right">
										<input type="text" class="form-control pull-right" style="width:80%" id="asesor"
											placeholder="Asesor">
									</div>
								</td>
								<td>
									<div class="form-group" class="position-right">
										<input type="text" class="form-control pull-right" style="width:80%"
											id="programa" placeholder="Programa">
									</div>
								</td>
							</tr>
						</form>
					</table>
					<table class="table-bordered table pull-right" id="mytable" cellspacing="0" style="width: 100%;">
						<thead>
							<tr role="row">
								<th>
									<div class="form-group form-check">
										<input type="checkbox" class="form-check-input" id="selectall">
								</th>
								<th>Codigo</th>
								<th>Semestre</th>
								<th>Jornada</th>
								<th>Asesor</th>
								<th>Programa </th>
							</tr>
						</thead>
						<tbody>
							<?php 
           				foreach($grupos as $row)
            			{ 
							echo"<tr>
								<td>
									<div class='form-group form-check'>
										<input type='checkbox' id='form-check-input$row->cod_grupo'  name='check[]' value='$row->cod_grupo' class='form-check-input'>
									</div>
								</td>
								<td >$row->cod_grupo</td>
								<td>$row->semestre_id</td>
								<td>$row->jornada</td>
								<td>$row->nombre_asesor</td>
								<td>$row->nombre</td>
							</tr>
							";
							
							
           				 }
           				 ?>


						</tbody>
					</table>
				<input type="text" class="form-control" name="asunto" placeholder="Asunto" required><br> 
					<textarea class="form-control" name="mensaje" placeholder="Mensaje" rows="3"
						required></textarea><br>
					<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						Enviar Mensaje <i class="far fa-paper-plane"></i>
					</button>
				</form>
			</div>
		</div><br>
	</div>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


	<script>
	  
	  	document.getElementById("codigo").onclick = limpiaCampo;
		document.getElementById("semestre").onclick = limpiaCampo;
		document.getElementById("jornada").onclick = limpiaCampo;
		document.getElementById("asesor").onclick = limpiaCampo;
		document.getElementById("programa").onclick = limpiaCampo;
		var elements = document.querySelectorAll("input");

		for (var i = 0; i < elements.length; i++) {
			elements[i].addEventListener("focus", function () {

				inputfocused = this;
			});
		}

		function limpiaCampo() {
			$("#formEjemplo")[0].reset();
		}
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="<?php echo base_url();?>js/envio_correo.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
</body>

</html>