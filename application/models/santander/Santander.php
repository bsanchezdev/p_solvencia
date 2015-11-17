<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Santander
 *
 * @author Desarrollo
 */
class Santander extends CI_Model{
    var $exportar_deuda=null;
    public function __construct() {
        parent::__construct();
         $this->db_santander = $this->load->database('santander', TRUE);
          $this->db_CNB = $this->load->database('CNB', TRUE);
         $this->model_path=APPPATH."models";
    }
    
    protected function querys_proc_1($dias_para_vencimiento=180)
    {
        $CI=get_instance();
        $model_path=$CI->load;
        $model_path=APPPATH."models";
              
        
        
        $variables=array
            (
            "%dias_para_vencimiento%"   =>  $dias_para_vencimiento,
            "%VARX%"                    =>  "I30",
            "%VARY%"                    =>  "I32",
            "%VARZ%"                    =>  "I35",
            "%COBRADOR%"                =>  "SOL1"
            );
        $this->genera_asi_deudas=  load_query_file
                (
                $model_path.'/santander/querys/asi_deudas.sql',
                $variables
                );
        
        
        $this->genera_asi_clientes =  load_query_file
                (
                $model_path.'/santander/querys/asi_clientes.sql'
                );
        
        $this->genera_asi_cuotas =  load_query_file
                (
                $model_path.'/santander/querys/asi_cuotas.sql'
                );
        
        $this->genera_asi_direcciones =  load_query_file
                (
                $model_path.'/santander/querys/asi_direcciones.sql'
                );
        
        $this->genera_asi_telefonia =  load_query_file
                (
                $model_path.'/santander/querys/asi_telefonia.sql'
                );
        
        $this->genera_anexa_deuda =  load_query_file
                (
                $model_path.'/santander/querys/anexa_deuda.sql'
                );
        
        $this->genera_asi_nombres =  load_query_file
                (
                $model_path.'/santander/querys/asi_nombres.sql'
                );
        
        $this->update_carga =  load_query_file
                (
                $model_path.'/santander/querys/update_carga.sql'
                );
        
        $this->asi_com_dir =  load_query_file
                (
                $model_path.'/santander/querys/asi_com_dir.sql'
                );
        
        $this->actualiza_dir_com =  load_query_file
                (
                $model_path.'/santander/querys/actualiza_dir_com.sql'
                );
        
        $this->f1 =  load_query_file
                (
                $model_path.'/santander/querys/f1.sql'
                );
        
        $this->f2 =  load_query_file
                (
                $model_path.'/santander/querys/f2.sql'
                );
        
        $this->f3 =  load_query_file
                (
                $model_path.'/santander/querys/f3.sql'
                );
        
        $this->update_carga_telefonos =  load_query_file
                (
                $model_path.'/santander/querys/update_carga_telefonos.sql'
                );
        
        $this->update_carga_producto =  load_query_file
                (
                $model_path.'/santander/querys/update_carga_producto.sql'
                );
        
        $this->resumen_carga =  load_query_file
                (
                $model_path.'/santander/querys/resumen_carga.sql'
                );
        
    }

