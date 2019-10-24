<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proyectos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
        $this->load->model('Sugerir');
	}
   
    public function index(){
        $this->load->view('proyectos_u');
    }
    
    public function sugerir_proyecto(){
        $id= $this->input->post('identificacion');
        $nombre= $this->input->post('nombresS');
        $nombreP= $this->input->post('proyectoS');
        $desc= $this->input->post('descripcionS');
        $resultado = $this->Sugerir->sugerir($id,$nombre,$nombreP,$desc);
        if($resultado == 1)
    {
        ?>
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;You have successfully posted</a>
         </div>
         <?php
    }
    }
}
