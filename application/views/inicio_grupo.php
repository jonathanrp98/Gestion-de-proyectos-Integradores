<?php
if(@!$_SESSION['rol']){
	echo "<script type=\"text/javascript\">
           history.go(-1);
       </script>";
}else if($_SESSION['rol'] != '5'){
	echo "<script type=\"text/javascript\">
           history.go(-1);
       </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" href="<?php echo base_url(); ?>src/favico.ico">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilos.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilosdash.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<title>Inicio</title>
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
				<a class="nav-item nav-link nav-hover active" href="<?php echo base_url();?>index.php/grupo">Inicio
					<span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link nav-hover"
					href="<?php echo base_url();?>index.php/grupo/organizacion">Organización</a>
				<a class="nav-item nav-link nav-hover"
					href="<?php echo base_url();?>index.php/grupo/asesorias">Asesorias</a>
				<a class="nav-item nav-link nav-hover"
					href="<?php echo base_url();?>index.php/grupo/entregas">Entregas</a>
				<a class="nav-item nav-link nav-hover"
					href="<?php echo base_url();?>index.php/grupo/contacto">Contacto</a>
			</div>
		</div>
		<div class="logout">
			<form action="<?php echo base_url();?>index.php/grupo/logout">
				<button type="submit" class="btn btn-hover color-yellow"><i class="fas fa-power-off"></i> cerrar sesión</button>
			</form>
		</div>
	</nav>
	<div class="informacion">
		<div class="container"><br>
			<div class="row">
				<div class="col-4">
					<div class="card color-card mb-3" style="max-width: 18rem;">
						<div class="card-header">
							<h5><i class="fas fa-project-diagram">&nbsp;</i>Proyecto:</h5>
						</div>
						<div class="card-body">
							<p class="card-text">
								<h6><?php echo $_SESSION['proyecto'] ?></h6>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="card color-card mb-3" style="max-width: 18rem;">
						<div class="card-header" style="text-align:center;">
							<h5><i class="fas fa-file-pdf"></i> Asesorias</h5>
						</div>
						<div class="card-body" style="text-align:center;">
							<p class="card-text">
								<h4><?= $asesorias; ?></h4>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="card color-card mb-3" style="max-width: 18rem;">
						<div class="card-header" style="text-align:center;">
							<h5><i class="fas fa-calendar-alt"></i> Sustentación</h5>
						</div>
						<div class="card-body" style="text-align:center;">
							<p class="card-text">
								<h4><?php foreach($sustentacion as $row2){
									echo $row2->fecha_hora." Lugar: ".$row2->lugar;
								} ?></h4>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="card color-card mb-3" style="max-width: 18rem;">
						<div class="card-header">
							<h5 style="text-align:center;"><i class="fas fa-users"></i> Grupo:
								<?php echo $_SESSION['id_grupo'] ?></h5>
							<hr>
							<h5>Integrantes:</h5>
						</div>
						<div class="card-body">
							<p class="card-text">
								<?php
									foreach($integrantes as $row){
										echo $row->nombre."<br><br>";
									} 
									?>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="card color-card mb-3" style="max-width: 18rem;">
						<div class="card-header" style="text-align:center;">
							<h5><i class="fas fa-calendar-alt"></i> Primer entrega</h5>
						</div>
						<div class="card-body" style="text-align:center;">
							<p class="card-text">
								<h4><?php
									echo $entregas['primer_entrega'];
								 ?></h4>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="card color-card mb-3" style="max-width: 18rem;">
						<div class="card-header" style="text-align:center;">
							<h5><i class="fas fa-calendar-alt"></i> Segunda entrega</h5>
						</div>
						<div class="card-body" style="text-align:center;">
							<p class="card-text">
								<h4><?php
									echo $entregas['segunda_entrega'];
								 ?></h4>
						</div>
					</div>
				</div>


			</div><!-- </row> -->
		</div>
	</div>
	<br> <br>
	<!-- <?php $url = base_url();include("templates/footer.php"); ?> -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
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