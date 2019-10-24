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
			<img width='60px' height='65px' src="<?= base_url(); ?>src/uniajc_logo.png" class="img-fluid" alt="Responsive image">
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link nav-hover" href="<?php echo base_url();?>index.php/grupo">Inicio</a>
					<a class="nav-item nav-link nav-hover"
						href="<?php echo base_url();?>index.php/grupo/organizacion">Organización</a>
					<a class="nav-item nav-link nav-hover" href="<?php echo base_url();?>index.php/grupo/asesorias">Asesorias</a>
					<a class="nav-item nav-link nav-hover  active" href="<?php echo base_url();?>index.php/grupo/entregas">Entregas<span
							class="sr-only">(current)</span></a>
					<a class="nav-item nav-link nav-hover" href="<?php echo base_url();?>index.php/grupo/contacto">Contacto</a>
				</div>
			</div>
			<div class="logout">
			<form action="<?php echo base_url();?>index.php/grupo/logout">
				<button type="submit" class="btn btn-hover color-yellow" ><i class="fas fa-power-off"></i> cerrar sesión</button>
			</form>
		    </div>
		</nav>
	<div class="container">
		<div class="informacion"><br>
        <div class="container"><?= $mensaje;?></div>
			<div class="container"><br><br>
            <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="grupo" hidden value="<?= $_SESSION['id_grupo'];?>">
            <input type="text" name="asesor" hidden value="<?= $_SESSION['id_asesor'];?>">
            <select name="entrega">
            <option value="primera">Primera entrega</option>
            <option value="final">Entrega final</option>
            </select><br><br>
			</div>
            <div class="container"><h5>La entrega realizada puede ser modificada antes del plazo establecido.
			<br>El archivo de la entrega debe estar en formato PDF.</h5><br><br>
            <input type="file" name="archivo" accept="application/pdf" required><br><br><br>
            <div class="row">
            <div class="col"></div>
            <div class="col"><button type="submit" class="btn btn-primary" onclick="this.form.action='<?= base_url();?>index.php/grupo/enviar'">Enviar o Modificar</button></div>
            <div class="col"></div>
            <div class="col"></div>
            </div><br><br>
            </div>
            </form>
			<div class="container">
			<br>
			</div>

			<div class="container">
			<table class="table table-striped">
			<thead>
			<tr>
			<th>Entrega</th>
			<th>Archivo</th>
			<th>Estado</th>
			</tr>
			</thead>
			<tbody>
			<tr>
            <td>Primer entrega</td>
			<td><form action="<?= base_url();?>index.php/grupo/ver_entrega" method="post">
            <input type="text" name="grupo" hidden value="<?= $_SESSION['id_grupo'];?>">
			<input type="text" name="entrega" hidden value="primer">
            <button type="submit" class="btn btn-primary" <?= $estado['primer_boton'];?> target="_blank">Ver entrega</button>
            </form></td>
			<?= $estado['estado_primer']; ?>
			</tr>
			<tr>
			<td>Entrega final</td>
			<td><form action="<?= base_url();?>index.php/grupo/ver_entrega" method="post">
            <input type="text" name="grupo" hidden value="<?= $_SESSION['id_grupo'];?>">
			<input type="text" name="entrega" hidden value="final">
            <button type="submit" class="btn btn-primary" <?= $estado['final_boton'];?> target="_blank">Ver entrega</button>
            </form></td>
			<?= $estado['estado_final']; ?>
			</tr>
			</tbody>
			</table><br><br>
			</div>

		</div><br>



	</div>



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
