<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class CI_Paciente extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->load->model('Model_Paciente');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://localhost/HospitalTetengo/Paciente
	 *	- or -
	 * 		http://localhost/HospitalTetengo/Paciente/index
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
	 * Esta acción es el landing de la vista Paciente, tiene una verificación
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
		$this->load->view('Paciente/index');
	}

	/**
	 * Acción agregar()
	 * 
	 * Esta acción se encarga de agregar nuevos pacientes, la verificación de 
	 * perfiles está obviada por que solamente un perfil puede acceder a esta 
	 * acción que es Administrador.
	 *
	 */
	public function agregar(){
		$this->load->view('estructura/admin-nav');
		$this->load->view('Paciente/agregar');
	}

	public function insertarPaciente(){
		$data = $this->input->post();
		if(isset($data)){
			try {
				$this->Model_Paciente->insertar($data);
				$this->load->view('estructura/admin-nav');
				$this->load->view('Paciente/agregar');
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-success\"><strong>OK!</strong>Ha ingresado un paciente Exitosamente.</div></div></div></div>";
			}catch(Exception $e){
				$this->load->view('estructura/admin-nav');
				$this->load->view('Paciente/agregar');
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-danger\"><strong>Error!</strong> El paciente a registar ya existe.</div></div></div></div>";
			}
		}else{
			$this->load->view('estructura/admin-nav');
			$this->load->view('Paciente/agregar');
			echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-danger\"><strong>Error!</strong>No se ha podido ingresar un paciente Exitosamente.</div></div></div></div>";
		}
	}
     
	/**
	 * Acción consultar()
	 * 
	 * Esta acción sirve para consultar un usuario, la verificación de 
	 * perfiles está obviada por que solamente un perfil puede acceder a esta 
	 * acción que es Director.
	 *
	 */
	public function consultar(){
		$_SESSION['dataPaciente'] = $this->Model_Paciente->obtenerTodos();
		if($_SESSION['perfil']=="Administrador"){
			$this->load->view('estructura/admin-nav');
		}elseif($_SESSION['perfil']=="Director"){
			$this->load->view('estructura/director-nav');
		}elseif($_SESSION['perfil']=="Secretaria"){
			$this->load->view('estructura/secretary-nav');
		}
		$this->load->view('Paciente/consultar');
	}

	/**
	 * Acción eliminar()
	 * 
	 * Esta acción se encarga de eliminar usuarios existentes, 
	 * la verificación de perfiles está obviada por que solamente 
	 * un perfil puede acceder a esta acción que es Administrador.
	 * 
	 */
	public function eliminar(){
		$_SESSION['dataPaciente'] = $this->Model_Paciente->obtenerTodos();
        $this->load->view('estructura/admin-nav');
		$this->load->view('Paciente/eliminar');
	}
	
	public function eliminarPaciente(){
        $data = $this->input->post();
		$_SESSION['dataPaciente'] = $this->Model_Paciente->obtenerTodos();
		if(isset($data)){
			$this->Model_Paciente->eliminar($data);
			$_SESSION['dataPaciente'] = $this->Model_Paciente->obtenerTodos();
			$this->load->view('estructura/admin-nav');
			$this->load->view('Paciente/eliminar');
			echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-success\"><strong>OK!</strong>Ha eliminado un usuario Exitosamente.</div></div></div></div>";
		}else{
			$this->load->view('estructura/admin-nav');
			$this->load->view('Paciente/eliminar');
			echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-danger\"><strong>Error!</strong>No se ha podido eliminar un usuario Exitosamente.</div></div></div></div>";
		}
	}
	/**
	 * Acción listar()
	 * 
	 * Esta acción listará todas las atenciones, tiene una verificación
	 * para elegir que navbar mostrar basado en el usuario que inició sesión,
	 * en este caso listar() puede ser accedido desde los siguientes perfiles:
	 *  - Director.
	 *
	 */
	public function listar(){
		$_SESSION['dataPaciente'] = $this->Model_Paciente->obtenerTodos();
		if($_SESSION['perfil']=="Administrador"){
			$this->load->view('estructura/admin-nav');
		}elseif($_SESSION['perfil']=="Director"){
			$this->load->view('estructura/director-nav');
		}elseif($_SESSION['perfil']=="Secretaria"){
			$this->load->view('estructura/secretary-nav');
		}
		$this->load->view('Paciente/listar');
	}
}