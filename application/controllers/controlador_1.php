<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ejemplo_1
 *
 * @author Desarrollo
 */
class Controlador_1 extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
    }
    
    public function ejemplo_1($variable=null,$param_2=null)
    {
        if(!isset($variable)):
            $variable="No se enviaron datos";
        endif;
        if(!isset($param_2)):
            $param_2="No se enviaron datos";
        endif;
        
        
        $data["parametro_que_me_enviaron"]=$variable;
        $data["parametro_2_que_me_enviaron"]=$param_2;
        $this->load->view("ejemplos_curso_solvencia/ejemplo_1",$data);
    }
    
    public function ejemplo_2()
    {
        $data=null;
         $this->load->view("ejemplos_curso_solvencia/ejemplo_2",$data);
    }
    
    public function ejemplo_3()
    {
        $data=null;
         $this->load->view("ejemplos_curso_solvencia/ejemplo_3",$data);
    }
    
    public function ejemplo_4()
    {
        $data=null;
        
        $this->load->model("Modelo_1");
       
        $comunas=$this->Modelo_1->get_comunas()     ;
        
        /* construir listado combobox con comunas*/
        $combo_options="";
        foreach ($comunas as $key => $value):
            $combo_options.='<option value="'.$comunas[$key]["ID"].'">'.$comunas[$key]["COMUNA"].'</option>';
        endforeach;
        $data["comunas"]=$combo_options;
         $this->load->view("ejemplos_curso_solvencia/ejemplo_4",$data);
    }
    
    
    public function guarda_comuna()
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>')                       ;
        $this->form_validation->set_rules('COMUNA', 'Comuna','trim|required|min_length[3]|max_length[12]')  ;

        if($this->form_validation->run() == FALSE)
        {}else{
        $this->load->model("Modelo_1");
        $this->Modelo_1->insert_comuna($_POST["COMUNA"])            ;
        }
        $this->ejemplo_4();
    }
    
    public function form_val_js()            
    {
        $this->load->view("ejemplos_curso_solvencia/form_val");
    }
            
        }
