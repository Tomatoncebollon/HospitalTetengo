<?php

class Model_Usuario extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertar($data){
        $arrayDatos = array (
            'user_Name' => $data['user_Name'],
            'contraseña' => $this->encriptar($data['contraseña']),
            'perfil' => $data['perfil']
        );
        try {
            $result = $this->db->insert('login', $arrayDatos);
        }catch(Exception $e){
            throw new Exception('error in query');
        }
    }

    function eliminar($data){
        $this->db->where('user_Name', $data['user_Name']);
        $this->db->delete('login');
    }

    function get($data){
        $query->$this->db->get('login', $data);
        return $query->result();
    }

    public function obtenerTodos(){
        $query = $this->db->query("SELECT * FROM LOGIN;");
        return $query->result();
    }

    private function encriptar($cadena){
    $key='Gaby';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(@mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted; //Devuelve el string encriptado
	}
}