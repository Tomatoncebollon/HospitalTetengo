<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class CI_Usuario extends CI_Controller {
	
    function __construct(){
        parent::__construct();
        $this->load->model('Model_Usuario');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://localhost/HospitalTetengo/Usuario
	 *	- or -
	 * 		http://localhost/HospitalTetengo/Usuario/index
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
	 * Esta acción es el landing de la vista Usuario, tiene una verificación
	 * para elegir que navbar mostrar basado en el usuario que inició sesión.
	 *
	 */
	public function index()
	{
		$this->load->view('estructura/admin-nav');
		$this->load->view('Usuario/index');
	}

	/**
	 * Acción agregar()
	 * 
	 * Esta acción se encarga de agregar nuevos usuarios, la verificación de 
	 * perfiles está obviada por que solamente un perfil puede acceder a esta 
	 * acción que es Administrador.
	 *
	 */
	public function agregar(){
		$this->load->view('estructura/admin-nav');
		$this->load->view('Usuario/agregar');
	}
	public function insertarUsuario(){
		$data = $this->input->post();
		if(isset($data)){
			try {
				$this->Model_Usuario->insertar($data);
				$this->load->view('estructura/admin-nav');
				$this->load->view('Usuario/agregar');
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-success\"><strong>OK!</strong>Ha ingresado un usuario Exitosamente.</div></div></div></div>";
			}catch(Exception $e){
				$this->load->view('estructura/admin-nav');
				$this->load->view('Usuario/agregar');
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-danger\"><strong>Error!</strong> El usuario a registar ya existe.</div></div></div></div>";
			}
		}else{
			$this->load->view('estructura/admin-nav');
			$this->load->view('Usuario/agregar');
			echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-danger\"><strong>Error!</strong>No se ha podido ingresar un usuario Exitosamente.</div></div></div></div>";
		}
	}
     
	/**
	 * Acción consultar()
	 * 
	 * Esta acción sirve para consultar un usuario, la verificación de 
	 * perfiles está obviada por que solamente un perfil puede acceder a esta 
	 * acción que es Administrador.
	 *
	 */
	public function consultar(){
		$_SESSION['dataUsuario'] = $this->Model_Usuario->obtenerTodos();
		$this->load->view('estructura/admin-nav');
		$this->load->view('Usuario/consultar');
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
		$_SESSION['dataUsuario'] = $this->Model_Usuario->obtenerTodos();
		$this->load->view('estructura/admin-nav');
		$this->load->view('Usuario/eliminar');
	}
	public function eliminarUsuario(){
        $data = $this->input->post();
		$_SESSION['dataUsuario'] = $this->Model_Usuario->obtenerTodos();
		if(isset($data)){
			$this->Model_Usuario->eliminar($data);
			$_SESSION['dataUsuario'] = $this->Model_Usuario->obtenerTodos();
			$this->load->view('estructura/admin-nav');
			$this->load->view('Usuario/eliminar');
			echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-success\"><strong>OK!</strong>Ha eliminado un usuario Exitosamente.</div></div></div></div>";
		}else{
			$this->load->view('estructura/admin-nav');
			$this->load->view('Usuario/eliminar');
			echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-danger\"><strong>Error!</strong>No se ha podido eliminar un usuario Exitosamente.</div></div></div></div>";
		}
	}
	
	/**
	 * Acción listar()
	 * 
	 * Esta acción listará todas los usuarios, tiene una verificación
	 * para elegir que navbar mostrar basado en el usuario que inició sesión,
	 * en este caso listar() puede ser accedido desde los siguientes perfiles:
	 *  - Administrador.
	 *
	 */
	public function listar(){
		$_SESSION['dataUsuario'] = $this->Model_Usuario->obtenerTodos();
		$this->load->view('estructura/admin-nav');
		$this->load->view('Usuario/listar');
	}
}