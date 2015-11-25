<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of U_Crud
 *
 * @author Desarrollo
 */
require_once SYSDIR.'/core/Model.php'; 
class U_Crud  extends CI_Model{
    
    var $db=null;
    var $tabla=null;
    var $obj=null;
    var $use_db=null;
    public function __construct() {
        
    }
   public function init($database=null) {
       //phpinfo();
        $this->CI = get_instance()                                            ;
        $this->db[$database]= $this->CI->load->database($database, TRUE);
        if($this->db[$database]!=null):
       // $this->db=$database                                                 ;
      //  var_dump($this);
        $this->CI->load->helper("sql_construct")                              ;
        $this->CI->load->helper("url")                                        ;
        else:
        show_error("Debe ud indicar el objeto BD",500,"Error U_Crud")   ;
        endif;
       return $this;
   }
   
   public function tabla($tabla) {
       $this->tabla=$tabla;
       return $this;
   }
   public function use_db($db)
   {
       $this->use_db=$this->db[$db];
       return $this;
   }
           
   public function setobj($obj) {
       $this->obj=$obj;
       
   }
   
   
   public function get_columnas()
   {
       /*var_dump($this->
               use_db->dbdriver);*/
       $fields = $this->
               use_db->
               list_fields($this->tabla);
       return $fields;
   }
   
   	function filas()
	{
		$consulta = $this->use_db->get($this->tabla);
		return  $consulta->num_rows() ;
	}
   
        	function total_paginados($por_pagina,$segmento) 
        {
            $consulta = $this->use_db->get($this->tabla,$por_pagina,$segmento);
            if($consulta->num_rows()>0)
            {
                foreach($consulta->result() as $fila)
		{
		    $data[] = $fila;
		}
                    return $data;
            }
	}
   }
