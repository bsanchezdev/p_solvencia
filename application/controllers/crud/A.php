<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of A
 *
 * @author Desarrollo
 */
class A extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library("u_crud");
        
        
                $this->u_crud->init("movistar")
                        ->init("mysql_movistar");
    }
    
    public function index($a=0) {
        $this->pag($a);
    }
    
    public function pag($pag=0) {
       
 //var_dump($this->uri->segment(4));
  /*    $this->u_crud
           ->use_db("mysql_movistar")
           ->tabla("empex_abonado_")
           ->show();
  */   
        $this->u_crud
           ->use_db("mysql_movistar")
           ->tabla("empex_documento_")
           ->show();
    
      
     
		
    }
    
}
