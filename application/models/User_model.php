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
class User_model extends CI_Model {
    //put your code here
    
    public function getUsers($param = "", $value = ""){
        
        $sql = "SELECT * FROM user WHERE $param = '$value'";
        $query = $query = $this->db->query($sql);
        
        $result = $query->result();
        
        return $result;
        
    }
    
    public function logIn($usuario,$password){
        
        $user_info = array();
        
        $sql = "SELECT * FROM usuario WHERE usuario = ? AND password = MD5(?)";
        
        $query = $this->db->query($sql,array($usuario,$password));
        
        $result = $query->result();
        
        if($result !== FALSE){
            $user_info = $result[0];
            return $user_info;
        }else{
            return false;
        }
    }
    
    public function isLoggedIn(){
        
        $userdata = $this->session->userdata();
        
        if(isset($userdata['logged_in'])){
            return true;
        }else{
            return false;
        }
        
    }
    
    
}