    public function proc_1()
    {
        $this->querys_proc_1()                                                                              ;
        $this->db_santander->truncate("asi_deudas")                                                         ;
        $this->db_santander->truncate("carga")                                                              ;
               
        
        $this->db_santander->query($this->genera_asi_deudas)                                                ;
      //  echo '<li class="list-group-item">genera_asi_deudas <span class="badge">OK</span></li>'         ;
        
        $this->db_santander->truncate("asi_clientes")                                                       ;
        $this->db_santander->query($this->genera_asi_clientes)                                              ;
      //  echo '<li class="list-group-item">genera_asi_clientes <span class="badge">OK</span></li>'       ;
        
        $this->db_santander->truncate("asi_cuotas")                                                         ;
        $this->db_santander->query($this->genera_asi_cuotas)                                                ;
      //  echo '<li class="list-group-item">genera_asi_cuotas <span class="badge">OK</span></li>'         ;
        
        $this->db_santander->truncate("asi_direcciones")                                                    ;
        $this->db_santander->query($this->genera_asi_direcciones)                                           ;
      //  echo '<li class="list-group-item">genera_asi_direcciones <span class="badge">OK</span></li>'    ;
        
        $this->db_santander->truncate("asi_telefonia")                                                      ;
        $this->db_santander->query($this->genera_asi_telefonia)                                             ;
      //  echo '<li class="list-group-item">genera_asi_telefonia <span class="badge">OK</span></li>'      ;
        
        $this->db_santander->query($this->genera_anexa_deuda)                                               ;
      //  echo '<li class="list-group-item">genera_anexa_deuda <span class="badge">OK</span></li>'        ;
         
        $this->db_santander->truncate("asi_nombres")                                                        ;
        $this->db_santander->query($this->genera_asi_nombres)                                               ;
      //  echo '<li class="list-group-item">genera_asi_nombres <span class="badge">OK</span></li>'        ;
        
        $this->db_santander->query($this->update_carga)                                                     ;
      //  echo '<li class="list-group-item">update_carga <span class="badge">OK</span></li>'              ;
        
        $this->db_santander->truncate("asi_com_dir")                                                        ;
        $this->db_santander->query($this->asi_com_dir)                                                      ;
      //  echo '<li class="list-group-item">asi_com_dir <span class="badge">OK</span></li>'               ;
        
        $this->db_santander->query($this->actualiza_dir_com)                                                ;
      //  echo '<li class="list-group-item">actualiza_dir_com <span class="badge">OK</span></li>'         ;
        
        $this->db_santander->truncate("f1")                                                                 ;
        $this->db_santander->query($this->f1)                                                               ;
      //  echo '<li class="list-group-item">f1 <span class="badge">OK</span></li>'                        ;
        
        $this->db_santander->truncate("f2")                                                                 ;
        $this->db_santander->query($this->f2)                                                               ;
      //  echo '<li class="list-group-item">f2 <span class="badge">OK</span></li>'                        ;
        
        $this->db_santander->truncate("f3")                                                                 ;
        $this->db_santander->query($this->f3)                                                               ;
      //  echo '<li class="list-group-item">f3 <span class="badge">OK</span></li>'                        ;
        
        $this->db_santander->query($this->update_carga_telefonos)                                           ;
      //  echo '<li class="list-group-item">update_carga_telefonos <span class="badge">OK</span></li>'    ;
        
        $this->db_santander->query($this->update_carga_producto)                                            ;
      //  echo '<li class="list-group-item">update_carga_producto <span class="badge">OK</span></li>'    ;
       $r_c = $this->db_santander->query($this->resumen_carga)                                              ;
       $data_html="";
       $r_c=$r_c->result_array()            ;
       foreach ($r_c as $key => $value) {
           $r=$key;
           $data_html.='<li class="list-group-item">'.$value["CEDENTE"].'<span class="badge">'.$value["CuentaDeCEDENTE"].'</span></li>'      ;
       }
       
       
       
        
        
       $this->data_html=$data_html;
    }
    
