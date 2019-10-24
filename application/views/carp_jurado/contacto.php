<?php
if(@!$_SESSION['rol']){
	echo "<script type=\"text/javascript\">
           history.go(-1);
       </script>";
}else if($_SESSION['rol'] == '2' || $_SESSION['rol'] == '4'){
    $jurado_asesor = "";
    if($_SESSION['rol'] == '4'){
    $url = base_url();
    $jurado_asesor = "<form action='".$url."index.php/asesor/crud_grupo'><button class='btn btn-primary'>Ir a asesor</button></form>&nbsp;";
    }
    }else{
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
    <link rel="stylesheet" href="<?php echo base_url();?>css/estilos.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/estilosdash.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Contacto</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img width='60px' height='65px' src="<?= base_url(); ?>src/uniajc_logo.png" class="img-fluid" alt="Responsive image">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
                <a class="nav-item nav-link nav-hover" href="<?php echo base_url(); ?>index.php/jurado">Inicio</a>
				<a class="nav-item nav-link nav-hover active" href="<?php echo base_url(); ?>index.php/jurado/contacto">Contacto<span
							class="sr-only">(current)</span></a>
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
        <div class="informacion"><br>
           <header><img src="<?php echo base_url();?>src/contacto.jpg" class="img-fluid" alt="Responsive image"></header><br>
            <div class="container"><br>
                
                <div class="gestion">
                    <?= $mensaje; ?>
                    <form action="<?php echo base_url();?>index.php/jurado/enviar_mensaje" method="post">
                        <select name="asunto" id="" onchange="carg(this);" required>
                            <option value="">--Asunto---</option>
                            <option value="Reporte de Error">Reporte de Error</option>
                            <option value="Reclamo">Reclamo</option>
                            <option value="Sugerencia">Sugerencia</option>
                            <option value="Solicitud">Solicitud</option>
                            <option value="(Otro/s) ">Otro</option>
                        </select><br>
                        <input type="hidden" placeholder="" name="otroAsunto" id="otroAsunto" disabled><br>
                        <textarea name="mensaje" id="mensaje" class="form-control" aria-label="With textarea" rows="4" placeholder="Mensaje... Por favor seleccione un asunto" required disabled></textarea><br>
                        <button class="btn btn-primary">Enviar</button>
                    </form><br>
                    <p>Nota: Tus datos de contacto son enviados automáticamente por el sistema, así que no es necesario que los ingreses.</p><br>
                </div>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>js/alerts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="https://cdn.jsdelivr.net/es6-promise/latest/es6-promise.auto.min.js"></script>
    <script src="<?php echo base_url();?>js/tema.js"></script>
</body>

</html>
