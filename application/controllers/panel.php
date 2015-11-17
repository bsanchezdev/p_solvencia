<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of curso
 *
 * @author Desarrollo
 */
class Panel extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index($param=null)
    {
        $data   =   null;
        $this->load->view("panel_procesos/index",$data);
    }
    
}
