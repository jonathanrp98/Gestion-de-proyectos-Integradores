<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo base_url(); ?>src/favico.ico">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/estilos.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/estilosTablas.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Unirse a un grupo</title>
</head>

<body>
    <br><br>
    <br>
    <br>
    <br>
   

    <div class="container" style="text-align:center">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div id="cardLogin">
                    <div class="card" class="login"><br>
                        <h2 style="color:#0000ff";><i class="fas fa-user-friends"></i></i> Unirse a un grupo</h2>
                        <hr><br>
                        <?= $mensaje; ?>
                        <form action="<?php echo base_url(); ?>index.php/inicio/unirse" method="post">
                        <div class="form-row">
                                <div class="col-2">
                                </div>
                                <div class="col-8">
                                    <div class="col-md-12 mb-3">
                                        <input type="text" name="identificacion" class="form-control" placeholder="N° de identificación del estudiante"
                                            required>
                                    </div>

                                    <div class="col-md-12 mb-3">

                                        <input type="text" name="grupo" class="form-control" placeholder="Código del grupo" required>
                                    </div>


                                    <div class="col-md-12 mb-3">

                                        <input type="password" name="clave" class="form-control" placeholder="Contraseña del grupo" required>
                                    </div>
                                    
                                    <hr>

                               
                            <button class="btn btn-primary" type="submit">Unirse  <i class="fas fa-users"></i></button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/login" >Cancelar <i class="fas fa-door-open"></i></a>
                        </div>

                    </div>
                           
                         </form><br>

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