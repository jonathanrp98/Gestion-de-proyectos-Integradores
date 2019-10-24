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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<title>Notas proyecto</title>
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
	<div class="container "><br>
		<?= $mensaje; ?><br>
		<table class="table table-hover">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Estudiante</th>
      <th scope="col">Primer entrega</th>
      <th scope="col">Entrega final</th>
      <th scope="col">Sustentación</th>
      <th scope="col">Nota final</th>
	  <th><button type="button" class="btn btn-info" onClick="window.print()">Imprimir <i class='fas fa-print'></i></button></th>
    </tr>
  </thead>
<?php 
            foreach($integrantes as $row)
				{ 
                $primer_entrega = "0.0";
                $entrega_final = "0.0";
                $sustentacion = "0.0";
				$nota_final = "0.0";
				$color = "text-danger";
				$color2 = "text-danger";
				$color3 = "text-danger";
				$color4 = "text-danger";
							foreach($notas as $row2){
								if($row->id_estudiante == $row2->cod_estudiante){
                                    $primer_entrega = $row2->N_primerEntrega;
                                    $entrega_final = $row2->N_finalEntrega;
                                    $nota_final = $row2->nota_final;
                                    if(isset($row2->sustentacion)){
                                        $sustentacion = $row2->sustentacion;
                                    }else{
                                        $sustentacion = "0.0";
									}
									if($primer_entrega == ""){
										$primer_entrega = "0.0";
									}
									if($entrega_final == ""){
										$entrega_final = "0.0";
									}
									if($primer_entrega >= 3){
										$color = "text-success";
									}
									if($entrega_final >= 3){
										$color2 = "text-success";
									}
									if($sustentacion >= 3){
										$color3 = "text-success";
									}
									if($nota_final >= 3){
										$color4 = "text-success";
									}
                                }
							}
                            echo "<tr><td>$row->id_estudiante</td>
                            <td>$row->nombre</td>
                            <td class='$color'>$primer_entrega</td>
                            <td class='$color2'>$entrega_final</td>
                            <td class='$color3'>$sustentacion</td>
                            <td class='$color4'>$nota_final</td>
                            </tr>";
            }
            ?>
</table><br><br><br><br><br><br><br>
<br>
<br>
	</div>
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