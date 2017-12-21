<?php

class Model_Paciente extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function insertar($data){
        $arrayDatos = array (
            'rut' => $data['rut'],
            'nombre_comp' => $data['nombre'],
            'fecha_nacimiento' => $data['fecha_nac'],
            'sexo' => $data['sexo'],
            'direccion' => $this->encriptar($data['direccion']),
            'celular' => $data['celular'],
            'fijo' => $data['fijo']
        );
        try {
            $result = $this->db->insert('paciente', $arrayDatos);
        }catch(Exception $e){
            throw new Exception('error in query');
        }
    }

    function eliminar($data){
        $this->db->where('rut', $data['rut']);
        $this->db->delete('paciente');
    }

    function get($data){
        $query->$this->db->get('paciente', $data);
        return $query->result();
    }

    public function obtenerTodos(){
        $query = $this->db->query("SELECT * FROM PACIENTE;");
        return $query->result();
    }

    private function encriptar($cadena){
    $key='Gaby';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(@mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted; //Devuelve el string encriptado
	}
}