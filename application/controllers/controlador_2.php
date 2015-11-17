<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controlador_2
 *
 * @author Desarrollo
 */
class Controlador_2 extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data["respuesta"]=$_POST;
        /* construir listado combobox con comunas*/
        $this->load->model("Modelo_1");
        $comunas=$this->Modelo_1->get_comunas();
        $combo_options="";
        foreach ($comunas as $key => $value):
            $combo_options.='<option value="'.$comunas[$key]["ID"].'">'.$comunas[$key]["COMUNA"].'</option>';
        endforeach;
        $data["comunas"]=$combo_options;
        $this->load->view("ejemplos_curso_solvencia/ejemplo_4",$data);
    }
}
