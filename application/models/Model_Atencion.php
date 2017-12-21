<?php

class Model_Atencion extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertar($data){
        $arrayDatos = array (
            'fecha' => $data['fecha'],
            'rut_paciente' => $data['rut_paciente'],
            'rut_medico' => $data['rut_medico'],
            'estado' => $data['estado'],
            'hora' => $data['hora']
        );
        try {
            $result = $this->db->insert('atencion', $data);
        }catch(Exception $e){
            throw new Exception('error in query');
        }
    }

    function eliminar($data){
        $this->db->delete('atencion', $data);
    }

    function get($data){
        $query->$this->db->get('atencion', $data);
        return $query->result();
    }

    public function obtenerTodos(){
        $query = $this->db->query("SELECT * FROM ATENCION;");
        return $query->result();
    }

    public function actualizarEstado($data){
        $this->db->query("UPDATE atencion SET estado = ".$data['estado']." WHERE numero = ".$data['numero'].";");
        //$this->db->query->update('atencion', array('numero' => $data['numero']), array('estado' => $data['estado']));
    }

    public function obtenerDatosAgendarPaciente() {
        $query = $this->db->query("SELECT rut, nombre_comp FROM PACIENTE;");
        return $query->result();
    }

    public function obtenerDatosAgendarMedico() {
        $query = $this->db->query("SELECT rut, nombre_comp FROM MEDICOS;");
        return $query->result();
    }
}