<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('form_validation');
        $config = Array(
            'mailtype'  => 'html', 
            'charset'   => 'utf-8'
        );
        $this->load->library('email',$config);
        $this->load->library('encryption');
        $this->load->model('Iniciar');
        $this->load->model('Group_options');
	}
   
    public function index(){
        $data['mensaje']="";
        $this->load->view('login',$data);
    }
    public function estudiantes(){
        $data['programas'] = $this->Group_options->cargarProgramas();
        $data['sedes'] = $this->Group_options->cargarSedes();
        $data['grupos'] = $this->Group_options->cargarGrupos();
        $data['jornadas'] = $this->Group_options->cargarJornadas();
        $data['periodos'] = $this->Group_options->cargarPeriodos();
        $data['mensaje']="";
        $this->load->view('carp_login/estudiantes',$data);
    }
    public function unir_grupo(){
        $data['mensaje']="";
        $this->load->view('carp_login/unir_grupo',$data);
    }
    public function grupo(){
        $data['mensaje'] = "";
        $data['programas'] = $this->Group_options->cargarProgramas();
        $data['periodos'] = $this->Group_options->cargarPeriodos();
        $this->load->view('carp_login/crear_grupo',$data);
    }
    
    public function clave_olvidada(){
        $data['mensaje']="";
        $this->load->view('carp_login/clave_olvidada',$data);
    }

    public function recuperar_clave(){
        $id= $this->input->post('user');
        $email= $this->input->post('email');
        $rol= $this->input->post('rol');
        $fecha = date('Y-m-d H:i:s');
        $resultado = $this->Iniciar->recuperar_pass($id,$email,$rol);
        if($resultado == 0){
            $data['mensaje']="<div class='alert alert-danger' role='alert'>
            ¡Datos erróneos!
            </div>";
        }else{
            $url = base_url();
            $token = $this->Iniciar->token_gen(20,$id,$fecha);
            $this->email->from('unuajcproyectos@gmail.com', 'Soporte');
            foreach($resultado as $f){
                $correos[] = $f->email;
            }
            $this->email->to($correos);
            $this->email->subject('Recuperación de contraseña');
            $this->email->message("<a href='".$url."index.php/login/nueva_clave/$token/$id/$rol'><img src='https://localhost/pi/src/emails/pass_recover.jpg' width='80%' height='80%'></a>");
            $this->email->send();
            $data['mensaje']="<div class='alert alert-success' role='alert'>
            ¡Datos recuperados satisfactoriamente, un mensaje fue enviado al correo de los integrantes!
            </div>";
        }
        $this->load->view('carp_login/clave_olvidada',$data);
    }

    public function nueva_clave($token=null,$id=null,$rol=null){
        if($token == null || $id == null || $rol == null){
            $data['mensaje']="<div class='alert alert-danger' role='alert'>
            ¡Link erróneo! <a href='$url/index.php/login'>Inicio</a>
            </div>";
            $this->load->view('carp_login/nueva_clave_error',$data);
        }else{
        $url = base_url();
        $resultado = $this->Iniciar->token_verify($token,$id);
        if($resultado != 2){
            if($resultado == 0){
                $data['mensaje']="<div class='alert alert-danger' role='alert'>
                ¡Link expirado! <a href='".$url."index.php/login'>Inicio</a>
                </div>";
            }else{
                $data['mensaje']="<div class='alert alert-danger' role='alert'>
                ¡Link erróneo! <a href='".$url."index.php/login'>Inicio</a>
                </div>";
            }
            $this->load->view('carp_login/nueva_clave_error',$data);
        }else{
            $data['mensaje']="";
            $data['id'] = $id;
            $data['rol'] = $rol;
            $this->load->view('carp_login/nueva_clave',$data);
        }
    }
    }

    public function cambiar_clave(){
        $id= $this->input->post('identificacion');
        $rol= $this->input->post('rol');
        $pass= $this->input->post('pass');
        $url = base_url();
        $confirm_pass= $this->input->post('confirm_pass');
        if($pass != $confirm_pass){
            $data['mensaje']="<div class='alert alert-danger' role='alert'>
            ¡Las contraseñas no coinciden!
            </div>";
            $data['id'] = $id;
            $data['rol'] = $rol;
            $this->load->view('login',$data);
        }else{
           
           $resultado = $this->Iniciar->change_pass($id,$rol,$pass);
           if($resultado == 1){
            $data['mensaje']="<div class='alert alert-success' role='alert'>
            ¡Contraseña cambiada correctamente!
            </div>";
            $data['id'] = $id;
            $data['rol'] = $rol;
            $this->load->view('login',$data);
           }
        }
    }

    public function registrarse(){
        $id= $this->input->post('identificacion');
        $nombre= $this->input->post('primer_nombre');
        $nombre2= $this->input->post('segundo_nombre');
        $apellido= $this->input->post('primer_apellido');
        $apellido2= $this->input->post('segundo_apellido');
        $genero= $this->input->post('genero');
        $email= $this->input->post('email');
        $telefono= $this->input->post('telefono');
        $semestre= $this->input->post('semestre');
        $sede= $this->input->post('sede');
        $programa= $this->input->post('programa');
        $grupo= $this->input->post('grupo');
        $jornada= $this->input->post('jornada');
        $periodo= $this->input->post('periodo');
        $resultado = $this->Iniciar->registrar($id,$nombre,$nombre2,$apellido,$apellido2,$genero,$email,$telefono,$semestre,$sede,$programa,$grupo,$jornada,$periodo);
        if($resultado == 0){
            $data['mensaje']="<div class='alert alert-danger' role='alert'>
            ¡Usted ya se encuentra registrado!
            </div>";
        }else{
            $data['mensaje']="<div class='alert alert-success' role='alert'>
            ¡Registro realizado correctamente!
            </div>"; 
        }
        $data['programas'] = $this->Group_options->cargarProgramas();
        $data['sedes'] = $this->Group_options->cargarSedes();
        $data['grupos'] = $this->Group_options->cargarGrupos();
        $data['jornadas'] = $this->Group_options->cargarJornadas();
        $data['periodos'] = $this->Group_options->cargarPeriodos();
        $this->load->view('carp_login/estudiantes',$data);
    }

    public function iniciar_sesion(){
        $user= $this->input->post('user');
        $pass= $this->input->post('pass');
        $rol= $this->input->post('rol');
        $resultado = $this->Iniciar->iniciar($user,$pass,$rol);
        if($resultado == 0){
            $data['mensaje']="<div class='alert alert-danger' role='alert'>
            ¡Usuario incorrecto, por favor verifique su usuario o póngase en contacto
            con el soporte!
            </div>";
            $this->load->view('login',$data);
        }else{
            $data['mensaje']="<div class='alert alert-danger' role='alert'>
            ¡Contraseña incorrecta!</div>";
            $this->load->view('login',$data);
        }
    }
}

 