<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('email');
		$this->load->helper(array('url','form','date'));
		$this->load->library('form_validation');
		$this->load->model('Admin_options');
		$this->load->model('Group_options');
		$this->load->library('grocery_CRUD');
    }
    public function _example_output($output = null)
	{
		$this->load->view('carp_admin/admin',(array)$output);
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
		$this->crud_estudiante();
		}
		
	public function enviar_correos(){
			$data['mensaje'] = "";
			$data['grupos'] = $this->Admin_options->cargarGrupos();
			$this->load->view('carp_admin/enviar_correos',$data);
			$this->load->view('templates/footer');
	}
		
		
		//crud de proyectos
    public function crud_proyecto(){
    	try{
						
				$crud = new grocery_CRUD();
				$crud->set_table('proyecto');
				$crud->set_subject('Proyectos');
				$crud->required_fields('id_proyecto');
				$crud->display_as('id_proyecto','N° de proyecto');
				$output = $crud->render();
				$this->_example_output($output);
			
			}catch(Exception $e){
						show_error($e->getMessage().' --- '.$e->getTraceAsString());
			}
		}
		
		// crud de usuarioss
		public function crud_usuario()
		{
				$crud = new grocery_CRUD();
			
				$crud->set_table('usuario');
				$crud->set_subject('Usuarios');
				$crud->required_fields('id_usuario');
				$crud->field_type('password','password');
				$crud->field_type('comprobar_password','password');
				$crud->columns('id_usuario','primer_nombre','primer_apellido',
												'email','telefono','tipo_cod_tipo');
				$crud->set_relation('tipo_cod_tipo','tipo','titulo')
					    ->set_relation('programa_cod_programa','programa','nombre');
				$crud->display_as('programa_cod_programa','Programa')
							->display_as('id_usuario','N° de identificacion')
							->display_as('username','Nombre de usuario')
							->display_as('password','Contraseña')
							->display_as('sexo','Genero')
							->display_as('tipo_cod_tipo','Tipo de usuario');
								
				$crud->set_rules('password','comprobar_password','callback_checking_password');
				$crud->callback_before_insert(array($this,'encrypt_password'));
				$crud->callback_before_update(array($this,'encrypt_password'));

				$output = $crud->render();
				$this->_example_output($output);

		}

		function encrypt_password($post_array, $primary_key = null)
		{

			$post_array['password']=password_hash($post_array['password'], PASSWORD_DEFAULT);
			$post_array['comprobar_password']=$post_array['password'];
  	  	return $post_array;
		} 
	 

		public function checking_password()
		{

	  	if ($this->input->post('password')!= $this->input->post('comprobar_password')) {
			$this->form_validation->set_message('checking_password', 'Las contraseñas no coinciden');
			return FALSE;
	  	}
	  	else{
			return TRUE;
	  	}
		}
		
	

		//crud de estudiantes
		public function crud_estudiante()
		{

				$crud = new grocery_CRUD();
				
 
				$crud->set_table('estudiante');
				$crud->field_type ('sexo','dropdown',array('1'=>'Hombre','2'=>'Mujer','3'=>'Otros')) ;		
				$crud->set_relation('semestre_cod_semestre','semestre','nombre')
							->set_relation('sede_cod_sede','sede','nombre')
							->set_relation('cod_grupo_semestre','grupo_semestre','descripcion')
							->set_relation('jornada_cod_jornada','jornada','descripcion')
							->set_relation('periodo_cod_periodo','periodo','cod_periodo')
							->set_relation('programa_cod_programa','programa','nombre');
							
				$crud->set_subject('Estudiantes');
				$crud->required_fields('ID');
				$crud->field_type ('sexo' , 'dropdown' , array ('1'=>'Hombre','2'=>'Mujer','3'=>'Otros')) ;
				$crud->columns('ID','primer_nombre','primer_apellido','email','telefono',
											'semestre_cod_semestre','sede_cod_sede','programa_cod_programa'); 
				$crud->display_as('programa_cod_programa','Programa')
							->display_as('semestre_cod_semestre','Semestre')
							->display_as('sede_cod_sede','Sede')
							->display_as('sexo','Genero')
							->display_as('cod_grupo_semestre','Grupo')
							->display_as('jornada_cod_jornada','Jornada')
							->display_as('periodo_cod_periodo','Periodo academico')
							->display_as('ID','N° de identificacion');

				
				
				$output = $crud->render();
				$this->_example_output($output);

		}


	


		// crud de staff
		public function crud_staff()
		{
	
			$crud = new grocery_CRUD();
			$crud->set_table('staff_jurado');
			$crud->set_subject('Staff');
			$crud->required_fields('id_staff')
						->required_fields('usuario_id_jurado1');
			$crud->set_relation('usuario_id_jurado1','usuario','{primer_nombre} {primer_apellido}')
				->set_relation('usuario_id_jurado2','usuario','{primer_nombre} {primer_apellido}')
				->set_relation('usuario_id_jurado3','usuario','{primer_nombre} {primer_apellido}');
			$crud->field_type('estado','enum',array('Habilitado','Deshabilitado'));
			$crud->display_as('id_staff','N° de satff')
						->display_as('usuario_id_jurado1','Jurado #1')
						->display_as('usuario_id_jurado2','Jurado #2')
						->display_as('usuario_id_jurado3','Jurado #3');
			$output = $crud->render();
			$this->_example_output($output);

		}

		public function crud_calificaiones_sus()
		{
	
			$crud = new grocery_CRUD();
			$crud->set_table('calificacion_sus');
			$crud->set_relation('estudiante_cod_estudiante','estudiante','{ID} - {primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}');
			$crud->set_relation('id_jurado','usuario','{id_usuario} - {primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}');
			$crud->columns('estudiante_cod_estudiante','N_sustentacion','id_jurado','staff_id_staff');
			$crud->set_subject('Calificaciones de sustentaciones');
			$crud->required_fields('cod_cals');
			$output = $crud->render();
			$this->_example_output($output);



		}

		public function crud_calificacion_ent()
		{
	
			$crud = new grocery_CRUD();
			$crud->set_table('calificacion_entregas');
			$crud->columns('docente_id_asesor','estudiante_cod_estudiante','N_primerEntrega','N_finalEntrega');
			$crud->display_as('docente_id_asesor','Nombre del asesor')
			->display_as('estudiante_cod_estudiante','Estudiante')
			->display_as('N_primerEntrega','Nota de la primera entrega')
			->display_as('N_finalEntrega','Nota de la entrega final');
			$crud->set_subject('Calificaciones de entregas');
			$crud->required_fields('cod_cal');
			$output = $crud->render();
			$this->_example_output($output);

		}


		public function crud_asesorias()
		{
			
			$crud = new grocery_CRUD();
			$crud->set_table('asesoria');
			$crud->columns('grupo_cod_grupo','proyecto','fecha','usuario_id_asesor','programa_cod_programa','estado');
			$crud->field_type('estado','enum',array( "Aceptado", "Denegado", "Pendiente"));
			$crud->where('estado','Aceptado');
			$crud->or_where('estado','Denegado');
			$crud->or_where('estado','Pendiente');
			$crud->set_relation('usuario_id_asesor','usuario','{id_usuario} - {primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}');
			$crud->set_relation('usuario_asesor_principal','usuario','{id_usuario} - {primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}');
			$crud->display_as('grupo_cod_grupo','Codigo de grupo')
						->display_as('programa_cod_programa','Programa')
						->display_as('usuario_asesor_principa','Asesor Principal ')
						->display_as('usuario_id_asesor','Asesor')
						->display_as('horaInicio','Hora de inicio')
						->display_as('horaFin','Hora de finalización')
						->display_as('objetivoAsesoria','Objetivos')
						->display_as('actividadesPendietes','actividades pendietes')
						->display_as('fecha_proxima_reunion','fecha de la proxima reunion');
			$crud->unset_delete();
			$crud->unset_add();
			$crud->unset_edit();
			$output = $crud->render();
			$this->_example_output($output);
		}
	
		//crud formulario
		public function crud_formulario()
		{
			
			$crud = new grocery_CRUD();
			$crud->set_table('formulario');
			$crud->display_as('ID_Form','N° de formulario')
					->display_as('ArchivoFormulario','Subir formulario')
					->display_as('nombre_fomulario','Nombre del formulario');
			$crud->set_subject('Formularios');
			$crud->required_fields('ID_Form','nombre_fomulario','ArchivoFormulario','descripcion');
			$crud->set_field_upload('ArchivoFormulario','assets/uploads/files');
			$output = $crud->render();
			$this->_example_output($output);

		}
		public function crud_primera_entrega()
		{
		
			$id = $_SESSION['id_usuario'];
	
			$crud = new grocery_CRUD();
			
			// $crud->where('usuario_id_asesor',$id);   
	
					
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
		public function crud_entregafinal()
		{
		
			$id = $_SESSION['id_usuario'];
	
			$crud = new grocery_CRUD();
			
			// $crud->where('usuario_id_asesor',$id);   - Este where no puede ir
			//porque en la tabla entregas no está la id del admin, está solo la del asesor principal
			//entonces el admin no podría ver las entregas
			//voy a bañarme mientras :v
	
			$crud->unset_fields('id_entrega');
			$crud->set_table('entregafinal');
			$crud->set_subject('Entrega final');
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


	


		public function crud_grupo()
	{
		
		$crud = new grocery_CRUD();
		
		$crud->set_table('grupo');
		$crud->set_subject('Grupo');
		$crud->required_fields('cod_grupo');
		$crud->set_relation('proyecto_id_proyecto','proyecto','titulo');
		$crud->set_relation('periodo','periodo','cod_periodo');
		$crud->set_relation('semestre_id','semestre','nombre');
		$crud->set_relation('programa_id','programa','nombre');
		$crud->set_relation('usuario_id_asesor','usuario','{primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}',array('tipo_cod_tipo' =>'3'));
		$crud->field_type('jornada','enum',array('Mañana','Noche'));

		$crud->columns('cod_grupo','proyecto_id_proyecto','usuario_id_asesor','semestre_id','programa_id','jornada');
		$crud->field_type('password','password');
		$crud->field_type('comprobar_password','password');
		$crud->display_as('cod_grupo','Codigo de grupo')
					->display_as('usuario_id_asesor','Nombre del asesor')
					->display_as('cant','Cantidad de integrantes')
					->display_as('password','Contraseña')
					->display_as('semestre_id','Semestre')
					->display_as('programa_id','Programa')
					->display_as('password','Contraseña')
					->display_as('creador','N° de identificacion del estudiante')
					->display_as('proyecto_id_proyecto','Titulo del proyecto');


		$crud->set_rules('password','comprobar_password','callback_checking_password');
					$crud->callback_before_insert(array($this,'encrypt_password'));
					$crud->callback_before_update(array($this,'encrypt_password'));
				

					$output = $crud->render();
			
						$this->_example_output($output);
					
	}

	

	public function crud_Asignar()
	{
		

			$crud = new grocery_CRUD();
			
			$crud->set_table('grupo');
			$crud->set_subject('Asignar Grupo');
			$crud->field_type('cod_grupo','invisible');
			
			$crud->set_relation('usuario_id_asesor','usuario','{primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}'
													,array('tipo_cod_tipo' =>'3'))
					->set_relation('proyecto_id_proyecto','proyecto','titulo');
					$crud->set_relation('semestre_id','semestre','nombre');
					$crud->set_relation('programa_id','programa','nombre');
			$crud->set_relation_n_n('Estudiantes','integrantes_pi','estudiante','grupo_cod_grupo','estudiante_ID','{ID} - {primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}','cod_inscripcion');
			
			$crud->field_type('jornada','enum',array('Mañana','Noche'));
			$crud->field_type('password','password');
			$crud->field_type('comprobar_password','password');
			$crud->columns('cod_grupo','proyecto_id_proyecto','usuario_id_asesor','semestre_id','programa_id','jornada','Estudiantes');

		//	$crud->columns('cod_grupo','proyecto_id_proyecto','usuario_id_asesor','cant','Estudiantes');
			$crud->display_as('cod_grupo','Codigo de grupo')
					->display_as('usuario_id_asesor','Nombre del asesor')
					->display_as('cant','Cantidad de integrantes')
					->display_as('password','Contraseña')
					->display_as('semestre_id','Semestre')
					->display_as('programa_id','Programa')
					->display_as('creador','N° de identificacion del estudiante')
					->display_as('proyecto_id_proyecto','Titulo del proyecto');
			$crud->unset_add();
			$crud->unset_delete();
			$crud->unset_fields('password','comprobar_password','creador','comentarios');
			
	
			
			$output = $crud->render();
			$this->_example_output($output);
			
	}





//-----------------------------------------------------------------

		function sustentacion_grupos_staff()
		{
			$this->config->load('grocery_crud');
			$this->config->set_item('grocery_crud_dialog_forms',true);
			$this->config->set_item('grocery_crud_default_per_page',10);
	
			$output1 = $this->crud_sustentacion();
	
			$output2 = $this->crud_staff1();
	
			$output3 = $this->crud_grupo2();
	
			$js_files = $output1->js_files + $output2->js_files + $output3->js_files;
			$css_files = $output1->css_files + $output2->css_files + $output3->css_files;
			$output = "<h2 align='center' >Cronograma de sustentación </h2>".$output1->output."<h2 align='center' >Lista de staff</h2>".$output2->output."<h2 align='center' >Lista de grupos </h2>".$output3->output;
	
			$this->_example_output((object)array(
					'js_files' => $js_files,
					'css_files' => $css_files,
					'output'	=> $output	
			));
		}

		public function crud_sustentacion()

		{

				$crud = new grocery_CRUD();
	
				$crud->set_table('sustentacion');
				
				$crud->set_subject('Sustentacion');
				$crud->required_fields('id_sustentacion');
				$crud->set_relation('grupo_cod_grupo','grupo','cod_grupo')
							->set_relation('staff_id_staff','staff_jurado','id_staff',array('estado' =>'Habilitado'))
							->set_relation('form_id_form','formulario','nombre_formulario');
				$crud->display_as('id_sustentacion','N° de sustentacion')
							->display_as('fecha_hora','Fecha y hora')
							->display_as('staff_id_staff','Codigo de staff')
							->display_as('form_id_form','Nombre del formulario');
							$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/sustentacion_grupos_staff")));

							$output = $crud->render();
					
							if($crud->getState() != 'list') {
								$this->_example_output($output);
							} else {
								return $output;
							}
		}
		
		

		public function crud_staff1()
		{

			$crud = new grocery_CRUD();
			$crud->set_table('staff_jurado');
			$crud->set_subject('Staff');
			$crud->required_fields('id_staff')
						->required_fields('usuario_id_jurado1');
			$crud->set_relation('usuario_id_jurado1','usuario','{primer_nombre} {primer_apellido}')
				->set_relation('usuario_id_jurado2','usuario','{primer_nombre} {primer_apellido}')
				->set_relation('usuario_id_jurado3','usuario','{primer_nombre} {primer_apellido}');
			$crud->field_type('estado','enum',array('Habilitado','Deshabilitado'));
			$crud->display_as('id_staff','N° de satff')
						->display_as('usuario_id_jurado1','Jurado #1')
						->display_as('usuario_id_jurado2','Jurado #2')
						->display_as('usuario_id_jurado3','Jurado #3');

			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/sustentacion_grupos_staff")));

						$output = $crud->render();
				
						if($crud->getState() != 'list') {
							$this->_example_output($output);
						} else {
							return $output;
						}
		}

		public function crud_grupo2()
	{
		$crud = new grocery_CRUD();
			
		$crud->set_table('grupo');
		$crud->set_subject('Asignar Grupo');
		$crud->field_type('cod_grupo','invisible');
		
		$crud->set_relation('usuario_id_asesor','usuario','{primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}'
												,array('tipo_cod_tipo' =>'3'))
				->set_relation('proyecto_id_proyecto','proyecto','titulo');
				$crud->set_relation('semestre_id','semestre','nombre');
				$crud->set_relation('programa_id','programa','nombre');
		$crud->set_relation_n_n('Estudiantes','integrantes_pi','estudiante','grupo_cod_grupo','estudiante_ID','{ID} - {primer_nombre} {segundo_nombre} {primer_apellido} {segundo_apellido}','cod_inscripcion');
		
		$crud->field_type('jornada','enum',array('Mañana','Noche'));
		$crud->field_type('password','password');
		$crud->field_type('comprobar_password','password');
		$crud->columns('cod_grupo','proyecto_id_proyecto','usuario_id_asesor','semestre_id','programa_id','jornada','Estudiantes');

		$crud->display_as('cod_grupo','Codigo de grupo')
				->display_as('usuario_id_asesor','Nombre del asesor')
				->display_as('cant','Cantidad de integrantes')
				->display_as('password','Contraseña')
				->display_as('semestre_id','Semestre')
				->display_as('programa_id','Programa')
				->display_as('creador','N° de identificacion del estudiante')
				->display_as('proyecto_id_proyecto','Titulo del proyecto');
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_fields('password','comprobar_password','creador','comentarios');
		

				$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/sustentacion_grupos_staff")));

					$output = $crud->render();
			
					if($crud->getState() != 'list') {
						$this->_example_output($output);
					} else {
						return $output;
					}
	}



	public function crud_porcentaje_calificacion()
	{
		$crud = new grocery_CRUD();
			
		$crud->set_table('porcentaje_calificacion');
		$crud->set_subject('Porcentajes de calificación');
		$crud->required_fields('cod_porcentaje');
		$crud->display_as('cod_porcentaje','Codigo porcentaje')
		->display_as('primer_entrega','Porcentaje de primera entrega')
		->display_as('entrega_final','Porcentaje de entrega final')
		->display_as('sustentacion','Porcentaje de sustentación');
		$crud->set_relation('cod_semestre','semestre','cod_semestre');
		//agregar
		$crud->callback_add_field('primer_entrega',function () {
			return '<input type="number"  maxlength="50" value="" name="primer_entrega"> %';
		});
		$crud->callback_add_field('entrega_final',function () {
			return '<input type="number"  maxlength="50" value="" name="entrega_final"> %';
		});
		$crud->callback_add_field('sustentacion',function () {
			return '<input type="number"  maxlength="50" value="" name="sustentacion"> %';
		});
		//editar
		$crud->callback_edit_field('primer_entrega',function ($value, $primary_key) {
			return '<input type="number"  maxlength="50" value="'.$value.'" name="primer_entrega"> %';
		});
		$crud->callback_edit_field('entrega_final',function ($value, $primary_key) {
			return '<input type="number"  maxlength="50" value="'.$value.'" name="entrega_final"> %';
		});
		$crud->callback_edit_field('sustentacion',function ($value, $primary_key) {
			return '<input type="number"  maxlength="50" value="'.$value.'" name="sustentacion"> %';
		});

		//leer
		$crud->callback_read_field('primer_entrega',function ($value, $primary_key) {
			return $value.'%';
		});
		$crud->callback_read_field('entrega_final',function ($value, $primary_key) {
			return $value.'%';
		});
		$crud->callback_read_field('sustentacion',function ($value, $primary_key) {
			return $value.'%';
		});


		

		
		$crud->set_rules('primer_entrega','Porcentajes','callback_porcentajes');

		
/* 		<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
 */
		$output = $crud->render();
		$this->_example_output($output);
					
	}

	function porcentajes()
	{
		$porcentajes=$this->input->post('primer_entrega')+$this->input->post('entrega_final')+$this->input->post('sustentacion');
 
		if ($porcentajes != 100) {
		$this->form_validation->set_message('porcentajes', 'La suma de los porcentajes tiene que ser del  100%');
		return FALSE;
		}
		else{
		return TRUE;
		}
	}


	function info_envio_correos(){
		$data['grupos'] = $this->Admin_options->cargarGrupos();
		$check = $this->input->post('check');
		if(empty($check)){
			$data['mensaje']="<div class='alert alert-danger' role='alert'>
				¡No ha seleccionado destinatario!
				</div>";
			$this->load->view('carp_admin/enviar_correos',$data);
			$this->load->view('templates/footer');
		}else{
			$mensaje = $this->input->post('mensaje');
			$asunto = $this->input->post('asunto');
			$resultado = $this->Admin_options->correos($check);
			$this->email->from('proyectointegrador@uniajc.edu.co', 'Proyecto Integrador');
				foreach($resultado as $f){
					$correos[] = $f->email;
				}
				$this->email->to($correos);
				$this->email->subject($asunto);
				$this->email->message("$mensaje");
				$this->email->send();
				$data['mensaje']="<div class='alert alert-success' role='alert'>
				¡Mensaje enviado correctamente!
				</div>";
				$this->load->view('carp_admin/enviar_correos',$data);
				$this->load->view('templates/footer');
		}
	}

	public function nota_proyecto()
	{
		$data['mensaje'] = "";
		$data['grupos'] = $this->Admin_options->cargarGrupos();
		$this->load->view('carp_admin/nota_proyecto',$data);
		$this->load->view('templates/footer');
	}

	public function ver_nota_proyecto()
	{
		$data['mensaje'] = "";
		$id_grupo = $this->input->post('id_grupo');
		$semestre = $this->input->post('semestre');
		$data['integrantes'] = $this->Group_options->cargarIntegrantes($id_grupo);
		$data['nota_final'] = $this->Group_options->nota_final($id_grupo,$semestre);
		$data['notas'] = $this->Group_options->notas($id_grupo);
		$this->load->view('carp_admin/notas',$data);
		$this->load->view('templates/footer');
	}
	
public function prueba(){
	$this->load->view('pruebas');
	$this->load->view('templates/footer');
}
	
}

