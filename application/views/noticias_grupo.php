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
    <link rel="stylesheet" href="<?= base_url(); ?>css/estilos.css">
    <link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Noticias</title>
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <img width='60px' height='65px' src="<?= base_url(); ?>src/uniajc_logo.png" class="img-fluid" alt="Responsive image">
           <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
               <div class="navbar-nav">
                   <a class="nav-item nav-link nav-hover" href="<?php echo base_url();?>index.php/grupo">Inicio</a>
                   <a class="nav-item nav-link nav-hover active" href="<?php echo base_url();?>index.php/grupo/organizacion">Organización<span class="sr-only">(current)</span></a>
                   <a class="nav-item nav-link nav-hover" href="<?php echo base_url();?>index.php/grupo/asesorias">Asesorias</a>
                   <a class="nav-item nav-link nav-hover" href="<?php echo base_url();?>index.php/grupo/entregas">Entregas</a>
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
       <div class="informacion">
       <br>
       <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
     <a href="http://www.uniajc.edu.co/bienestar-uniajc/servicios-deportivos-y-recreativos/">
      <img class="d-block w-100" src="<?= base_url(); ?>src/noticias/noticia1.JPG" alt="First slide">
      </a>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url(); ?>src/noticias/noticia2.JPG" alt="Second slide">
    </div>
    <div class="carousel-item">
     <a href="http://www.uniajc.edu.co/dia-de-los-ninos-y-ninas-uniajc/">
      <img class="d-block w-100" src="<?= base_url(); ?>src/noticias/noticia3.JPG" alt="Third slide">
      </a>
    </div>
    <div class="carousel-item">
     <a href="http://www.uniajc.edu.co/carrera-allianz-10k-de-la-luz/">
      <img class="d-block w-100" src="<?= base_url(); ?>src/noticias/noticia4.JPG" alt="Fourth slide">
      </a>
    </div>
    <div class="carousel-item">
     <a href="https://www.facebook.com/BienestarUNIAJC/photos/a.521766934677236/928114417375817/?type=3&theater">
      <img class="d-block w-100" src="<?= base_url(); ?>src/noticias/soyuniajc.JPG" alt="Fifth slide">
      </a>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><br>
     </div>  
       <div class="container">
       <div class="row">
       <div class="col-md-4">
        <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?= base_url(); ?>src/noticias/radio-uniajc.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Radio UNIAJC entre los ganadores del concurso ¿Qué es la Radio?</h5>
    <p class="card-text">Radio UNIAJC fue uno de los dos ganadores del concurso “¿qué es la radio?” realizado por la Red de Radio Universitaria de Colombia, RRUC, la cual integra más de 70 emisoras universitarias de todo el país; en esta ocasión radio Unimagdalena obtuvo...</p>
    <a href="http://www.uniajc.edu.co/radio-uniajc-entre-los-ganadores-del-concurso-que-es-la-radio/" class="btn btn-primary">Saber más</a>
  </div>
</div><br>
   </div>
   <div class="col-md-8">
   <div class="card" style="width: 35rem;">
  <img class="card-img-top" src="<?= base_url(); ?>src/noticias/vacacional-ingles.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">¡Los invitamos a inscribirse y a efectuar el pago oportunamente!</h5>
    <p class="card-text">El Centro de Idiomas UNIAJC, informa a toda la comunidad universitaria, que a partir del 13 de
noviembre de 2018, se abren las inscripciones para los cursos de inglés del periodo vacacional
enero 2019-1.</p>
    <a href="http://www.uniajc.edu.co/calendario_even/vacacional-ingles-2019-1/" class="btn btn-primary">Saber más</a>
  </div>
</div>

    </div><br>
  </div><br>
 </div>                   
        </div><br>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>