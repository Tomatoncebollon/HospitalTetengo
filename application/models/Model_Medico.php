<?php

class Model_Medico extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**function insertar($data){
         $arrayDatos = array (
            'rut' => $data['rut'],
            'nombre_comp' => $this->encriptar($data['nombre']),
            'fecha_contrata' => $data['fecha_con'],
            'especialidad' => $data['especialidad'],
            'valor_consul' => $data['valor_consul']
        );
        $this->db->insert('medicos', $arrayDatos);
    }*/
    function insertar_Medico($data){
		$arrayDatos = array (
            'rut' => $data['rut'],
            'nombre_comp' => $data['nombre'],
            'fecha_contrata' => $data['fecha_con'],
            'especialidad' => $data['especialidad'],
            'valor_consul' => $data['valor_consul']
            
        );
        try {
            $result = $this->db->insert('medicos', $arrayDatos);
        }catch(Exception $e){
            throw new Exception('error in query');
        }
    }

    function despedir($data){
		$this->db->where('rut', $data['rut']);
        $this->db->delete('medicos');
    }

    function get($data){
        $query->$this->db->get('medicos', $data);
        return $query->result();
    }

    public function obtenerTodos(){
        $query = $this->db->query("SELECT * FROM MEDICOS;");
        return $query->result();
    }
}