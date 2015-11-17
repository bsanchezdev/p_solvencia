<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mysql
 *
 * @author Desarrollo
 */
class U_drivconf extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
    }
    public function load($driver) {
      //  phpinfo();
        $data["driver"]=$driver;
        $data["contador"]=$this->session->userdata("contador")  ;
        $driver = str_replace($data["contador"], "", $driver);
        $this->load->view("u_config/$driver",$data);
    }
    
    
}
