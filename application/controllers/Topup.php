<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Topup extends CI_Controller {

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



	public function index()
	{
            
            if($this->user_model->isLoggedIn() !== TRUE){
                $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
                redirect('user/login');
            }
            
            redirect('topup/batch');
            
	}
        
        public function batch($data = array())
	{
            if($this->user_model->isLoggedIn() !== TRUE){
                $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
                redirect('user/login');
            }
            
            $this->load->view('private/batch_topup', $data);    
	}
        
        public function batch_confirm()
	{
            
            if($this->user_model->isLoggedIn() !== TRUE){
                $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
                redirect('user/login');
            }
            
            // Loading helpers
            $this->load->helper('html_builder_helper');
            $this->load->helper('topup_file_helper');
            
            try{
                
                $upload = upload_file();
                
                if(isset($upload['error'])){
                    throw new Exception($upload['error']);
                }
                
                $file_data = process_file($upload['filepath']);
                
                if(isset($file_data['error'])){
                    throw new Exception($upload['error']);
                }
                
                $html = topup_confirm_table($file_data['data']);
                
                // Load view
                $this->load->view('private/confirm_topup',array('html' => $html,'filepath' => $upload['filepath'], 'issuer_reseller' => $_POST['id_gestor']));
                
            } catch(Exception $e) {
                unlink($filename);
                $this->session->set_flashdata('error', $e->getMessage());
                redirect('topup/batch');
            }

        }
        
        public function batch_cancel($data = array())
	{
            
            if($this->user_model->isLoggedIn() !== TRUE){
                $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
                redirect('user/login');
            }
            
            unlink($_POST['filepath']);
            redirect('topup/batch');
            //$this->load->view('private/batch_topup', $data);
	}
        
        function batch_send() 
        {   
            if($this->user_model->isLoggedIn() !== TRUE){
                $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
                redirect('user/login');
            }
            
            
            try{
                
                // Loading helpers
                $this->load->helper('html_builder_helper');
                $this->load->helper('topup_file_helper');

                // Load Model
                $this->load->model('topup_model');

                $reseller_data = $this->user_model->getUsers('id',$_POST['issuer_reseller']);
                
                if(empty($reseller_data[0])){
                    throw new Exception("Problemas al encontrar datos de usuario.");
                }
                
                $this->session->set_flashdata('reseller_data', $reseller_data[0]);

                $topup_id = $this->topup_model->newTopUpTransaction();

                $arr_data = array();
                $processed_topups = array();
                
                $filepath = $_POST['filepath'];
                
                // Get data 
                $arr_data = process_file($filepath);
                
                if(isset($arr_data['error'])){
                    throw new Exception($upload['error']);
                }
                
                foreach($arr_data['data'] as $a){
                    
                    // Enviar recarga a registros validos
                    if(isset($a['msisdn']) && isset($a['amount'])){
                        
                        $a['topup_id'] = $topup_id;
                        $datetime = date('Y-m-d h:i:s');
                        $response = $this->topup_model->submitTopUp($a);
                        
                        if($response['success']){
                            
                            $topup_info = array(
                                'datetime' => $datetime,
                                'authorization_number' => $response['response_data']->rechargeResponse->authorizationNumber,
                                'reference_id' => $response['response_data']->rechargeResponse->transactionId,
                                'msisdn' => $response['response_data']->rechargeResponse->mobileNumber,
                                'amount' => $response['response_data']->rechargeResponse->realCredited->amount,
                                'new_balance' => $response['response_data']->rechargeResponse->realBalance->amount,    
                            );
                        }else{
                            $topup_info = array(
                                'datetime' => $datetime,
                                'msisdn' => $a['msisdn'],
                                'amount' => $a['amount'],
                                'error' => "No se pudo realizar la recarga.",
                            );
                        }
                    }
                    
                    array_push($processed_topups, $topup_info);
                    
                }
                
                $html = topup_summary_table($processed_topups);
                
                // Load view
                $this->load->view('private/summary_topup',array('html' => $html,'request_id' => $topup_id));
                
            } catch (Exception $e) {
                unlink($filename);
                $this->session->set_flashdata('error', $e->getMessage());
                redirect('topup/batch');
            }
            
        }


}
