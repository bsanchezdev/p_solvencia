<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of csvdata
 *
 * @author Desarrollo
 */
class csvdata extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->db_ripley_sitrel   = $this->load
                                        ->database('ripley_sitrel', TRUE)   ;
//        $this->ripley_xlsx   = $this->load->database('ripley_excel', TRUE)   ;
    }
    
    public function init($archivo) {
        
      $this->data_csv=  load_file($archivo,null);
}
    
    public function inserta($tabla,$value)
{
        $this->db_ripley_sitrel->truncate($tabla);
    $datos_array= construir_array_de_inserts($value,$tabla);
    
             foreach ($datos_array as $key_ => $value_)
             {
                $value_=  str_replace(",('')", "", $value_)     ;
                $this->db_ripley_sitrel->query($value_)                   ;                
             }
}
}
