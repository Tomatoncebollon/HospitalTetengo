<?php

class Model_Estadistica extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function EstadisticasPaciente(){
        $query = $this->db->query("SELECT * FROM PACIENTE;");
        return $query->result();
    }

    public function EstadisticasAtencion(){
        $query = $this->db->query("SELECT * FROM ATENCION;");
        return $query->result();
    }
}