<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CI_Estadistica extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Model_Estadistica');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://localhost/HospitalTetengo/Estadistica
	 *	- or -
	 * 		http://localhost/HospitalTetengo/Estadistica/index
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
		$_SESSION['dataEstadisticaPaciente'] = $this->Model_Estadistica->EstadisticasPaciente();
		$_SESSION['dataEstadisticaAtencion'] = $this->Model_Estadistica->EstadisticasAtencion();
		$this->load->view('estructura/director-nav');
		$this->load->view('Estadistica/index');
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
		$this->load-view('estructura/director-nav');
		$this->load->view('Estadistica/consultar');
	}
}