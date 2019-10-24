<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','date'));
        $this->load->library('form_validation');
        $config = Array(
            'mailtype'  => 'html', 
            'charset'   => 'utf-8'
        );
        $this->load->library('email',$config);
        $this->load->model('GroupCreate');
        $this->load->model('Group_options');
	}
   
    public function index(){
        $data['semestres'] = $this->GroupCreate->cargarSemestres();
        $data['programas'] = $this->GroupCreate->cargarProgramas();
        $this->load->view('inicio',$data);
    }
    
    public function crearGrupo(){
        $id= $this->input->post('identificacion');
        $proyecto= $this->input->post('proyecto');
        $clave= $this->input->post('clave');
        $semestre= $this->input->post('semestre');
        $jornada= $this->input->post('jornada');
        $programa= $this->input->post('programa');
        $comentarios= $this->input->post('comentarios');
        $periodo= $this->input->post('periodo');
        $resultado = $this->GroupCreate->crear($id,$proyecto,$clave,$comentarios,$semestre,$jornada,$programa,$periodo);
        if($resultado == 4){
        $data['mensaje']="<div class='alert alert-danger' role='alert'>
        ¡Usted ya se encuentra en un grupo!
        </div>";
    }else if($resultado == 3){
        $data['mensaje']="<div class='alert alert-danger' role='alert'>
        ¡Usted no se encuentra registrado en el sistema, verifique la id ingresada o realice su
        registro!
        </div>";
    }else{
        $correo = $this->GroupCreate->buscarCorreo($id);
        $this->email->from('proyectointegrador@uniajc.edu.co', 'Creación de grupo');
        $this->email->to($correo);
        $this->email->subject('¡Grupo creado correctamente!');
        $this->email->message("<div style='text-align:center;background:#f8f9fa;'>
        <img src='https://localhost/pi/src/emails/group_created.jpg' width='80%' height='80%'>
                <br><h2 style='color:#064085;font-weight: bold;'>Código del grupo: $resultado</h2><br><br></div>");
        $this->email->send();
        $data['mensaje']="<div class='alert alert-success' role='alert'>
        ¡Grupo creado correctamente, revisa tu correo!
        </div>";
    }
        $data['periodos'] = $this->Group_options->cargarPeriodos();
        $data['programas'] = $this->GroupCreate->cargarProgramas();
        $this->load->view('carp_login/crear_grupo',$data);
    }

    public function unirse(){
        $id= $this->input->post('identificacion');
        $grupo= $this->input->post('grupo');
        $clave= $this->input->post('clave');
        $resultado =  $this->GroupCreate->unirse_grupo($id,$grupo,$clave);
        if($resultado == 4)
    {
        $data['mensaje']="<div class='alert alert-success' role='alert'>
        ¡Te haz unido satisfactoriamente!
        </div>";
    }else if($resultado == 0){
        $data['mensaje']="<div class='alert alert-danger' role='alert'>
        ¡Usted ya se encuentra en un grupo!
        </div>";
    }else if($resultado == 3){
        $data['mensaje']="<div class='alert alert-danger' role='alert'>
        ¡Contraseña incorrecta!
        </div>";
    }else if($resultado == 1){
        $data['mensaje']="<div class='alert alert-danger' role='alert'>
        ¡El grupo ingresado no existe!
        </div>"; 
    }else if($resultado == 2){
        $data['mensaje']="<div class='alert alert-danger' role='alert'>
        ¡Usted no se encuentra registrado en el sistema, verifique la id ingresada o realice su
        registro!
        </div>";
    }else{
        $data['mensaje']="<div class='alert alert-danger' role='alert'>
        ¡El grupo está lleno!
        </div>"; 
    }
        $this->load->view('carp_login/unir_grupo',$data);
    }
}
