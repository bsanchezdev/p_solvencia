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
        $contador=$this->session->userdata("contador")  ;
        
        if( isset($contador) || @$contador < 1  ) :
            $this->drivers["contador"] = $contador+1;
        else:
            $this->drivers["contador"]     =       1                ;
        endif;
        
        
        $this->session->set_userdata($this->drivers)            ;
        $var_ses=$this->session->userdata()                     ;
    //    var_dump($var_ses);
        $driver=  str_replace($contador, "", $driver);
        $this->paso_2($driver);
    }
    
    public function uncheck($driver)
    {
      $contador=$this->session->userdata("contador")  ;
      if( isset($contador) || @$contador > 0  ) :
            $this->drivers["contador"] = $contador-1;
       $this->session->set_userdata($this->drivers)            ;
      endif;
             
       $this->paso_2_un($driver);       
    }    
    
    protected function paso_2($var_ses) 
    {
        $data["var_ses"]=$var_ses;
        $this->load->view("u_config/ndbc_paso2",$data);
    }
    protected function paso_2_un($var_ses) 
    {
        $data["uncheck"]=$var_ses;
        $this->load->view("u_config/ndbc_paso2",$data);
    }
    
    public function crear() {
        var_dump($_POST);
    }
}
