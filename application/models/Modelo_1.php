<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Modelo_1
 *
 * @author Desarrollo
 */
class Modelo_1 extends CI_Model {
    
    public function __construct() {
        parent::__construct();
         $this->db_mysql = $this->load->database('mysql', TRUE);
    }
    
    
    public function get_comunas()
    {
                $this->db_mysql
                ->select("ID,COMUNA")
                ->from("COMUNAS")                   ;
                
        return  $this->db_mysql->get()->result_array()    ;
    }
    
    public function insert_comuna($comuna)
    {
        $data = array(
   array(
      'ID' => '' ,
      'COMUNA' => $comuna
   )
);

$this->db->insert_batch('comunas', $data); 
    }
    
}
