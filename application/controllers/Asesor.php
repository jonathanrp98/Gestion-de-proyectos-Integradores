<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asesor extends CI_Controller {

    public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper(array('url','form','date'));
		$this->load->library('form_validation');
		$this->load->model('Asesor_opciones');
		$this->load->library('grocery_CRUD');
    }
    public function _example_output($output = null)
	{
		$this->load->view('carp_asesor/asesor',(array)$output);
		$this->load->view('templates/footer');
	}
    public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{ 
		// $this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		$this->crud_grupo();
    }

    public function crud_asesorias()
    {
        $id = $_SESSION['id_usuario'];
        $crud = new grocery_CRUD();
        
       
        $crud->set_table('asesoria');
        $crud->columns('grupo_cod_grupo','proyecto','fecha','programa_cod_programa','estado');
        $crud->field_type('estado','enum',array( "Aceptado", "Denegado", "Pendiente"));
        
        $crud->where('usuario_id_asesor',$id);   
        $crud->where('estado !=','guardado');
        
        
        $crud->set_relation('usuario_id_asesor','usuario',' {primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}');
        $crud->set_relation('usuario_asesor_principal','usuario',' {primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}');
       
        $crud->display_as('grupo_cod_grupo','Codigo de grupo')
                    ->display_as('programa_cod_programa','Programa')
                    ->display_as('usuario_asesor_principa','Asesor Principal ')
                    ->display_as('usuario_id_asesor','Asesor')
                    ->display_as('horaInicio','Hora de inicio')
                    ->display_as('horaFin','Hora de finalización')
                    ->display_as('objetivoAsesoria','Objetivos')
                    ->display_as('actividadesPendietes','actividades pendietes')
                    ->display_as('fecha_proxima_reunion','fecha de la proxima reunion');
  
        /* $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_edit(); */
        $output = $crud->render();
        $this->_example_output($output);
    }

    public function crud_grupo()
	{
        $id = $_SESSION['id_usuario'];
		$crud = new grocery_CRUD();
        
        $crud->where('usuario_id_asesor',$id);   
		$crud->set_table('grupo');
		$crud->set_subject('Grupo');
		$crud->field_type('cod_grupo','invisible');
		
		$crud->set_relation('usuario_id_asesor','usuario','{primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}'
												,array('tipo_cod_tipo' =>'3'))
				->set_relation('proyecto_id_proyecto','proyecto','titulo');
				$crud->set_relation('semestre_id','semestre','nombre');
				$crud->set_relation('programa_id','programa','nombre');
		$crud->set_relation_n_n('Integrantes','integrantes_pi','estudiante','grupo_cod_grupo','estudiante_ID','{ID} - {primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}','cod_inscripcion');
			$crud->field_type('jornada','enum',array('Mañana','Noche'));
		$crud->field_type('password','password');
		$crud->field_type('comprobar_password','password');
		$crud->columns('cod_grupo','proyecto_id_proyecto','usuario_id_asesor','cant','Integrantes');
		$crud->display_as('cod_grupo','Codigo de grupo')
				->display_as('usuario_id_asesor','Nombre del asesor')
				->display_as('cant','Cantidad de integrantes')
				->display_as('password','Contraseña')
				->display_as('semestre_id','Semestre')
				->display_as('programa_id','Programa')
					->display_as('proyecto_id_proyecto','Titulo del proyecto');
		$crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
		$crud->unset_fields('usuario_id_asesor','password','comprobar_password','creador','comentarios');
		

        $output = $crud->render();
		$this->_example_output($output);
				
	}
	
	public function crud_primera_entrega()
	{
		$id = $_SESSION['id_usuario'];

		$crud = new grocery_CRUD();
		
		$crud->where('usuario_id_asesor',$id);   

        
		$crud->unset_fields('id_entrega');
		$crud->set_table('primerentrega');
		$crud->set_subject('Primera Entrega');
		$crud->columns('usuario_id_asesor','grupo_cod_grupo','archivoDocumento','id_fecha_plazo','fecha_entrega');
		$crud->set_relation('usuario_id_asesor','usuario','{primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}');
		$crud->set_relation('id_fecha_plazo','fecha_entregas','fecha');	 							
		$crud->set_field_upload('archivoDocumento','../pi');
		$crud->display_as('archivoDocumento','Documento')
				->display_as('usuario_id_asesor','Nombre del asesor')
				->display_as('grupo_cod_grupo','Codigo del grupo')
				->display_as('id_fecha_plazo','Fecha de plazo')
				->display_as('fecha_entrega	','Fecha de entrega');
	

		$crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
		$output = $crud->render();
		$this->_example_output($output);
		/* 00001 */

	}

	public function crud_entregafinal()
	{
	
		$id = $_SESSION['id_usuario'];

		$crud = new grocery_CRUD();
		
		$crud->where('usuario_id_asesor',$id);   

        
		$crud->unset_fields('id_entrega');
		$crud->set_table('primerentrega');
		$crud->set_subject('Primera Entrega');
		$crud->columns('usuario_id_asesor','grupo_cod_grupo','archivoDocumento','id_fecha_plazo','fecha_entrega');
		$crud->set_relation('usuario_id_asesor','usuario','{primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}');
		$crud->set_relation('id_fecha_plazo','fecha_entregas','fecha');	 							
		$crud->set_field_upload('archivoDocumento','../pi');
		$crud->display_as('archivoDocumento','Documento')
				->display_as('usuario_id_asesor','Nombre del asesor')
				->display_as('grupo_cod_grupo','Codigo del grupo')
				->display_as('id_fecha_plazo','Fecha de plazo')
				->display_as('fecha_entrega	','Fecha de entrega');
	

		$crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function cal_estudiante()
	{
		if(!$this->input->post('entrega')){
			$entrega = "";
			$data['actual'] = "";
			$data['actual'] = "<h5>Primera entrega</h5>";
			$data['entrega'] = "primer_entrega";
		}else{
			$entrega = $this->input->post('entrega');
			if($entrega == "primer_entrega"){
				$data['actual'] = "<h5>Primera entrega</h5>";
			}else{ 
				$data['actual'] = "<h5>Segunda entrega</h5>";
			}
			$data['entrega'] = $entrega;
		}
		$id = $_SESSION['id_usuario'];
		$data['grupos'] = $this->Asesor_opciones->cargarGrupos($id,$entrega);
		$data['estado'] = $this->Asesor_opciones->cargarEstadoGrupo($id,$entrega);
		$data['mensaje'] = "";
		$this->load->view('carp_asesor/calificaciones',$data);
		$this->load->view('templates/footer');
	}

	public function calificar(){
		$id_grupo = $this->input->post('id_grupo');
		$data['entrega'] = $this->input->post('entrega');
		$data['actual'] = $this->input->post('actual');
		$data['estado'] = $this->Asesor_opciones->cargarEstado($id_grupo,$data['entrega']);
		$data['integrantes'] = $this->Asesor_opciones->cargarIntegrantes($id_grupo);
		$data['mensaje'] = "";
		$this->load->view('carp_asesor/calificar',$data);
		$this->load->view('templates/footer');
	}

	public function enviar_calificacion(){
		$id_grupo = $this->input->post('id_grupo');
		$id_estudiante = $this->input->post('estudiante');
		$nota = $this->input->post('nota');
		$entrega = $this->input->post('entrega');
		$asesor = $_SESSION['id_usuario'];
		$resultado = $this->Asesor_opciones->subirNota($id_estudiante,$nota,$entrega,$asesor);
		$url = base_url();
		if($resultado == 1){
			$data['mensaje']="<div class='alert alert-success' role='alert'>
			¡Calificacion enviada correctamente!. <a href='".$url."index.php/asesor/cal_estudiante'>Volver.</a>
			</div>";
		}else{
			$data['mensaje']="<div class='alert alert-danger' role='alert'>
			¡Error, por favor intente nuevamente o póngase en contacto en el soporte!. <a href='".$url."index.php/asesor/cal_estudiante'>Volver.</a>
			</div>";
		}
		$data['entrega'] = $this->input->post('entrega');
		$data['estado'] = $this->Asesor_opciones->cargarEstado($id_grupo,$data['entrega']);
		$data['integrantes'] = $this->Asesor_opciones->cargarIntegrantes($id_grupo);
		$this->load->view('carp_asesor/calificar',$data);
		$this->load->view('templates/footer');
	}




}