    public function querys_bn1() {
        $this->base_deuda =  load_query_file
                (
                $this->model_path.'/santander/querys/base_deuda.sql'
                );
        $this->base_direccion =  load_query_file
                (
                $this->model_path.'/santander/querys/base_direccion.sql'
                );
        
        $this->base_telefonos_f1 =  load_query_file
                (
                $this->model_path.'/santander/querys/base_telefonos_f1.sql'
                );
        
        $this->base_telefonos_f2 =  load_query_file
                (
                $this->model_path.'/santander/querys/base_telefonos_f2.sql'
                );
        
        $this->base_telefonos_f3 =  load_query_file
                (
                $this->model_path.'/santander/querys/base_telefonos_f3.sql'
                );
        
        $this->base_telefonos_f4 =  load_query_file
                (
                $this->model_path.'/santander/querys/base_telefonos_f4.sql'
                );
        
        $this->base_telefonos_f5 =  load_query_file
                (
                $this->model_path.'/santander/querys/base_telefonos_f5.sql'
                );
        
        $this->base_telefonos_f6 =  load_query_file
                (
                $this->model_path.'/santander/querys/base_telefonos_f6.sql'
                );
        
        $this->base_telefonos_f7 =  load_query_file
                (
                $this->model_path.'/santander/querys/base_telefonos_f7.sql'
                );
        
        $this->base_telefonos_bn1 =  load_query_file
                (
                $this->model_path.'/santander/querys/base_telefonos_bn1.sql'
                );
        
        $this->base_telefonos_bnf =  load_query_file
                (
                $this->model_path.'/santander/querys/base_telefonos_bnf.sql'
                );
        
        /*$this->base_telefonos_st1 =  load_query_file
                (
                $this->model_path.'/santander/querys/base_telefonos_st1.sql'
                );
        
        $this->base_telefonos_std =  load_query_file
                (
                $this->model_path.'/santander/querys/base_telefonos_std.sql'
                );*/
        
        $this->load_query_export();
    }
    
    public function  load_query_export()
    {
        $this->exportar_deuda =  load_query_file
                (
                $this->model_path.'/santander/querys/exportar_deuda.sql'
                );
        
        $this->exportar_direccion =  load_query_file
                (
                $this->model_path.'/santander/querys/exportar_direccion.sql'
                );
        
         $this->exportar_telefonos =  load_query_file
                (
                $this->model_path.'/santander/querys/exportar_telefonos.sql'
                );
    }

    public function proc_bn1()
    {
        $this->querys_bn1()                                     ;
        $this->db_santander->truncate("base_deuda")             ;
        $this->db_santander->query($this->base_deuda)           ;
        $this->db_santander->truncate("base_direccion")         ;
        $this->db_santander->query($this->base_direccion)       ;
        $this->db_santander->truncate("base_telefonos")         ;
        $this->db_santander->query($this->base_telefonos_f1)    ; 
        $this->db_santander->query($this->base_telefonos_f2)    ;
        $this->db_santander->query($this->base_telefonos_f3)    ;
        $this->db_santander->query($this->base_telefonos_f4)    ;
        $this->db_santander->query($this->base_telefonos_f5)    ;
        $this->db_santander->query($this->base_telefonos_f6)    ;
        $this->db_santander->query($this->base_telefonos_f7)    ;
        
        $this->db_santander->truncate("base_telefonos_formato")  ;
        $this->db_santander->query($this->base_telefonos_bn1)    ;
     /* 
        $this->db_santander->query($this->base_telefonos_bnf)    ;
        $this->db_santander->query($this->base_telefonos_st1)    ;
        $this->db_santander->query($this->base_telefonos_std)    ;
     */ 
        
       
        
        $this->exportaciones_();
         
        
        /*$this->querys_bnf()                                       ;
        $this->db_santander->truncate("base_deuda")                 ;
        $this->db_santander->query($this->base_deuda_bnf)           ;*/
       // echo "proc2!";
    }
    
    public function exportaciones_()
    {
        $e_d=$this->db_santander->query($this->exportar_deuda)    ;
        $e_d=$e_d->result_array()            ;
        $this->csv_carbdd=generateCsv($e_d);
        
        $e_d=$this->db_santander->query($this->exportar_direccion)    ;
        $e_d=$e_d->result_array()            ;
        $this->csv_direccion=generateCsv($e_d);
        
        $e_t=$this->db_santander->query($this->exportar_telefonos)    ;
        $e_t=$e_t->result_array()            ;
        $this->csv_telefonos=generateCsv($e_t);
        
        
    }
    
    
    public function proc_bnf() {
        $this->querys_bnf();
        $this->db_santander->truncate("base_deuda")                             ;
        $this->db_santander->query($this->base_deuda_bnf)                       ;
        
        $this->db_santander->truncate("base_direccion")                         ;
        $this->db_santander->query($this->base_direccion_bnf)                   ;
        
        $this->db_santander->truncate("BASE_TELEFONOS_FORMATO")                 ;
        $this->db_santander->query($this->base_telefonos_formato_bnf)           ;
        
         $this->exportaciones_();
     //   echo "proc_bnf";
    }
    
