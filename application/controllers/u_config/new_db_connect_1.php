<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of new_db_connect
 *
 * @author Desarrollo
 */
class New_db_connect extends CI_Controller {
    var $drivers    =   array()         ;
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('u_config\u_tabs');
        
    }
    
    public function index()
    {}
    
    public function check($driver)
    {
        $this->session->unset_userdata("drivers")               ;
        $this->drivers[$driver]     =       TRUE                ;
        $this->session->set_userdata($this->drivers)            ;
        $var_ses=$this->session->userdata()                     ;
        
        $this->paso_2($var_ses);
    }
    
    public function uncheck($driver)
    {
      //  unset($this->drivers[$driver]);
       $this->session->unset_userdata($driver)                  ; 
       $var_ses=$this->session->userdata()                      ;
             
       $this->paso_2($var_ses);       
    }    
    
    protected function paso_2($var_ses) 
    {
        $data["var_ses"]=$var_ses;
        $this->load->view("u_config/ndbc_paso2",$data);
    }
    
    public function crear() {
        var_dump($_POST);
    }
}
