<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of financoop
 *
 * @author Desarrollo
 */
class Financoop_robot_panel extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data="";
        $this->load->view("panel_procesos/financoop/index_robot",$data);
    }
    
}
