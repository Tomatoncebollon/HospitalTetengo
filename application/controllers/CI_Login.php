<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class CI_Login extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('Model_InicioSesion');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://localhost/HospitalTetengo/Login
	 *	- or -
	 * 		http://localhost/HospitalTetengo/Login/index
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
	 * Esta acción es el landing de la vista Login, tiene una verificación
	 * para elegir que navbar mostrar basado en el usuario que inició sesión.
	 *
	 */
	public function index()
	{
		$this->load->view('Login/index');
	}

    public function iniciarsesion(){
		$data = $this->input->post();
        if(isset($data)){
			$informacion = $this->Model_InicioSesion->encontrar($data['usuario'],$this->encriptar($data['password']));
			$_SESSION['perfil'] = $informacion[0]->PERFIL;
			if($_SESSION['perfil']=="Administrador"){
				$this->load->view('estructura/admin-nav');
			}elseif($_SESSION['perfil']=="Director"){
				$this->load->view('estructura/director-nav');
			}elseif($_SESSION['perfil']=="Secretaria"){
				$this->load->view('estructura/secretary-nav');
			}elseif($_SESSION['perfil']=="Paciente"){
				$this->load->view('estructura/client-nav');
			}
			$this->load->view('welcome_message');
        }else{
            $this->load->view('CI_Login/index');
        }
    }

	private function encriptar($cadena){
    $key='Gaby';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(@mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted; //Devuelve el string encriptado
	}
 
	private function desencriptar($cadena){
     $key='Gaby';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
     $decrypted = rtrim(@mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
	}
}