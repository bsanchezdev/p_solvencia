<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_urnusdev
 *
 * @author Desarrollo
 */
class MY_urnusdev extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function init_udev($param=null) {
        echo $param."<!-- Urnusdev -->";
    }
}
