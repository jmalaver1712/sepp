<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

        public function __construct(){
            parent::__construct();
            $this->load->model('profesor_model');
            $this->load->helper('html_builder_helper');
        }
    
	public function index()
	{
            
            if($this->user_model->isLoggedIn() !== TRUE){
                $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
                redirect('user/login');
            }
            
            $lista_profesores = $this->profesor_model->getAll();
            //die(print_r($lista_profesores,true));
            $html = profesor_list_table($lista_profesores);
            
            $this->load->view('admin/profesor/list', array('html' => $html));
            
	}
        
        public function add()
	{
            
            if($this->user_model->isLoggedIn() !== TRUE){
                $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
                redirect('user/login');
            }
            
            $this->load->view('admin/profesor/add');
            
	}
        
}
