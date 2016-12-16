<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Model
 *
 * @author fabianortiz
 */
class Profesor_model extends CI_Model {
    //put your code here
    
    private $tabla;
    private $campos;
    
    public function __construct() { 
        
        $this->tabla = "usuario";
        $this->campos = $this->getFields();
        
    }
    
    
    public function getAll(){
        
        $sql = "SELECT usuario.*, facultades.nombre AS facultad,programas.nombre  AS programa,sedes.nombre AS sede,estados_usuario.nombre AS estado 
                FROM usuario
                JOIN facultades ON facultades.id = usuario.id_facultad
                JOIN programas ON programas.id = usuario.id_programa
                JOIN sedes ON sedes.id = usuario.id_sede
                JOIN estados_usuario ON estados_usuario.id = usuario.id_estado
                WHERE usuario.id_rol_usuario = ?
                ORDER BY usuario.id ASC";
        
        $query = $this->db->query($sql,array(ID_ROL_PROFESOR));
        $result = $query->result();
       
        return $result;
    }
    
    public function getFields(){
        
        $sql = "SHOW COLUMNS FROM ".$this->tabla.";";
        $query = $this->db->query($sql);
        return $query->result();
        
    }
    
}