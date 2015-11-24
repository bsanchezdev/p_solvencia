<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Movistar
 *
 * @author Desarrollo
 */
class Movistar extends CI_Controller {
   var $config_ftp=array();
   //var $rar_path='C:\"Archivos de programa"\WinRAR\Rar.exe x -o+ "';
    public function __construct() {
        parent::__construct()               ;
        
        $this->load->helper('url');
       
       // var_dump($this);
        $this->load->helper("file")         ;
        $this->load->helper("caracteres")   ;
        $this->load->library('ftp')         ;
        $this->load->library('Rar')         ;
        $this->load->helper('path')         ;  
        $this->load->helper("sql_construct")    ;
        $this->load->model('dts_movistar/data_');
        $this->data_html="";
      //  $this->db = $this->load->database('movistar', TRUE);
     
       // $this->u_crud->init($db);
        
    }
    
    protected function conectar_ftp() {
      return  $this->ftp->connect($this->config_ftp);
    }
   
    public function index() {
       //  $crud = new grocery_CRUD();
              //   $crud->set_model('G_model');
         //       $crud->set_table('empex_abonado_');
         //       $crud->columns('ORIGEN','NUM_IDENT');
  
    //$output = $crud->render();
 
    //$this->_example_output($output);
        $this->load->view("panel_procesos/movistar/dtsview");
    //   $this->data_->load();
    }
    public function start() {
  
$this->hoy = date("Ymd"); 
     // var_dump(get_loaded_extensions());
        $this->config_ftp['hostname']   = 'naboo'           ;
        $this->config_ftp['username']   = 'test_ftp'        ;
        $this->config_ftp['password']   = 'test'            ;
     //   $this->config_ftp['debug']      = TRUE            ;
       $stat    = $this->conectar_ftp()                     ;
      // echo FCPATH;  
       if($stat === true):
           
                $list = $this->ftp->list_files('/');
                if(count($list)>0):
                    
                    $dir=set_realpath(FCPATH."/rar_movistar_repo/".$this->hoy);
//echo $dir;
                    if(!is_dir($dir)){ 
                    mkdir($dir,777); 
                    } 
                    
                        foreach ($list as $key => $archivo) 
                        {
                            
                           $this->download($dir, $archivo);
                          
                        }
                endif;
                $data["data_html"]=$this->data_html      ;
       $this->load->view("proc_1",$data)        ;
                $this->data_->save($this->data);
                
                 $this->db_movistar = $this->load->database('movistar', TRUE);
               
                
       else:
           echo "Error al conectar al servidor ".$this->config_ftp['hostname'];
       endif;
    }
    
    
     protected function download($path,$archivo) {
     //   echo $archivo."<br>";
        $this->ftp->download($archivo, $path."/".$archivo, 'auto');
        
        $this->rar->unrar($path,$archivo);    
        unlink($path.$archivo);
        
          
          $listado=get_dir_file_info($path);
	 
       foreach ($listado as $key => $value) {
           
           $r=$listado[$key];
         $this->data[$r["name"]]=  load_file($r["server_path"],null,"dia");
         $regs=count($this->data[$r["name"]])-1;
         $this->data_html.='<li class="list-group-item">'.$r["server_path"]." -> ".$regs.' <span class="badge">OK</span><i class="icono-check"></i></li>'      ;
   
        
       } 
        $this->data_html.='<li class="list-group-item"> Datos guardados en BD <i class="icono-check"></i></li>'      ;
   
       
    }
    
    public function _example_output($output = null)
	{
		$this->load->view('example.php',$output);
	}

    
}
