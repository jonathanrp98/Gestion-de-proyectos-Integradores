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
    <title>Registro estudiantes</title>
</head>

<body>
    <br>

    <div class="container" style="text-align:center">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div id="cardLogin">
                    <div class="card" class="login"><br>
                        <h2 style="color:#0000ff";> <i class="fas fa-user-tie"></i> Registro de estudiantes </h2>
                        <hr><br>
                        <?= $mensaje; ?>
                        <form action="<?= base_url(); ?>/index.php/login/registrarse" method="post">
                            <div class="form-row">
                                <div class="col-2">

                                </div>
                                <div class="col-8">
                                    <div class="col-md-12 mb-3">
                                        <input type="text" name="identificacion" class="form-control" placeholder="N° de identificación"
                                            required>
                                    </div>

                                    <div class="col-md-12 mb-3">

                                        <input type="text" name="primer_nombre" class="form-control" placeholder="Primer nombre" required>
                                    </div>


                                    <div class="col-md-12 mb-3">

                                        <input type="text" name="segundo_nombre" class="form-control" placeholder="Segundo nombre" required>
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <input type="text" name="primer_apellido" class="form-control" placeholder="Primer apellido" required>
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <input type="text" name="segundo_apellido" class="form-control" placeholder="Segundo apellido" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <select name="genero" class="form-control">
                                            <option>Tipo de genero</option>
                                            <option>Masculino</option>
                                            <option>Femenino</option>
                                            <option>Indefinido</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <input type="text" name="email" class="form-control" placeholder="Correo electronico"
                                            required>
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <input type="text" name="telefono" class="form-control" placeholder="Telefono" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                    <select class="form-control" name="semestre" required>
                                        <option value="">Semestre</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                    <select class="form-control" name="sede" required>
                                    <option value="">Sede</option>
									<?php 

            foreach($sedes as $row)
            { 
              echo '<option value="'.$row->cod_sede.'">'.$row->nombre.'</option>';
            }
            ?>
								</select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                    <select class="form-control" name="programa" required>
                                    <option value="">Programa</option>
									<?php 

            foreach($programas as $row2)
            { 
              echo '<option value="'.$row2->cod_programa.'">'.$row2->nombre.'</option>';
            }
            ?>
								</select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                    <select class="form-control" name="grupo" required>
                                    <option value="">Grupo</option>
									<?php 

            foreach($grupos as $row3)
            { 
              echo '<option value="'.$row3->cod_semestre.'">'.$row3->descripcion.'</option>';
            }
            ?>
								</select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                    <select class="form-control" name="jornada" required>
                                    <option value="">Jornada</option>
									<?php 

            foreach($jornadas as $row4)
            { 
              echo '<option value="'.$row4->cod_jornada.'">'.$row4->descripcion.'</option>';
            }
            ?>
								</select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                    <select class="form-control" name="periodo" required>
                                    <option value="">Período</option>
									<?php 

            foreach($periodos as $row5)
            { 
              echo '<option value="'.$row5->cod_periodo.'">'.$row5->cod_periodo.'</option>';
            }
            ?>
								</select>
                                
                               </div>
                               
                               </div>

                            </div><hr>
                            <button class="btn btn-primary" type="submit">Enviar <i class="fas fa-paper-plane"></i></button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/login" >Cancelar <i class="fas fa-door-open"></i></a>
                           <hr>
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