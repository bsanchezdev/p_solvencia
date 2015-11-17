<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of css_e1
 *
 * @author Desarrollo
 */
class Css_e1 extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->view("css_simple/css_1");
    }
}
