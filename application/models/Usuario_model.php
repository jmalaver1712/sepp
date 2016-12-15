<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario_model
 *
 * @author cvelasquez
 */
class Usuario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function SelectAllUsuario() {
        return $this->db->get("usuario");
    }

    public function SelectUsuarioById($id) {
        $this->db->select();
        $this->db->from("usuario");
        $this->db->where("id", $id);
        $query = $this->db->get();
        return $query;
    }
    
    public function insertUsuario($insert) {
        $this->db->insert("usuario",$insert);
        return $this->db->affected_rows();
    }

}
