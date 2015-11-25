<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of A
 *
 * @author Desarrollo
 */
class A extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library("u_crud");
        
        
                $this->u_crud->init("movistar")
                        ->init("mysql_movistar");
    }
    
    public function index($a=0) {
        echo $a; echo $b;
     $cols1= $this->u_crud->use_db("mysql_movistar")
              ->tabla("empex_abonado_")->get_columnas();
     
   /*  $cols2 =  $this->u_crud->use_db("movistar")
              ->tabla("[BANCO_SANTANDER_ASIGNACION]")->get_columnas();*/
     
		$data['title'] = 'Paginacion_ci';
		$pages=10; //Número de registros mostrados por páginas
		$this->load->library('pagination'); //Cargamos la librería de paginación
		$config['base_url'] = base_url().'crud/A/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
		$config['total_rows'] = $this->u_crud->filas();//calcula el número de filas  
		$config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 20; //Número de links mostrados en la paginación
 		$config['first_link'] = 'Primera';//primer link
		$config['last_link'] = 'Última';//último link
        $config["uri_segment"] = 3;//el segmento de la paginación
		$config['next_link'] = 'Siguiente';//siguiente link
		$config['prev_link'] = 'Anterior';//anterior link
		$this->pagination->initialize($config); //inicializamos la paginación		
		$data["provincias"] = $this->u_crud->total_paginados($config['per_page'],$this->uri->segment(5));			
              
                //cargamos la vista y el array data
		$this->load->view('U_crud/index', $data);
        
    }
    
    public function pag($pag=0) {
       
 //var_dump($this->uri->segment(4));
     $cols1= $this->u_crud->use_db("mysql_movistar")
              ->tabla("empex_abonado_")->get_columnas();
     
   /*  $cols2 =  $this->u_crud->use_db("movistar")
              ->tabla("[BANCO_SANTANDER_ASIGNACION]")->get_columnas();*/
     
		$data['title'] = 'Paginacion_ci';
		$pages=10; //Número de registros mostrados por páginas
		$this->load->library('pagination'); //Cargamos la librería de paginación
		$config['base_url'] = base_url().'crud/A/pag/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
		$config['total_rows'] = $this->u_crud->filas();//calcula el número de filas  
		$config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 20; //Número de links mostrados en la paginación
 		$config['first_link'] = 'Primera';//primer link
		$config['last_link'] = 'Última';//último link
        $config["uri_segment"] = 4;//el segmento de la paginación
		$config['next_link'] = 'Siguiente';//siguiente link
		$config['prev_link'] = 'Anterior';//anterior link
		$this->pagination->initialize($config); //inicializamos la paginación		
		$data["provincias"] = $this->u_crud->total_paginados($config['per_page'],$this->uri->segment(4));			
              
                //cargamos la vista y el array data
                var_dump($this->u_crud->use_db->last_query());
		$this->load->view('U_crud/index', $data);
    }
    
}
