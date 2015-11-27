<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of upload
 *
 * @author Desarrollo
 */
class upload extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    
    public function index() {
        
    }
    
    function  fichero()
	{
        var_dump($_FILES); 
		$config['upload_path'] = './uploads/'   ;
		$config['allowed_types'] = 'xlsx'       ;
		$config['max_size']	= '100'         ;
		$config['max_width']  = '1024'          ;
		$config['max_height']  = '768'          ;
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
			$this->load->view('formulario_carga', $error);
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$this->load->view('upload_success', $data);
		}
	}	
    
}
