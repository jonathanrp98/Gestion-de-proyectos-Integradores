<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo base_url(); ?>src/favico.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilos.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilosTablas.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<title>Login</title>
</head>

<body >
	<br>
	<div class="container" style="text-align:center">
		<div class="row">
			<div class="col-3">
			</div>
			<div class="col-6">
				<div id="cardLogin">
					<div class="card" class="login"><br>
						<?php echo $mensaje; ?>
						<img src="<?php echo base_url(); ?>src/icons/login.svg" class="card-img-top" width="120"
							height="100" alt="...">
						<div class="card-body">
							<h2 class="card-title" >Login</h2>
							<form class="px-4 py-3" method="post"
								action="<?php echo base_url(); ?>index.php/login/iniciar_sesion">
								<select name="rol" class="btn btn-primary" required>
									<option value="">Tipo de rol</option>
									<option value="1">Grupo</option>
									<option value="2">Asesor</option>
									<option value="3">Jurado</option>
									<option value="4">Administrador</option>
								</select>
								<div class="form-group"><br>
									<input type="text" class="form-control" id="exampleDropdownFormEmail1" name="user"
										placeholder="Usuario" required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="exampleDropdownFormPassword1"
										name="pass" placeholder="Clave" required>
								</div>
								<button type="submit" class="btn btn-primary"
									style='background:"<?= base_url();?>src/icons/entrar.svg"'>Inicia sesión <i
										class="fas fa-sign-in-alt"></i></button><br>
								<hr>
								<div id="formFooter">
                                    <a class="underlineHover" href="<?php echo base_url(); ?>index.php/login/clave_olvidada">Olvidé mi contraseña</a><br>
                                    
                                    <hr>
									<a class="underlineHover"href="<?php echo base_url(); ?>index.php/login/unir_grupo">Unirse a un grupo</a><hr>
									<div>
										<div class="row">
											<div class="col-6">
												<a class="underlineHover"
													href="<?php echo base_url(); ?>index.php/login/estudiantes">Registrar
													Estudiante</a>
												
											</div>
											<div class="col-6">
												<a class="underlineHover"
													href="<?php echo base_url(); ?>index.php/login/grupo">Registrar
													Grupo</a>
												
											</div>
										</div>

									</div>

								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div><br>

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
