<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uvm
 *
 * @author Desarrollo
 */
class Uvm extends CI_Model {
public function __construct() {
    parent::__construct();
    $this->db_uvm = $this->load->database('uvm', TRUE);
          $this->db_CNB = $this->load->database('CNB', TRUE);
          $this->db_OPERACIONES = $this->load->database('operaciones', TRUE);
         $this->model_path=APPPATH."models";
}


public function proc_1($data) {
    
    
    
    $this->db_uvm->truncate("deuda");
    $this->db_uvm->truncate("direcciones");
    $this->db_uvm->truncate("telefonos");
    $this->db_uvm->truncate("email");
    
    
    $this->alter_deuda_quitar =  load_query_file
        (
        $this->model_path.'/uvm/alter/alter_deuda_quitar.sql'
        );
    $this->db_uvm->query($this->alter_deuda_quitar)             ;
    
    
    foreach ($data as $key => $value) 
    {
        if(strpos(strtolower($key), "deuda")):
            $this->inserta("deuda",$value);
        endif;
        
        if(strpos(strtolower($key), "direc")):
           $this->inserta("direcciones",$value);
        endif;
        
        if(strpos(strtolower($key), "email")):
          $this->inserta("email",$value);
        endif;
        
        if(strpos(strtolower($key), "telef")):
            $this->inserta("telefonos",$value);
        endif;
    }
   
}


protected function inserta($tabla,$value)
{
    $datos_array= construir_array_de_inserts($value,$tabla);
    
             foreach ($datos_array as $key_ => $value_)
             {
                $value_=  str_replace(",('')", "", $value_)     ;
                if($value_!="INSERT INTO email VALUES "):
                $this->db_uvm->query($value_)                   ;                
                endif;
                           
             }
}

public function cuadratura()
{
    
    $this->db_uvm->truncate("cuadratura")                       ;
    
    $this->cuadratura_alumnos =  load_query_file
        (
        $this->model_path.'/uvm/cuadratura/alumnos.sql'
        );
    $this->db_uvm->query($this->cuadratura_alumnos)             ;
    
    $this->cuadratura_tutores =  load_query_file
        (
        $this->model_path.'/uvm/cuadratura/tutor.sql'
        );
     $this->db_uvm->query($this->cuadratura_tutores)            ;
     
     $this->cuadratura_operaciones =  load_query_file
        (
        $this->model_path.'/uvm/cuadratura/operaciones.sql'
        );
     $this->db_uvm->query($this->cuadratura_operaciones)        ;
     
     $this->cuadratura_monto =  load_query_file
        (
        $this->model_path.'/uvm/cuadratura/monto.sql'
        );
     $this->db_uvm->query($this->cuadratura_monto)              ;
     
     $this->cuadratura_ =  load_query_file
        (
        $this->model_path.'/uvm/cuadratura/cuadratura.sql'
        );
  $c=  $this->db_uvm->query($this->cuadratura_)   ;
             
     $this->cuadratura = $c->result_array() ;
      
}

public function carga_sitrel() {
    
    $this->alter_deuda_agregar =  load_query_file
        (
        $this->model_path.'/uvm/alter/alter_deuda_agregar.sql'
        );
    $this->db_uvm->query($this->alter_deuda_agregar)             ;
    
    
    $this->db_uvm->truncate("vencimiento_mas_antiguo_moroso")                 ;
    $this->anexa_vencimiento_mas_antiguo_moroso =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/anexa_vencimiento_mas_antiguo_moroso.sql'
     );
    $this->db_uvm->query($this->anexa_vencimiento_mas_antiguo_moroso)         ;
          
    $this->anexa_ap_vencimiento_mas_antiguo_moroso =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/anexa_ap_vencimiento_mas_antiguo_moroso.sql'
     );
    $this->db_uvm->query($this->anexa_ap_vencimiento_mas_antiguo_moroso)      ;
        
    $this->db_uvm->truncate("carga");   
    
    $this->anexa_carga_ap =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/anexa_carga_ap.sql'
     );
    $this->db_uvm->query($this->anexa_carga_ap) ;
    
    $this->anexa_carga_al =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/anexa_carga_al.sql'
     );
    $this->db_uvm->query($this->anexa_carga_al) ;
    
    $this->actualiza_excluido =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/actualiza_excluido.sql'
     );
    $this->db_uvm->query($this->actualiza_excluido) ;
    /****/
    
    
    
    
}

