<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of santander
 *
 * @author Desarrollo
 */
class Santander_c extends CI_Controller{
   var $ruta_cbdd_bn1       =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\BN1\CARBDD.txt";
   var $ruta_direccion_bn1  =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\BN1\CARDIR.txt";
   var $ruta_telefonos_bn1  =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\BN1\TMOVIL.txt";
   //var $copia_ruta_cbdd_bn1       =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\BN1\CARBDD.CSV";
   //var $copia_ruta_direccion_bn1  =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\BN1\CARDIR.CSV";
   //var $copia_ruta_telefonos_bn1  =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\BN1\TMOVIL.CSV";
   
   
   
   var $ruta_cbdd_bnf       =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\BNF\CARBDD.txt";
   var $ruta_direccion_bnf  =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\BNF\CARDIR.txt";
   var $ruta_telefonos_bnf  =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\BNF\TMOVIL.txt";
   
   var $ruta_cbdd_st1       =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\ST1\CARBDD.txt";
   var $ruta_direccion_st1  =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\ST1\CARDIR.txt";
   var $ruta_telefonos_st1  =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\ST1\TMOVIL.txt";
   
   var $ruta_cbdd_std       =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\STD\CARBDD.txt";
   var $ruta_direccion_std  =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\STD\CARDIR.txt";
   var $ruta_telefonos_std  =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\STD\TMOVIL.txt";
   
   public function __construct() {
       parent::__construct()                    ;
       $this->load->helper("caracteres")        ;
       $this->load->helper("file")              ;
       $this->load->helper("sql_construct")     ;
       $this->load->model("santander/Santander");
       
   }
   public function index() {
       $this->load->view("panel_procesos\santander\index");
   }
   public function paso_1($param="") {
     //  echo "Controlador respondiendo";
       $this->Santander->proc_1();
       $data["data_html"]=$this->Santander->data_html               ;
       $this->load->view("panel_procesos\santander\proc_1",$data)   ;
   }
   
   public function paso_2()
   {
       $this->Santander->proc_bn1();
       $this->exportar_bn1();
       
       $data["data_html"]=$this->data_html               ;
       $this->load->view("panel_procesos\santander\proc_1",$data)   ;


   }
   
   public function paso_3()
   {
        $this->Santander->proc_bnf();
        $this->exportar_bnf();
        $data["data_html"]=$this->data_html               ;
        $this->load->view("panel_procesos\santander\proc_1",$data)   ;
   }
   
   
   public function paso_4()
   {
       $this->Santander->proc_st1();
       $this->exportar_st1();
        $data["data_html"]=$this->data_html               ;
        $this->load->view("panel_procesos\santander\proc_1",$data)   ;
   }
   
   public function paso_5()
   {
       $this->Santander->proc_std()                                 ;
       $this->exportar_std()                                        ;
       
       $fecha_carga = date("Ymd")                                   ;
             
       $data["data_html"]=$this->data_html                          ;
       $this->load->view("panel_procesos\santander\proc_1",$data)   ;
       
         $fecha_carga = date("Ymd")                                   ;
       $this->Santander->cuadratura($fecha_carga); 
   }
   
   public function test() {
       $fecha_carga = date("Ymd")                                   ;
       $this->Santander->cuadratura($fecha_carga);
   }
   protected function exportar_bn1()
   {
     /*exportar carbbd BN1*/
       $this->data_html="";
       if ( ! write_file($this->ruta_cbdd_bn1, $this->Santander->csv_carbdd))
{
     $this->data_html.='<li class="list-group-item">CARBDD BN1 <span class="badge">ERROR</span></li>'      ;
     
}
else
{
    $this->data_html.='<li class="list-group-item">CARBDD BN1 <span class="badge">OK</span></li>'      ;
   
}

if ( ! write_file($this->ruta_direccion_bn1, $this->Santander->csv_direccion))
{
     $this->data_html.= '<li class="list-group-item">CARBDD DIRECCIÓN BN1 <span class="badge">ERROR</span></li>' ;
}
else
{
    $this->data_html.= '<li class="list-group-item">CARBDD DIRECCIÓN BN1 <span class="badge">OK</span></li>' ;
}

if ( ! write_file($this->ruta_telefonos_bn1, $this->Santander->csv_telefonos))
{
    $this->data_html.= '<li class="list-group-item">CARBDD TELËFONOS BN1 <span class="badge">ERROR</span></li>' ;
}
else
{
   $this->data_html.= '<li class="list-group-item">CARBDD TELÉFONOS BN1 <span class="badge">OK</span></li>' ;
}  
/* fin carbdd bn1 */  
   }
   
