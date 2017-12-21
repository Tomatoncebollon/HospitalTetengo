<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class CI_Atencion extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->load->model('Model_Atencion');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://localhost/HospitalTetengo/Atencion
	 *	- or -
	 * 		http://localhost/HospitalTetengo/Atencion/index
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
	 * Esta acción es el landing de la vista Atención, tiene una verificación
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
		}elseif($_SESSION['perfil']=="Paciente"){
			$this->load->view('estructura/client-nav');
		}
		$this->load->view('Atencion/index');
	}

	/**
	 * Acción agendar()
	 * 
	 * Esta acción se encarga de agregar nuevas atenciones, la verificación de 
	 * perfiles está obviada por que solamente un perfil puede acceder a esta 
	 * acción que es Secretaria.
	 *
	 */
	public function agendar(){
		$_SESSION['dataAtencionPaciente'] = $this->Model_Atencion->obtenerDatosAgendarPaciente();
		$_SESSION['dataAtencionMedico'] = $this->Model_Atencion->obtenerDatosAgendarMedico();
		$this->load->view('estructura/secretary-nav');
		$this->load->view('Atencion/agendar');
	}

	public function agendarAtencion(){
		$data = $this->input->post();
		if(isset($data)){
			try {
				$this->Model_Atencion->insertar($data);
				$this->load->view('estructura/secretary-nav');
				$this->load->view('Atencion/agendar');
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-success\"><strong>OK!</strong>Ha agendado una atención Exitosamente.</div></div></div></div>";
			}catch(Exception $e){
				$this->load->view('estructura/secretary-nav');
				$this->load->view('Atencion/agendar');
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-danger\"><strong>Error!</strong> La atención a agendar ya existe.</div></div></div></div>";
			}
		}else{
			$this->load->view('estructura/secretary-nav');
			$this->load->view('Atencion/agendar');
			echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-danger\"><strong>Error!</strong>No se ha podido agendar la atención Exitosamente.</div></div></div></div>";
		}
	}
     
	/**
	 * Acción consultar()
	 * 
	 * Esta acción sirve para consultar una atención, tiene una verificación
	 * para elegir que navbar mostrar basado en el usuario que inició sesión,
	 * en este caso consultar() puede ser accedido desde los siguientes perfiles:
	 *  - Director.
	 *  - Secretaria.
	 *  - Paciente.
	 *
	 */
	public function consultar(){
		$_SESSION['dataAtencion'] = $this->Model_Atencion->obtenerTodos();
		if($_SESSION['perfil']=="Director"){
			$this->load->view('estructura/director-nav');
		}elseif($_SESSION['perfil']=="Secretaria"){
			$this->load->view('estructura/secretary-nav');
		}elseif($_SESSION['perfil']=="Paciente"){
			$this->load->view('estructura/client-nav');
		}
		$this->load->view('Atencion/consultar');
	}

	/**
	 * Acción gestionar()
	 * 
	 * Esta acción se encarga de gestionar atenciones existentes, 
	 * la verificación de perfiles está obviada por que solamente 
	 * un perfil puede acceder a esta acción que es Secretaria.
	 * 
	 * Aquí Secretaria puede confirmar o anular atenciones y marcar
	 * como realizada o perdida una atención.
	 */
	public function gestionar(){
		$_SESSION['dataAtencion'] = $this->Model_Atencion->obtenerTodos();
		$this->load->view('estructura/secretary-nav');
		$this->load->view('Atencion/gestionar');
	}
	
	public function gestionarAtencion(){
		$data = $this->input->post();
		if(isset($data)){
			try {
				$this->Model_Atencion->actualizarEstado($data);
				$_SESSION['dataAtencion'] = $this->Model_Atencion->obtenerTodos();
				$this->load->view('estructura/secretary-nav');
				$this->load->view('Atencion/gestionar');
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-success\"><strong>OK!</strong> Ha modificado una atención Exitosamente.</div></div></div></div>";
			}catch(Exception $e){
				$this->load->view('estructura/secretary-nav');
				$this->load->view('Atencion/gestionar');
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-danger\"><strong>Error!</strong> No se ha podido modificar la atención Exitosamente.</div></div></div></div>";
			}
		}else{
			$this->load->view('estructura/secretary-nav');
			$this->load->view('Atencion/gestionar');
			echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"alert alert-dismissable alert-danger\"><strong>Error!</strong> No se ha podido modificar la atención Exitosamente.</div></div></div></div>";
		}
	}
	/**
	 * Acción listar()
	 * 
	 * Esta acción listará todas las atenciones, tiene una verificación
	 * para elegir que navbar mostrar basado en el usuario que inició sesión,
	 * en este caso listar() puede ser accedido desde los siguientes perfiles:
	 *  - Director.
	 *  - Secretaria.
	 *  - Paciente.
	 *
	 */
	public function listar(){
		$_SESSION['dataAtencion'] = $this->Model_Atencion->obtenerTodos();
		if($_SESSION['perfil']=="Director"){
			$this->load->view('estructura/director-nav');
		}elseif($_SESSION['perfil']=="Secretaria"){
			$this->load->view('estructura/secretary-nav');
		}elseif($_SESSION['perfil']=="Paciente"){
			$this->load->view('estructura/client-nav');
		}
		$this->load->view('Atencion/listar');
	}
}