public function carga_bases_sitrel()
{
    $this->db_uvm->truncate("base_deuda");
     $this->anexa_base_deuda =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/anexa_base_deuda.sql'
     );
    $this->db_uvm->query($this->anexa_base_deuda) ;
    
    $this->db_uvm->truncate("base_direccion");    
    $this->anexa_base_direccion =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/anexa_base_direccion.sql'
     );
    $this->db_uvm->query($this->anexa_base_direccion) ;
    
    $this->db_uvm->truncate("base_telefonos");
    $this->anexa_base_telefonos_f1 =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/anexa_base_telefonos_f1.sql'
     );
    $this->db_uvm->query($this->anexa_base_telefonos_f1) ;
    
     $this->anexa_base_telefonos_f2 =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/anexa_base_telefonos_f2.sql'
     );
    $this->db_uvm->query($this->anexa_base_telefonos_f2) ;
    
    $this->anexa_base_telefonos_f3 =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/anexa_base_telefonos_f3.sql'
     );
    $this->db_uvm->query($this->anexa_base_telefonos_f3) ;
    
    $this->anexa_base_telefonos_f4 =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/anexa_base_telefonos_f4.sql'
     );
    $this->db_uvm->query($this->anexa_base_telefonos_f4) ;
    
    $this->anexa_base_telefonos_f5 =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/anexa_base_telefonos_f5.sql'
     );
    $this->db_uvm->query($this->anexa_base_telefonos_f5) ;
    
    $this->anexa_base_telefonos_f6 =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/anexa_base_telefonos_f6.sql'
     );
    $this->db_uvm->query($this->anexa_base_telefonos_f6) ;
    
    $this->anexa_base_telefonos_f7 =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/anexa_base_telefonos_f7.sql'
     );
    $this->db_uvm->query($this->anexa_base_telefonos_f7) ;
    
    $this->base_telefonos_formato =  load_query_file
     (
     $this->model_path.'/uvm/sitrel/base_telefonos_formato.sql'
     );
    $this->db_uvm->query($this->base_telefonos_formato) ;
    
    
    
}

public function normalizar($fi,$ft) {
     $variables = array
            (
            "%fini%"   =>  $fi,
            "%fter%"   =>  $ft
            );
    $this->normalizar_ =  load_query_file
     (
     $this->model_path.'/uvm/normalizar/norm_pagos.sql',
     $variables
     );
     $r= $this->db_CNB->query($this->normalizar_);
   
    $r=$r->result_array()            ;
    $this->db_uvm->truncate("normalizar_pagos");
    
    
    $datos_array= construir_array_de_inserts($r,"normalizar_pagos");
    
             foreach ($datos_array as $key_ => $value_)
             {
                $value_=  str_replace(",('')", "", $value_)     ;
                $this->db_uvm->query($value_)                   ;                
             }
             
             
  
    
}


public function exportar_deuda()
    {
    $this->deuda =  load_query_file
     (
     $this->model_path.'/uvm/exportar/deuda.sql'
     );
   $r= $this->db_uvm->query($this->deuda) ;
    
   $data=$r->result_array()            ;
          $this->csv_carbdd=generateCsv($data); 
          
    }
    
    
    public function update_pagos() {
          $this->update_pagos =  load_query_file
     (
     $this->model_path.'/uvm/normalizar/update_pagos_orig.sql'
     );
    $this->db_uvm->query($this->update_pagos) ;
    }
    
    public function proc_update_pagos()
    {
        $this->get_data_carga =  load_query_file
     (
     $this->model_path.'/uvm/normalizar/get_data_carga.sql'
     );
    $r=$this->db_uvm->query($this->get_data_carga) ;
     $r=$r->result_array()            ;
     
    foreach ($r as $key => $value):
         $this->norm($value);
    endforeach;
         
   
    }
    
    protected function norm($data) {
        $var=array(
            "%cuota%"       =>  $data["CUOTA"]      ,
            "%operacion%"   =>  $data["OPERACION"]  ,
            "%rut%"         =>  $data["RUT"]                
                );
        $this->data_normalizar_pagos =  load_query_file
     (
     $this->model_path.'/uvm/normalizar/data_normalizar_pagos.sql',$var
     );
         $r =       $this->db_uvm->query($this->data_normalizar_pagos)  ;
         $r =       $r->result_array()                                  ;
         if(count($r)>0):
             
        $this->update_cuota =  load_query_file
     (
     $this->model_path.'/uvm/normalizar/update_cuota.sql',$var
     );
         $this->db_uvm->query($this->update_cuota) ;
         endif;
         
         
    }
    
    
    public function proc_query()
    {
        $this->db_CNB->truncate("UVM_RG_PAGOS_SITREL");
        $this->q1 =  load_query_file
     (
     $this->model_path.'/uvm/query/q1.sql'
     );
        $this->db_CNB->query($this->q1);
        
    }
    
    
    public function baja() {
        $this->baja =  load_query_file
     (
     $this->model_path.'/uvm/baja/q_baja.sql'
     );
         $r =       $this->db_uvm->query($this->baja)                   ;
         $r =       $r->result_array()                                  ;
         $this->csv_baja=generateCsv($r)                                ; 
    }
    public function actualiza_data()
    {
        $this->actualiza_data =  load_query_file
     (
     $this->model_path.'/uvm/baja/actualiza_data.sql'
     );
        $this->db_OPERACIONES->query( $this->actualiza_data);
    }
    }

    
    