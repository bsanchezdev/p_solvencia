<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of data_
 *
 * @author Desarrollo
 */
class data_ extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->db_movistar = $this->load->database('movistar', TRUE);
        $this->model_path=APPPATH."models";
        
        $db =   array('db' => $this->db_movistar);
      //  $this->load->library('U_Crud')  ;
      //  $this->u_crud->init("movistar");
       // $this->u_crud->setobj($this);
       //  $this->u_crud->tabla("empex_abonado_");
     //   $this->u_crud->columnas();
    }
    
    public function s($param) {
        $this->genera_asi_deudas=  load_query_file
                (
                $model_path.'/santander/querys/asi_deudas.sql',
                $variables
                );
    }
    
    public function save($param) {
        foreach ($param as $key => $value) {
            
            $tabla=  str_replace(".txt", "", $key);
            $tabla= preg_replace('/[0-9]+/', '', $tabla);
            $this->db_movistar->truncate($tabla);
            $sql=  construir_array_de_inserts($value, $tabla)   ;
            foreach ($sql as $_key => $_value) {
            $_value=  str_replace(",('')", "", $_value)         ;
            $this->db_movistar->query($_value)                  ;    
            }
            
            //var_dump($sql);
        }
    }
    
}
