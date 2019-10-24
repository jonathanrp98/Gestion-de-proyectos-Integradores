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
	<link rel="stylesheet" href="<?= base_url();?>css/estilos.css">
	<link rel="stylesheet" href="<?= base_url();?>css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<title>Noticias</title>
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
		<a class="nav-item nav-link nav-hover" href="<?= base_url();?>index.php/grupo">Inicio</a>
		<a class="nav-item nav-link nav-hover" href="<?= base_url();?>index.php/grupo/organizacion">Organización</a>
		<a class="nav-item nav-link nav-hover active" href="<?= base_url();?>index.php/grupo/asesorias">Asesorias<span
				class="sr-only">(current)</span></a>
		<a class="nav-item nav-link nav-hover" href="<?= base_url();?>index.php/grupo/entregas">Entregas</a>
		<a class="nav-item nav-link nav-hover" href="<?= base_url();?>index.php/grupo/contacto">Contacto</a>
	</div>
</div>
<div class="logout">
			<form action="<?php echo base_url();?>index.php/grupo/logout">
				<button type="submit" class="btn btn-hover color-yellow" ><i class="fas fa-power-off"></i> cerrar sesión</button>
			</form>
		    </div>
</nav>
	<div class="container">
		<div class="informacion">
			<div class="container"><br>
				<ul class="nav">
					<li class="nav-item">
						<p>Asesorias guardadas:&nbsp;</p>
					</li>
                    <?php 
                    if(empty($informacion)){
                    echo " No tiene asesorias guardadas";
                    }else{
            $url = base_url();
            foreach($informacion as $row)
            { 
              echo '<form action="'.$url.'index.php/grupo/asesoriaGuardada" method="post"><input name="asesoria" type="text" value="'.$row->consecutivo.'" hidden><li class="nav-item"><button type="submit" class="btn btn-primary">'.'Asesoria #'.$row->consecutivo.'</button></li></form>&nbsp;';
            }
        }
            ?>
				</ul><br>
				<?= $mensaje; ?>
				<form action="" method="post"><br>
					<table class="table table-hover" border="1px">
						<tr class="table-secondary">
							<td colspan="3">CONTROL DE ASESORIAS</td>
						</tr>
						<tr>
							<td colspan="1">
								<p>PROGRAMA ACADÉMICO</p>
							</td>
							<td colspan="2"><input type="text" class="form-control" value="<?= $_SESSION['programa'] ?>"
									disabled>
								<input type="text" name="programa" class="form-control"
									value="<?= $_SESSION['programa_id'] ?>" hidden>
							</td>
						</tr>
						<tr>
							<td colspan="1">
								<p>SEMESTRE</p>
							</td>
							<td colspan="2"><input type="text" class="form-control" value="<?= $_SESSION['semestre'] ?>"
									disabled>
								<input type="text" name="semestre" class="form-control"
									value="<?= $_SESSION['semestre'] ?>" hidden>
							</td>
						</tr>
						<tr>
							<td colspan="1">
								<p>TITULO DEL PROYECTO INTEGRADOR</p>
							</td>
							<td colspan="2"><input type="text" class="form-control" value="<?= $_SESSION['proyecto'] ?>"
									disabled>
								<input type="text" name="titulo" class="form-control"
									value="<?= $_SESSION['proyecto'] ?>" hidden>
							</td>
						</tr>
						<tr>
							<td colspan="1">
								<p>ASESOR PRINCIPAL</p>
							</td>
							<td colspan="2"><input type="text" class="form-control" value="<?= $_SESSION['asesor'] ?>"
									disabled>
								<input type="text" name="asesor_principal" class="form-control"
									value="<?= $_SESSION['id_asesor'] ?>" hidden>
							</td>
						</tr>
						<tr>
							<td>FECHA: <input type="date" name="fecha" id="fecha" class="form-control" required></td>
							<td>HORA INICIO: <input type="text" id="hora" name="hora" class="form-control" placeholder="hh:mm" required>
							</td>
							<td>HORA FINALIZACIÓN: <input type="text" id="horaF" name="horaF" class="form-control"
									placeholder="hh:mm" required></td>
						</tr>
					</table>
					<table class="table table-hover" border="1px">
						<tr class="table-secondary">
							<td>
								<p>OBJETIVOS DE LA ASESORIA</p>
							</td>
						</tr>
						<tr>
							<td><textarea id="objetivos" name="objetivos" rows="4" cols="50" class="form-control" required></textarea>
							</td>
						</tr>
					</table>
					<table class="table table-hover" border="1px">
						<tr class="table-secondary">
							<td>
								<p>RECOMENDACIONES</p>
							</td>
						</tr>
						<tr>
							<td><textarea id="recomendaciones" name="recomendaciones" rows="4" cols="50" class="form-control"
									required></textarea></td>
						</tr>
					</table>
					<table class="table table-hover" border="1px">
						<tr class="table-secondary">
							<td>
								<p>ACTIVIDADES PENDIENTE PRÓXIMA REUNIÓN</p>
							</td>
						</tr>
						<tr>
							<td><textarea id="actividades" name="actividades" rows="4" cols="50" class="form-control"
									required></textarea></td>
						</tr>
					</table>
					<table class="table table-hover" border="1px">
						<tr class="table-secondary">
							<td>
								<p>FECHA PRÓXIMA REUNIÓN</p>
							</td>
						</tr>
						<tr>
							<td><input type="date" name="proxReunion" id="fecha" class="form-control"></td>
						</tr>
					</table>
					<table class="table table-hover" border="1px">
						<tr class="table-secondary">
							<td colspan="4">
								<p>ASESOR</p>
							</td>
						</tr>
						<tr>
							<td class="table-secondary">
								<p>Nombre Asesor</p>
							</td>
							<td colspan="3">
								<select class="form-control" id="asesor" name="asesor" required>
								<option value="">Seleccione el nombre del asesor</option>
									<?php 
            foreach($asesores as $row)
            { 
              echo '<option value="'.$row->id_usuario.'">'.$row->nombre.'</option>';
            }
            ?>
								</select>
							</td>
						</tr>
					</table>
					<div class="row">
						<div class="col"><button type="submit" class="btn btn-primary" onclick="unrequired();this.form.action='<?= base_url();?>index.php/grupo/guardarAsesoria';">Guardar</button></div>
						<div class="col"><button type="submit" class="btn btn-primary"
								onclick="this.form.action='<?= base_url();?>index.php/grupo/enviarAsesoria'">Enviar</button>
						</div>
						<div class="col"></div>
						<div class="col"></div>
						<div class="col"></div>
						<div class="col"></div>
					</div>
				</form><br><br><br><br>
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
	<script src="<?= base_url(); ?>js/requireds.js"></script>
</body>

</html>