   protected function exportar_bnf()
   {
     /*exportar carbbd BN1*/
       $this->data_html="";
       if ( ! write_file($this->ruta_cbdd_bnf, $this->Santander->csv_carbdd))
{
     $this->data_html.='<li class="list-group-item">CARBDD BNf <span class="badge">ERROR</span></li>'      ;
     
}
else
{
    $this->data_html='<li class="list-group-item">CARBDD BNF <span class="badge">OK</span></li>'      ;
   
}

if ( ! write_file($this->ruta_direccion_bnf, $this->Santander->csv_direccion))
{
     $this->data_html.= '<li class="list-group-item">CARBDD DIRECCIÓN BNF <span class="badge">ERROR</span></li>' ;
}
else
{
    $this->data_html.= '<li class="list-group-item">CARBDD DIRECCIÓN BNF <span class="badge">OK</span></li>' ;
}

if ( ! write_file($this->ruta_telefonos_bnf, $this->Santander->csv_telefonos))
{
    $this->data_html.= '<li class="list-group-item">CARBDD TELËFONOS BNF <span class="badge">ERROR</span></li>' ;
}
else
{
   $this->data_html.= '<li class="list-group-item">CARBDD TELÉFONOS BNF <span class="badge">OK</span></li>' ;
}  
/* fin carbdd bn1 */  
   }
   
    protected function exportar_st1()
   {
     /*exportar carbbd BN1*/
       $this->data_html="";
       if ( ! write_file($this->ruta_cbdd_st1, $this->Santander->csv_carbdd))
{
     $this->data_html.='<li class="list-group-item">CARBDD ST1 <span class="badge">ERROR</span></li>'      ;
     
}
else
{
    $this->data_html='<li class="list-group-item">CARBDD ST1 <span class="badge">OK</span></li>'      ;
   
}

if ( ! write_file($this->ruta_direccion_st1, $this->Santander->csv_direccion))
{
     $this->data_html.= '<li class="list-group-item">CARBDD DIRECCIÓN ST1 <span class="badge">ERROR</span></li>' ;
}
else
{
    $this->data_html.= '<li class="list-group-item">CARBDD DIRECCIÓN ST1 <span class="badge">OK</span></li>' ;
}

if ( ! write_file($this->ruta_telefonos_st1, $this->Santander->csv_telefonos))
{
    $this->data_html.= '<li class="list-group-item">CARBDD TELËFONOS ST1 <span class="badge">ERROR</span></li>' ;
}
else
{
   $this->data_html.= '<li class="list-group-item">CARBDD TELÉFONOS ST1 <span class="badge">OK</span></li>' ;
}  
/* fin carbdd bn1 */  
   }
   
    protected function exportar_std()
   {
     /*exportar carbbd BN1*/
       $this->data_html="";
       if ( ! write_file($this->ruta_cbdd_std, $this->Santander->csv_carbdd))
{
     $this->data_html.='<li class="list-group-item">CARBDD STD <span class="badge">ERROR</span></li>'      ;
     
}
else
{
    $this->data_html='<li class="list-group-item">CARBDD STD <span class="badge">OK</span></li>'      ;
   
}

if ( ! write_file($this->ruta_direccion_std, $this->Santander->csv_direccion))
{
     $this->data_html.= '<li class="list-group-item">CARBDD DIRECCIÓN STD <span class="badge">ERROR</span></li>' ;
}
else
{
    $this->data_html.= '<li class="list-group-item">CARBDD DIRECCIÓN STD <span class="badge">OK</span></li>' ;
}

if ( ! write_file($this->ruta_telefonos_std, $this->Santander->csv_telefonos))
{
    $this->data_html.= '<li class="list-group-item">CARBDD TELËFONOS STD <span class="badge">ERROR</span></li>' ;
}
else
{
   $this->data_html.= '<li class="list-group-item">CARBDD TELÉFONOS STD <span class="badge">OK</span></li>' ;
}  
/* fin carbdd bn1 */  
   }
}
