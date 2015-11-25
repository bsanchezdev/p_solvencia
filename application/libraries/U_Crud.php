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
        $this->CI = get_instance()                                            ;
        $this->CI->load->helper("bootstrap");
    }
   public function init($database=null) {
       //phpinfo();
        
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
        
        
        public function show($titulo="U_Crud Show Tabla",$paginas=10,$links=5,$segment=4)
        {
            $data['count']=0;
            $data['title'] = $titulo;
		$pages=$paginas; //Número de registros mostrados por páginas
		$this->load->library('pagination'); //Cargamos la librería de paginación
		$config['base_url'] = base_url().'crud/A/pag/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
		$config['total_rows'] = $this->filas();//calcula el número de filas  
		$config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = $links; //Número de links mostrados en la paginación
 		$config['first_link'] = 'Primera';//primer link
		$config['last_link'] = 'Última';//último link
        $config["uri_segment"] = $segment;//el segmento de la paginación
		$config['next_link'] = 'Siguiente';//siguiente link
		$config['prev_link'] = 'Anterior';//anterior link
		$this->pagination->initialize($config); //inicializamos la paginación		
		$data["data_tabla"] = $this->total_paginados($config['per_page'],$this->uri->segment($segment));			
                $data['columnas'] = $this->get_columnas();
                $data['id_tab']=$this->tabla;
                //cargamos la vista y el array data
               // var_dump($this->u_crud->use_db->last_query());
		$this->CI->load->view('U_crud/show_tabla', $data);
        }
   }
