<?php

class Model_InicioSesion extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function encontrar($user,$pass){
        $query = $this->db->query("SELECT PERFIL FROM LOGIN WHERE User_Name='".$user."' AND contraseña='".$pass."';");
        return $query->result();
    }
}