    public function querys_bnf()
    {
        $this->base_deuda_bnf =  load_query_file
        (
        $this->model_path.'/santander/querys/bnf/base_deuda.sql'
        );
        
        $this->base_direccion_bnf =  load_query_file
        (
        $this->model_path.'/santander/querys/bnf/base_direccion.sql'
        );
        
        $this->base_telefonos_formato_bnf =  load_query_file
        (
        $this->model_path.'/santander/querys/bnf/base_telefonos_bnf.sql'
        );
        
        $this->load_query_export();
    }
    
    
    public function proc_st1()
    {
        $this->querys_st1();
        $this->db_santander->truncate("base_deuda")                             ;
        $this->db_santander->query($this->base_deuda_st1)                       ;
        
        $this->db_santander->truncate("base_direccion")                         ;
        $this->db_santander->query($this->base_direccion_st1)                   ;
        
        $this->db_santander->truncate("BASE_TELEFONOS_FORMATO")                 ;
        $this->db_santander->query($this->base_telefonos_formato_st1)           ;
        
         $this->exportaciones_();
        
    }
    
    public function querys_st1()
    {
         $this->base_deuda_st1 =  load_query_file
        (
        $this->model_path.'/santander/querys/st1/base_deuda.sql'
        );
        
        $this->base_direccion_st1 =  load_query_file
        (
        $this->model_path.'/santander/querys/st1/base_direccion.sql'
        );
        
        $this->base_telefonos_formato_st1 =  load_query_file
        (
        $this->model_path.'/santander/querys/st1/base_telefonos_st1.sql'
        );
        
        $this->load_query_export();
    }
    
    public function proc_std()
    {
        $this->querys_std();
        $this->db_santander->truncate("base_deuda")                             ;
        $this->db_santander->query($this->base_deuda_std)                       ;
        
        $this->db_santander->truncate("base_direccion")                         ;
        $this->db_santander->query($this->base_direccion_std)                   ;
        
        $this->db_santander->truncate("BASE_TELEFONOS_FORMATO")                 ;
        $this->db_santander->query($this->base_telefonos_formato_std)           ;
        
         $this->exportaciones_();
        
    }
    
     public function querys_std()
    {
         $this->base_deuda_std =  load_query_file
        (
        $this->model_path.'/santander/querys/std/base_deuda.sql'
        );
        
        $this->base_direccion_std =  load_query_file
        (
        $this->model_path.'/santander/querys/std/base_direccion.sql'
        );
        
        $this->base_telefonos_formato_std =  load_query_file
        (
        $this->model_path.'/santander/querys/std/base_telefonos_std.sql'
        );
        
        $this->load_query_export();
    }
    
    public function cuadratura($fecha_carga="") {
        $model_path=APPPATH."models";
        $variables=array
            (
            "%fecha%"   =>  $fecha_carga
            );
        $this->sql_data_cuadratura=  load_query_file
                (
                $model_path.'/santander/querys/cuadratura/get_data.sql',
                $variables
                );
            $this->db_CNB->truncate("CUADRATURA_BANCO_SANTANDER")                             ;
            $r_c =   $this->db_santander->query($this->sql_data_cuadratura)                ;
            $r_c =   $r_c->result_array()                                                  ;
            
            
            $datos_array= construir_array_de_inserts($r_c,"CUADRATURA_BANCO_SANTANDER");
    
   foreach ($datos_array as $key => $value) {
       $this->db_CNB->query($value);
   }
   
    }
}
