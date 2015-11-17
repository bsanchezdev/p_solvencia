<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of financop_interfaz_v2
 *
 * @author Desarrollo
 */
class Financoop_interfaz_v2 extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper("file");
        $this->load->helper("caracteres");
                 $this->load->helper("sql_construct");
        $this->load->model("financoop/financoop");
        ini_set('max_execution_time', -1);
    }
     public function index() {
        $data="";
        
        $this->load->view("panel_procesos/financoop/interfaz",$data);
    }
      
    public function indexrobot() {
        $data="";
        
        $this->load->view("panel_procesos/financoop/interfaz_robot",$data);
    }
    public function importar($diames,$f_archivo,$c_archivo)
    {
        $this->f_archivo=$f_archivo;
        $this->c_archivo=$c_archivo;
        $ruta="//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\FIC_CARSIT\Entrada";
       $listado=get_dir_file_info($ruta);
        //var_dump($listado);
       foreach ($listado as $key => $value) {
           if(!strpos($key, "MES")):
           $flags[0]="Aval";
           $flags[1]="Cuotas";
           $flags[2]="Deuda";
           $flags[3]="Direccion";
           $flags[4]="Pagos";
           $flags[5]="Socios";
           $flags[6]="Telefonos";
           
           $flag="";
           foreach ($flags as $key_ => $value_) {
               if(strpos($key, $value_)):
                   $flag=$value_;
               endif;
           }
           $flag=strtolower($flag);
               
               
               
           $r=$listado[$key];
           $this->leer_archivo($r,$flag,"dia");
           else:
           endif;
       }
       //var_dump($this->financoop->insertados);
       
       $data["registros_insertados"]=$this->financoop->insertados;
       $this->load->view("panel_procesos/financoop/salida_importar",$data);
    }
    protected function leer_archivo($archivo,$flag,$diames)
    {
   $arch=    $archivo["relative_path"].'\\'.$archivo["name"];
        // echo "*".$arch."<br>";   
       $datos= fopen($arch, "r");
       $batch_data=array();
       
       $contador=0;
       $total=0;
       while(!feof($datos))
	{
           
            $f_datos            =   fgets($datos)           ;
            $f_datos            =   trim($f_datos,";")      ;
            $f_datos_array      =   explode(";", $f_datos)  ;
            
            //$this->f_archivo
            $arch=str_replace(".TXT","",$archivo["name"])  ;
            $arch=str_replace(".txt","",$arch)  ;
            $arch.=" ".  $this->f_archivo;
            $f_datos_array[]    =   $arch      ;
            if(isset($f_datos_array[5])&&$f_datos_array[5]!=""):
                $batch_data[$contador]=$f_datos_array;   
            endif;
            if($flag=="telefonos"):
                $batch_data[$contador]=$f_datos_array;
            endif;
            $total++        ;
            $contador++     ;
        }
    fclose($datos);
   
   // $this->insert_batch_("dia_".$flag,$batch_data);
    $this->financoop->importar($diames."_".$flag,$batch_data,$this->c_archivo);
    }
    
    /**/
      public function importar_mes($f_archivo,$c_archivo)
    {
        $this->f_archivo=$f_archivo;
        $this->c_archivo=$c_archivo;
        $ruta="//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\FIC_CARSIT\Entrada";
       $listado=get_dir_file_info($ruta);
        //var_dump($listado);
       foreach ($listado as $key => $value) {
           if(strpos($key, "MES")):
           $flags[0]="Aval"         ;
           $flags[1]="Cuotas"       ;
           $flags[2]="Deuda"        ;
           $flags[3]="Direccion"    ;
           $flags[4]="Pagos"        ;
           $flags[5]="Socios"       ;
           $flags[6]="Telefonos"    ;
           
           $flag="";
           foreach ($flags as $key_ => $value_) {
               if(strpos($key, $value_)):
                   $flag=$value_;
               endif;
           }
           $flag=strtolower($flag);
               
               
               
           $r=$listado[$key];
           $this->leer_archivo($r,$flag,"mes");
           else:
           endif;
       }
       //var_dump($this->financoop->insertados);
       
       $data["registros_insertados"]=$this->financoop->insertados;
       $this->load->view("panel_procesos/financoop/salida_importar",$data);
    }
    
    
    
    public function total($f_archivo,$c_archivo)
    {
        $this->financoop->borrar_para_total();
        $this->financoop->anexar_para_total();
        echo "Proceso terminado";
    }
}
