<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurado extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','form','date'));
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('Jurado_opciones');
    }

	public function index()
	{ 
		$data['mensaje'] = "";
		$data['grupos'] = $this->Jurado_opciones->cargarGrupos($_SESSION['id_usuario']);
		$this->load->view('carp_jurado/jurado',$data);
		$this->load->view('templates/footer');
	}

	public function calificar(){
		$id_sustentacion = $this->input->post('id_sustentacion'); 
		$id_grupo = $this->input->post('id_grupo');
		$jurado = $_SESSION['id_usuario'];
		$data['estado'] = $this->Jurado_opciones->cargarEstado($id_grupo,$jurado);
		$data['integrantes'] = $this->Jurado_opciones->cargarIntegrantes($id_grupo);
		$data['formulario'] = $this->Jurado_opciones->cargarFormulario($id_sustentacion);
		$data['mensaje'] = "";
		$data['sustentacion'] = $id_sustentacion;
		$data['grupo'] = $id_grupo;
		$this->load->view('carp_jurado/calificacion',$data);
		$this->load->view('templates/footer');
	}

	public function descargar_formulario(){
		$id_sustentacion = $this->input->post('sustentacion');
		$id_grupo = $this->input->post('id_grupo');
		$this->Jurado_opciones->form_download($id_sustentacion);
		$jurado = $_SESSION['id_usuario'];
		$data['estado'] = $this->Jurado_opciones->cargarEstado($id_grupo,$jurado);
		$data['integrantes'] = $this->Jurado_opciones->cargarIntegrantes($id_grupo);
		$data['formulario'] = $this->Jurado_opciones->cargarFormulario($id_sustentacion);
		$data['mensaje'] = "";
		$this->load->view('carp_jurado/calificacion',$data);
		$this->load->view('templates/footer');
	}

	public function enviar_calificacion(){
		$id_sustentacion = $this->input->post('sustentacion');
		    $id_grupo = $this->input->post('grupo');
        $config['upload_path'] = 'src/calificaciones/';
        $config['allowed_types'] = 'xlsx';
        $this->load->library('upload',$config);
        if ( ! $this->upload->do_upload('archivo'))
                {
                        $mensaje = array('error' => $this->upload->display_errors());
						$this->load->view('carp_jurado/calificacion', $mensaje);
						$this->load->view('templates/footer');
                }else{
$resultado = $this->Jurado_opciones->subir_calificacion($id_sustentacion,$this->upload->data());
if($resultado == 1){
	$url = base_url();
    $data['mensaje']="<div class='alert alert-success' role='alert'>
    ¡Calificacion realizada correctamente!. <a href='".$url."index.php/jurado'>Volver.</a>
    </div>";
}else{
	$data['mensaje']="<div class='alert alert-danger' role='alert'>
    ¡Error, por favor intente nuevamente o comuníquese con el soporte!
    </div>";
}
$data['sustentacion'] = $id_sustentacion;
$data['grupo'] = $id_grupo;
$jurado = $_SESSION['id_usuario'];
$data['estado'] = $this->Jurado_opciones->cargarEstado($id_grupo,$jurado);
$data['integrantes'] = $this->Jurado_opciones->cargarIntegrantes($id_grupo);
$data['formulario'] = $this->Jurado_opciones->cargarFormulario($id_sustentacion);
$this->load->view('carp_jurado/calificacion',$data);
$this->load->view('templates/footer');
                }  
	}

	public function enviar_nota(){
		$id_sustentacion = $this->input->post('sustentacion');
		$id_grupo = $this->input->post('id_grupo');
		$nota = $this->input->post('nota');
		$estudiante = $this->input->post('estudiante');
		$jurado = $_SESSION['id_usuario'];
		$resultado = $this->Jurado_opciones->subir_nota($id_grupo,$id_sustentacion,$nota,$estudiante,$jurado);
		$this->Jurado_opciones->promedio_sustentacion($estudiante,$nota);
		if($resultado == 1){
			$data['mensaje']="<div class='alert alert-success' role='alert'>
			¡Nota enviada correctamente!
			</div>";
		}else{
			$data['mensaje']="<div class='alert alert-danger' role='alert'>
			¡Error, por favor intente nuevamente o comuníquese con el soporte!
			</div>";
		}
		$data['estado'] = $this->Jurado_opciones->cargarEstado($id_grupo,$jurado);
		$data['integrantes'] = $this->Jurado_opciones->cargarIntegrantes($id_grupo);
		$data['formulario'] = $this->Jurado_opciones->cargarFormulario($id_sustentacion);
		$data['sustentacion'] = $id_sustentacion;
		$data['grupo'] = $id_grupo;
		$this->load->view('carp_jurado/calificacion',$data);
		$this->load->view('templates/footer');
	}

	public function contacto(){
        $data['mensaje'] = "";
		$this->load->view('carp_jurado/contacto',$data);
		$this->load->view('templates/footer');
    }

    public function enviar_mensaje(){
		$id = $_SESSION['id_usuario'];
		$nombre = $_SESSION['nombre_user'];
        $asunto = $this->input->post('asunto');
        $mensaje = $this->input->post('mensaje');
		$email = $this->Jurado_opciones->mensaje_contacto($id);
        $this->email->from("$email", "Contacto proyecto integrador");
        $this->email->to("danielcraft236@hotmail.com");
        $this->email->subject("$asunto");
        $this->email->message("$mensaje\n\n--------------------------------------------------\nJurado: $id\n$nombre - $email");
		$this->email->send();
		$data['mensaje']="<div class='alert alert-success' role='alert'>
        ¡Mensaje enviado correctamente!
        </div>";
		$this->load->view('carp_jurado/contacto',$data);
		$this->load->view('templates/footer');
    }



}