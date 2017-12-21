<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class CI_Medico extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->load->model('Model_Medico');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://localhost/HospitalTetengo/Medico
	 *	- or -
	 * 		http://localhost/HospitalTetengo/Medico/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://localhost/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 /**
	 * Acción index()
	 * 
	 * Esta acción es el landing de la vista Medico, tiene una verificación
	 * para elegir que navbar mostrar basado en el usuario que inició sesión.
	 *
	 */
	public function index()
	{
		if($_SESSION['perfil']=="Administrador"){
			$this->load->view('estructura/admin-nav');
		}elseif($_SESSION['perfil']=="Director"){
			$this->load->view('estructura/director-nav');
		}elseif($_SESSION['perfil']=="Secretaria"){
			$this->load->view('estructura/secretary-nav');
		}
		$this->load->view('Medico/index');
	}

	/**
	 * Acción contratar()
	 * 
	 * Esta acción se encarga de contratar nuevos medicos, la verificación de 
	 * perfiles está obviada por que solamente un perfil puede acceder a esta 
	 * acción que es Administrador.
	 *
	 */
	public function contratar(){
		$this->load->view('estructura/admin-nav');
		$this->load->view('Medico/contratar');
	}

	public function contratar_Medico(){
		$data = $this->input->post();
		if(isset($data)){
			try {
				$this->Model_Medico->insertar($data);
				$this->load->view('estructura/admin-nav');
				$this->load->view('Medico/contratar');
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-success\"><strong>OK!</strong>Ha contratado a un médico Exitosamente.</div></div></div></div>";
			}catch(Exception $e){
				$this->load->view('estructura/admin-nav');
				$this->load->view('Medico/contratar');
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-danger\"><strong>Error!</strong> El médico a contratar ya existe.</div></div></div></div>";
			}
		}else{
			$this->load->view('estructura/admin-nav');
			$this->load->view('Medico/contratar');
			echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-danger\"><strong>Error!</strong>No se ha podido contratar al médico Exitosamente.</div></div></div></div>";
		}
	}
     
	/**
	 * Acción consultar()
	 * 
	 * Esta acción sirve para consultar un medico, la verificación de 
	 * perfiles está obviada por que solamente un perfil puede acceder a esta 
	 * acción que es Director.
	 *
	 */
	public function consultar(){
		$_SESSION['dataMedico'] = $this->Model_Medico->obtenerTodos();
		if($_SESSION['perfil']=="Administrador"){
			$this->load->view('estructura/admin-nav');
		}elseif($_SESSION['perfil']=="Director"){
			$this->load->view('estructura/director-nav');
		}elseif($_SESSION['perfil']=="Secretaria"){
			$this->load->view('estructura/secretary-nav');
		}
		$this->load->view('Medico/consultar');
	}

	/**
	 * Acción despedir()
	 * 
	 * Esta acción se encarga de despedir medicos existentes, 
	 * la verificación de perfiles está obviada por que solamente 
	 * un perfil puede acceder a esta acción que es Administrador.
	 * 
	 */
	public function despedir(){
		$_SESSION['dataMedico'] = $this->Model_Medico->obtenerTodos();
        $this->load->view('estructura/admin-nav');
		$this->load->view('Medico/despedir');
	}
	
	public function despedirMedico(){
        $data = $this->input->post();
		$_SESSION['dataMedico'] = $this->Model_Medico->obtenerTodos();
		if(isset($data)){
			$this->Model_Medico->despedir($data);
			$_SESSION['dataMedico'] = $this->Model_Medico->obtenerTodos();
			$this->load->view('estructura/admin-nav');
			$this->load->view('Medico/despedir');
			echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-success\"><strong>OK!</strong>Ha despedido un médico Exitosamente.</div></div></div></div>";
		}else{
			$this->load->view('estructura/admin-nav');
			$this->load->view('Medico/despedir');
			echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-danger\"><strong>Error!</strong>No se ha podido despedir al médico Exitosamente.</div></div></div></div>";
		}
	}
	/**
	 * Acción listar()
	 * 
	 * Esta acción listará todas los medicos, tiene una verificación
	 * para elegir que navbar mostrar basado en el usuario que inició sesión,
	 * en este caso listar() puede ser accedido desde los siguientes perfiles:
	 *  - Director.
     *  - Administrador.
     *  - Secretaria.
	 *
	 */
	public function listar(){
		$_SESSION['dataMedico'] = $this->Model_Medico->obtenerTodos();
		if($_SESSION['perfil']=="Administrador"){
			$this->load->view('estructura/admin-nav');
		}elseif($_SESSION['perfil']=="Director"){
			$this->load->view('estructura/director-nav');
		}elseif($_SESSION['perfil']=="Secretaria"){
			$this->load->view('estructura/secretary-nav');
		}
		$this->load->view('Medico/listar');
	}
}