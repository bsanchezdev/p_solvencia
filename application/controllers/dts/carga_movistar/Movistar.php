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
   var $rar_path='C:\"Archivos de programa"\WinRAR\Rar.exe x -o+ "';
    public function __construct() {
        parent::__construct()       ;
        $this->load->library('ftp') ;
        $this->load->helper('path') ;  
    }
    
    protected function conectar_ftp() {
      return  $this->ftp->connect($this->config_ftp);
    }
   
    
    public function index() {
  
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
       else:
           echo "Error al conectar al servidor ".$this->config_ftp['hostname'];
       endif;
    }
    
    
     protected function download($path,$archivo) {
     //   echo $archivo."<br>";
        $this->ftp->download($archivo, $path."/".$archivo, 'auto');
        
        $this->unrar($path, $archivo);
        unlink($path.$archivo);
    }
    
    protected function unrar($path,$archivo) {
        $file=$path.$archivo;
     //   echo $path;
$string=$this->rar_path.$file.'" "'.$path.'"'; //e "\\199.69.69.93\interfaces_cedentes\Carga DW\Movistar\cobex_prorrogas_SOLVENCIA.rar" "\\199.69.69.93\interfaces_cedentes\Carga DW\Movistar"
exec($string);
    }
}
