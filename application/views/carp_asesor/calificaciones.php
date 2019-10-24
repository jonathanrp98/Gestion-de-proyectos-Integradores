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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilos.css"> 
	<link rel="icon" href="<?php echo base_url(); ?>src/favico.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilosdash.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<title>Calificaciones</title>
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
	<div class="container">
<div class="informacion">
    <br>
    <?= $actual; ?>
    <br>
    <div class="row">
        <div class="col-sm-2"><form method="post" action="<?= base_url(); ?>index.php/asesor/cal_estudiante">
    <input type="text" name="entrega" value="primer_entrega" hidden>
    <button type="submit" class="btn btn-primary">Primera entrega</button>
    </form></div>
        <div class="col-sm-2"><form method="post" action="<?= base_url(); ?>index.php/asesor/cal_estudiante">
    <input type="text" name="entrega" value="segunda_entrega" hidden>
    <button type="submit" class="btn btn-primary">Segunda entrega</button>
    </form></div> 
    </div>
<br>
<?= $mensaje ?><br>
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">Grupo</th>
      <th scope="col">Semestre</th>
      <th scope="col">Jornada</th>
      <th scope="col">Programa</th>
      <th scope="col">Estado</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
<?php 
 $url = base_url();
 if(empty($grupos)){
echo "<tr><td class='text-danger'>Sin grupos para calificar</td></tr>";
 }else{
	foreach($grupos as $row)
	{ 
		$opcion = "<p class='text-danger'>Sin calificar</p>";
		$boton = "Calificar";
		foreach($estado as $row2){
			if($row->cod_grupo == $row2->cod_grupo){
				if($row2->cantidad == $row2->filas){
					$boton = "Ver";
					$opcion = "<img width='40px' height='40px' src='".base_url()."src/icons/check-icon.png' class='img-fluid' alt='Responsive image'>";
				}
			}
		}
	  echo "<tr><td>$row->cod_grupo</td><td>$row->semestre_id</td><td>$row->jornada</td><td>$row->programa_id</td><td><form action='".$url."index.php/asesor/calificar' method='post'>$opcion
	  <input type='text' name='id_grupo' value='$row->cod_grupo' hidden>
	  <input type='text' name='entrega' value='$entrega' hidden>
	  <input type='text' name='actual' value='$actual' hidden>
	  </td><td><button type='submit' class='btn btn-primary'>$boton</button></form></td></tr>";
	}
 }
            ?>
</table><br><br>
<br>
<br>
<br>
<br>
<br>
</div>
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