<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Grupo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper(array('url','form','date'));
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('Group_options');
        $this->load->model('Asesor_opciones');
	}
   
    public function index(){
        $data['integrantes'] = $this->Asesor_opciones->cargarIntegrantes($_SESSION['id_grupo']);
        $data['asesorias'] = $this->Group_options->cantidadAsesorias($_SESSION['id_grupo']);
        $data['sustentacion'] = $this->Group_options->fechaSustentacion($_SESSION['id_grupo']);
        $data['entregas'] = $this->Group_options->fechaEntregas($_SESSION['id_grupo']);
        $this->load->view('inicio_grupo',$data);
        $this->load->view('templates/footer');
    }

    public function organizacion(){
        $this->load->view('noticias_grupo');
        $this->load->view('templates/footer');
    }

    public function asesorias(){
        $data['mensaje'] = "";
        $data['asesores'] = $this->Group_options->cargarAsesores();
        $data['programas'] = $this->Group_options->cargarProgramas();
        $data['semestres'] = $this->Group_options->cargarSemestres();
        $grupo = $_SESSION['id_grupo'];
        $data['informacion'] = $this->Group_options->cargarInformacion($grupo);
        $this->load->view('asesorias_grupo',$data);
        $this->load->view('templates/footer');
    }

    public function entregas(){
        $data['mensaje'] = "";
        $grupo = $_SESSION['id_grupo'];
        $data['estado'] = $this->Group_options->cargarEstado($grupo);
        $this->load->view('entregas_grupo',$data);
        $this->load->view('templates/footer');
    }

    public function contacto(){
        $data['mensaje'] = "";
        $this->load->view('contacto_grupo',$data);
        $this->load->view('templates/footer');
    }

    public function enviar_mensaje(){
        $id = $_SESSION['id_grupo'];
        $asunto = $this->input->post('asunto');
        $mensaje = $this->input->post('mensaje');
        $info = $this->Group_options->mensaje_contacto($id);
        $this->email->from("$info", "Contacto proyecto integrador");
        $this->email->to("danielcraft236@hotmail.com");
        $this->email->subject("$asunto");   
        $this->email->message("$mensaje\n\n--------------------------------------------------\nGrupo: $id\n$info");
        $this->email->send();
        $data['mensaje']="<div class='alert alert-success' role='alert'>
        ¡Mensaje enviado correctamente!
        </div>";
        $this->load->view('contacto_grupo',$data);
        $this->load->view('templates/footer');
    }

    public function enviar(){
        $grupo = $this->input->post('grupo');
        $asesor = $this->input->post('asesor');
        $entrega = $this->input->post('entrega');
        if($entrega == "primera"){
        $ruta = "primer_entrega";
        }else{
        $ruta = "segunda_entrega";
        }
        $config['file_name'] = $ruta."-".$grupo.".pdf";
        $config['upload_path'] = 'src/'.$ruta.'/';
        $config['allowed_types'] = 'pdf';
        $fecha = date('Y-m-d');
        $this->load->library('upload',$config);
        
        if ( ! $this->upload->do_upload('archivo'))
                {
                        $mensaje = array('error' => $this->upload->display_errors());

                        $this->load->view('entregas_grupo', $mensaje);
                        $this->load->view('templates/footer');
                }else{
$resultado = $this->Group_options->enviarEntrega($grupo,$asesor,$entrega,$this->upload->data(),$fecha);
if($resultado == 0){
    $data['mensaje']="<div class='alert alert-danger' role='alert'>
    ¡El plazo para realizar la entrega ya venció!
    </div>";
}else if($resultado == 1){
    $data['mensaje']="<div class='alert alert-success' role='alert'>
    ¡Entrega realizada correctamente!
    </div>";
}else if($resultado == 2){
    $data['mensaje']="<div class='alert alert-success' role='alert'>
    ¡Entrega modificada correctamente!
    </div>";
}
$data['estado'] = $this->Group_options->cargarEstado($grupo);
$this->load->view('entregas_grupo',$data);
$this->load->view('templates/footer');
                }    
    }

    public function ver_entrega(){
        $grupo = $this->input->post('grupo');
        $entrega = $this->input->post('entrega');
        $this->Group_options->ver($grupo,$entrega);
    }

    public function enviarAsesoria(){
    $programa = $this->input->post('programa');
    $semestre = $this->input->post('semestre');
    $titulo = $this->input->post('titulo');
    $asesor_principal = $this->input->post('asesor_principal');
    $fecha = $this->input->post('fecha');
    $hora = $this->input->post('hora');
    $horaF = $this->input->post('horaF');
    $objetivos = $this->input->post('objetivos');
    $recomendaciones = $this->input->post('recomendaciones');
    $actividades = $this->input->post('actividades');
    $proxReunion = $this->input->post('proxReunion');
    $asesor = $this->input->post('asesor');
    $grupo = $_SESSION['id_grupo'];
    $estado = "Pendiente";
    $consecutivo = $this->input->post('asesoria');
    $resultado = $this->Group_options->asesoria($programa,$semestre,$titulo,$asesor_principal,
    $fecha,$hora,$horaF,$objetivos,$recomendaciones,$actividades,$proxReunion,$asesor,$grupo,$estado,$consecutivo);
    if($resultado = 1){
    $data['mensaje']="<div class='alert alert-success' role='alert'>
    ¡Asesoria enviada correctamente!
    </div>";
    }else{
    $data['mensaje']="<div class='alert alert-danger' role='alert'>
    ¡Error al enviar la asesoria, por favor verifique los datos o pongáse en contacto
    con el soporte!
    </div>";  
    }
    $data['asesores'] = $this->Group_options->cargarAsesores();
    $this->load->view('asesorias_grupo',$data);
    $this->load->view('templates/footer');
    }

    public function guardarAsesoria(){
        $programa = $this->input->post('programa');
        $semestre = $this->input->post('semestre');
        $titulo = $this->input->post('titulo');
        $asesor_principal = $this->input->post('asesor_principal');
        $fecha = $this->input->post('fecha');
        $hora = $this->input->post('hora');
        $horaF = $this->input->post('horaF');
        $objetivos = $this->input->post('objetivos');
        $recomendaciones = $this->input->post('recomendaciones');
        $actividades = $this->input->post('actividades');
        $proxReunion = $this->input->post('proxReunion');
        $asesor = $this->input->post('asesor');
        $grupo = $_SESSION['id_grupo'];
        $estado = "guardado";
        $consecutivo = $this->input->post('asesoria');
        $resultado = $this->Group_options->asesoria($programa,$semestre,$titulo,$asesor_principal,
        $fecha,$hora,$horaF,$objetivos,$recomendaciones,$actividades,$proxReunion,$asesor,$grupo,$estado,$consecutivo);
        if($resultado = 1){
        $data['mensaje']="<div class='alert alert-success' role='alert'>
        ¡Asesoria guardada correctamente!
        </div>";
        }else{
        $data['mensaje']="<div class='alert alert-danger' role='alert'>
        ¡Error al guardar la asesoria, por favor verifique los datos o pongáse en contacto
        con el soporte!
        </div>";  
        }
        $data['asesores'] = $this->Group_options->cargarAsesores();
        $this->load->view('asesorias_grupo',$data);
        $this->load->view('templates/footer');
    }

    public function asesoriaGuardada(){
        $consecutivo = $this->input->post('asesoria');
        $data['asesores'] = $this->Group_options->cargarAsesores();
        $data['programas'] = $this->Group_options->cargarProgramas();
        $data['semestres'] = $this->Group_options->cargarSemestres();
        $grupo = $_SESSION['id_grupo'];
        $data['informacion'] = $this->Group_options->cargarAsesoria($consecutivo);
        $data['asesorias'] = $this->Group_options->cargarInformacion($grupo);
        $data['consecAsesoria'] = $consecutivo;
        $data['mensaje'] = "";
        $this->load->view('asesorias_grupo_guardadas',$data);
        $this->load->view('templates/footer');
    }
    public function logout(){
        session_destroy();
        redirect(base_url());
    }
}