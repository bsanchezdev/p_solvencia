<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of financoop
 *
 * @author Desarrollo
 */
class Financoop extends CI_Model{
    var $insertados=array();
    var $db_saturno="";
    var $ruta="//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\FIC_CARSIT\Salida";
    public function __construct() {
        parent::__construct();
        $this->model_path=APPPATH."models";
      $this->load_saturno(); 
      $this->load_operaciones();
        $this->load->helper("caracteres");
        $this->load->helper("sql_construct");
    }
    
    public function anexar_DW()
    {
          $this->load_saturno(); 
          
    }
    
    public function load_saturno() {
         $this->db_saturno = $this->load->database('odbc', TRUE);
    }
    public function load_operaciones() {
         $this->db_operaciones = $this->load->database('operaciones', TRUE);
    }
    public function importar($tabla,$data,$c_archivo)
    {
        $this->db->truncate($tabla);
        
       /* $tablam=  str_replace("dia", "mes", $tabla);
        $this->db->truncate($tablam);
        $tablam=  str_replace("mes", "dia", $tabla);
        $this->db->truncate($tablam);*/
        
        $this->c_archivo=$c_archivo;
        if(count($data)>0):
           $query= $this->insert_batch__($tabla,$data);
        endif;
    }
    
    protected function insert_batch__c($tabla,$array)
    {
        $contar_dir=0;
        $datasql="";
        $tabla_sql="";
        $this->db->truncate($tabla);
        $this->insertados[$tabla]=0;
        $data="";
        $contar=0;
        if(strpos($tabla, "cuotas")):
                 $tabla_sql="FINANCOOP_CUOTAS";
             endif;
             if(strpos($tabla, "asignacion")):
                 $tabla_sql="FINANCOOP_ASIGNACION";
             endif;
             if(strpos($tabla, "aval")):
                 $tabla_sql="FINANCOOP_AVAL";
             endif;
             if(strpos($tabla, "deuda")):
                 $tabla_sql="FINANCOOP_DEUDA";
             endif;
            if(strpos($tabla, "direccion")):
                 $tabla_sql="FINANCOOP_DIRECCION";
             endif;
             if(strpos($tabla, "pagos")):
                 $tabla_sql="FINANCOOP_PAGOS";
             endif;
             if(strpos($tabla, "socios")):
                 $tabla_sql="FINANCOOP_SOCIOS";
             endif;
             if(strpos($tabla, "telefonos")):
                 $tabla_sql="FINANCOOP_TELEFONOS";
             endif;
             
          //   $this->set_status(0,count($array));
        foreach ($array as $key => $value) {
           //  $this->set_status($key+1,count($array));
            $value[]=$this->c_archivo;
            if(count($array[$key])>2):
                
            
            $data.="(";
            $lin="(";
            $c_lin=0;
            foreach ($value as $key_ => $value_) {
               $value_=  str_replace("'", '´', $value_);
               if($tabla=="mes_deuda"):
                    if($key_==6):
                        else:
                        $data.="'".f_remove_odd_characters($value_)."',";
                    
                    endif;
               else:
               $data.="'".f_remove_odd_characters($value_)."',";
               endif;
               
            }
            $data=trim($data,",");
            $data=$data.")," ;
             
          
         $data=htmlspecialchars($data);
         
            $contar++;
            if($contar==1):
                $datasql=trim($data,",");
          /*  if($tabla=="mes_direccion"):
                $contar_dir++;
            if($contar_dir==4):
               echo "insert into $tabla values $datasql";
            endif;
            endif;*/
            $this->db->query("insert into $tabla values $datasql");
            
            if($tabla_sql=="FINANCOOP_PAGOS"):
               // echo "insert into $tabla values $datasql";
            endif;
              $this->db_saturno->query("insert into $tabla_sql values $datasql");
              
              $data="";
              $contar=0;
            else:
                $datasql="";
            endif;
         //   $data="";
            endif;
        }
        $datasql=trim($data,",");
        if($tabla=="dia_telefonos"):
            //    echo "insert into $tabla values $datasql";
            endif;
      //   $this->db->query("insert into $tabla values $datasql");
          
        //      $this->db_saturno->query("insert into $tabla_sql values ".f_remove_odd_characters($datasql));
               
                 $datasql=htmlspecialchars($datasql);
              $count=$this->db->query("select count(*) as total from $tabla")->result_array();
                $this->insertados[$tabla]=  $count[0]["total"];
               
    }
 
     protected function insert_batch__($tabla,$array)
    {
        $contar_dir=0;
        $datasql="";
        $tabla_sql="";
        $this->db->truncate($tabla);
        $this->insertados[$tabla]=0;
        $data="";
        $contar=0;
        if(strpos($tabla, "cuotas")):
                 $tabla_sql="FINANCOOP_CUOTAS";
             endif;
             if(strpos($tabla, "asignacion")):
                 $tabla_sql="FINANCOOP_ASIGNACION";
             endif;
             if(strpos($tabla, "aval")):
                 $tabla_sql="FINANCOOP_AVAL";
             endif;
             if(strpos($tabla, "deuda")):
                 $tabla_sql="FINANCOOP_DEUDA";
             endif;
            if(strpos($tabla, "direccion")):
                 $tabla_sql="FINANCOOP_DIRECCION";
             endif;
             if(strpos($tabla, "pagos")):
                 $tabla_sql="FINANCOOP_PAGOS";
             endif;
             if(strpos($tabla, "socios")):
                 $tabla_sql="FINANCOOP_SOCIOS";
             endif;
             if(strpos($tabla, "telefonos")):
                 $tabla_sql="FINANCOOP_TELEFONOS";
             endif;
             
          //   $this->set_status(0,count($array));
        foreach ($array as $key => $value) {
           //  $this->set_status($key+1,count($array));
            $value[]=$this->c_archivo;
            if(count($array[$key])>2):
                
            
            $data.="(";
            $lin="(";
            $c_lin=0;
            foreach ($value as $key_ => $value_) {
               $value_=  str_replace("'", '´', $value_);
               if($tabla=="mes_deuda"):
                    if($key_==6):
                        else:
                        $data.="'".f_remove_odd_characters($value_)."',";
                    
                    endif;
               else:
               $data.="'".f_remove_odd_characters($value_)."',";
               endif;
               
            }
            $data=trim($data,",");
            $data=$data.")," ;
             
          
         $data=htmlspecialchars($data);
         
            $contar++;
            if($contar==1000):
                $datasql=trim($data,",");
          /*  if($tabla=="mes_direccion"):
                $contar_dir++;
            if($contar_dir==4):
               echo "insert into $tabla values $datasql";
            endif;
            endif;*/
            $this->db->query("insert IGNORE into $tabla values $datasql");
            
            if($tabla_sql=="FINANCOOP_PAGOS"):
               // echo "insert into $tabla values $datasql";
            endif;
              $this->db_saturno->query("insert into $tabla_sql values $datasql");
              
              $data="";
              $contar=0;
            else:
                $datasql="";
            endif;
         //   $data="";
            endif;
        }
        $datasql=trim($data,",");
        if($tabla=="dia_telefonos"):
            //    echo "insert into $tabla values $datasql";
            endif;
         $this->db->query("insert IGNORE into $tabla values $datasql");
          
              $this->db_saturno->query("insert into $tabla_sql values ".f_remove_odd_characters($datasql));
               
                 $datasql=htmlspecialchars($datasql);
              $count=$this->db->query("select count(*) as total from $tabla")->result_array();
                $this->insertados[$tabla]=  $count[0]["total"];
               
    }
    protected function set_status($init,$total)
    {
    $this->status_total=$total;
    $this->status_actual=$init; 
 //   echo BASEPATH;
     
    write_file(BASEPATH.'../status/satus_init.stat', $init, 'w+');
    write_file(BASEPATH.'../status/satus_total.stat', $total, 'w+');
    
  
    }
    
    public function leer_init() {
        $cadena = read_file(BASEPATH.'../status/satus_init.stat');
        echo $cadena;
    }
    public function leer_total() {
        $cadena = read_file(BASEPATH.'../status/satus_total.stat');
        echo $cadena;
    }
    public function borrar_para_total() {
        
        $tablas =   array
            (
            "total_aval",
            "total_cuotas",
            "total_deuda",
            "total_direccion",
            "total_socios",
            "total_telefonos"
            );
            foreach ($tablas as $key => $value) {$this->db->truncate($value);}
    }
    
    public function anexar_para_total()
    {
    /*
    INSERT INTO TOTAL_AVAL ( RutCliente, Nombre_Cliente, Apellido_Paterno, Apellido_Materno, Fecha_nacimiento, Sexo, Actividad_Profesión, Antigüedad_laboral, Estado_civil, Tipo_Personalidad, Fecha_ingreso_socio, Archivo )
    SELECT DIA_AVAL.RutCliente, DIA_AVAL.Nombre_Cliente, DIA_AVAL.Apellido_Paterno, DIA_AVAL.Apellido_Materno, DIA_AVAL.Fecha_nacimiento, DIA_AVAL.Sexo, DIA_AVAL.Actividad_Profesión, DIA_AVAL.Antigüedad_laboral, DIA_AVAL.Estado_civil, DIA_AVAL.Tipo_Personalidad, DIA_AVAL.Fecha_ingreso_socio, DIA_AVAL.Archivo
    FROM DIA_AVAL;
    */
    $query=
            array(
                "INSERT IGNORE INTO TOTAL_AVAL ( RutCliente, Nombre_Cliente, Apellido_Paterno, Apellido_Materno, Fecha_nacimiento, Sexo, Actividad_Profesión, Antigüedad_laboral, Estado_civil, Tipo_Personalidad, Fecha_ingreso_socio, Archivo )
                 SELECT DIA_AVAL.RutCliente, DIA_AVAL.Nombre_Cliente, DIA_AVAL.Apellido_Paterno, DIA_AVAL.Apellido_Materno, DIA_AVAL.Fecha_nacimiento, DIA_AVAL.Sexo, DIA_AVAL.Actividad_Profesión, DIA_AVAL.Antigüedad_laboral, DIA_AVAL.Estado_civil, DIA_AVAL.Tipo_Personalidad, DIA_AVAL.Fecha_ingreso_socio, DIA_AVAL.Archivo
                 FROM DIA_AVAL;
                ",
                "INSERT IGNORE INTO TOTAL_CUOTAS ( RutCliente, Operación, Numero_de_Cuota, Estado_de_la_cuota, Monto_Cuota, Fecha_de_Vencimiento, Fecha_del_Pago_de_la_cuota, Archivo )
                 SELECT DIA_CUOTAS.RutCliente, DIA_CUOTAS.Operación, DIA_CUOTAS.Numero_de_Cuota, DIA_CUOTAS.Estado_de_la_cuota, DIA_CUOTAS.Monto_Cuota, DIA_CUOTAS.Fecha_de_Vencimiento, DIA_CUOTAS.Fecha_del_Pago_de_la_cuota, DIA_CUOTAS.Archivo
                 FROM DIA_CUOTAS;
                ",
                "INSERT IGNORE INTO TOTAL_DEUDA ( RutCliente, Rut_Aval, Linea_de_Negocio, Producto, Operación, Estado_de_la_operación, Fecha_de_Castigo, Monto_crédito_original, Monto_saldo_insoluto, Codigo_Moneda, Cuota_Inicial, Cuota_Final, Fecha_Vencimiento_inicial, Fecha_Vencimiento_final, Monto_Cuota, Codigo_Convenio_mandante, Sucursal_mandante, Clasificación_DECOOP, Provisión, Archivo )
                 SELECT DIA_DEUDA.RutCliente, DIA_DEUDA.Rut_Aval, DIA_DEUDA.Linea_de_Negocio, DIA_DEUDA.Producto, DIA_DEUDA.Operación, DIA_DEUDA.Estado_de_la_operación, DIA_DEUDA.Fecha_de_Castigo, DIA_DEUDA.Monto_crédito_original, DIA_DEUDA.Monto_saldo_insoluto, DIA_DEUDA.Codigo_Moneda, DIA_DEUDA.Cuota_Inicial, DIA_DEUDA.Cuota_Final, DIA_DEUDA.Fecha_Vencimiento_inicial, DIA_DEUDA.Fecha_Vencimiento_final, DIA_DEUDA.Monto_Cuota, DIA_DEUDA.Codigo_Convenio_mandante, DIA_DEUDA.Sucursal_mandante, DIA_DEUDA.Clasificación_DECOOP, DIA_DEUDA.Provisión, DIA_DEUDA.Archivo
                 FROM DIA_DEUDA;
                ",
                "INSERT IGNORE INTO TOTAL_DIRECCION ( RutCliente, Tipo_de_dirección, Direccion_, Comuna_, Ciudad, Región, Archivo )
                SELECT DIA_DIRECCION.RutCliente, DIA_DIRECCION.Tipo_de_dirección, DIA_DIRECCION.Direccion_, DIA_DIRECCION.Comuna_, DIA_DIRECCION.Ciudad, DIA_DIRECCION.Región, DIA_DIRECCION.Archivo
                FROM DIA_DIRECCION;
                ",
                "INSERT IGNORE INTO TOTAL_SOCIOS ( RutCliente, Nombre_Cliente, Apellido_Paterno, Apellido_Materno, Fecha_nacimiento, Sexo, Actividad_Profesión, Antigüedad_laboral, Estado_civil, Tipo_Personalidad, Fecha_ingreso_socio, Archivo )
                 SELECT DIA_SOCIOS.RutCliente, DIA_SOCIOS.Nombre_Cliente, DIA_SOCIOS.Apellido_Paterno, DIA_SOCIOS.Apellido_Materno, DIA_SOCIOS.Fecha_nacimiento, DIA_SOCIOS.Sexo, DIA_SOCIOS.Actividad_Profesión, DIA_SOCIOS.Antigüedad_laboral, DIA_SOCIOS.Estado_civil, DIA_SOCIOS.Tipo_Personalidad, DIA_SOCIOS.Fecha_ingreso_socio, DIA_SOCIOS.Archivo
                 FROM DIA_SOCIOS;
                ",
                "INSERT IGNORE INTO TOTAL_TELEFONOS ( RutCliente, Tipo_de_telefóno, Código_de_área, Teléfono_, Archivo )
                 SELECT DIA_TELEFONOS.RutCliente, DIA_TELEFONOS.Tipo_de_telefóno, DIA_TELEFONOS.Código_de_área, DIA_TELEFONOS.Teléfono_, DIA_TELEFONOS.Archivo
                 FROM DIA_TELEFONOS;
                ", //FIN DIAS
                "INSERT IGNORE INTO TOTAL_AVAL ( RutCliente, Nombre_Cliente, Apellido_Paterno, Apellido_Materno, Fecha_nacimiento, Sexo, Actividad_Profesión, Antigüedad_laboral, Estado_civil, Tipo_Personalidad, Fecha_ingreso_socio, Archivo )
                 SELECT MES_AVAL.RutCliente, MES_AVAL.Nombre_Cliente, MES_AVAL.Apellido_Paterno, MES_AVAL.Apellido_Materno, MES_AVAL.Fecha_nacimiento, MES_AVAL.Sexo, MES_AVAL.Actividad_Profesión, MES_AVAL.Antigüedad_laboral, MES_AVAL.Estado_civil, MES_AVAL.Tipo_Personalidad, MES_AVAL.Fecha_ingreso_socio, MES_AVAL.Archivo
                 FROM MES_AVAL;
                ",
                "INSERT IGNORE INTO TOTAL_CUOTAS ( RutCliente, Operación, Numero_de_Cuota, Estado_de_la_cuota, Monto_Cuota, Fecha_de_Vencimiento, Fecha_del_Pago_de_la_cuota, Archivo )
                 SELECT MES_CUOTAS.RutCliente, MES_CUOTAS.Operación, MES_CUOTAS.Numero_de_Cuota, MES_CUOTAS.Estado_de_la_cuota, MES_CUOTAS.Monto_Cuota, MES_CUOTAS.Fecha_de_Vencimiento, MES_CUOTAS.Fecha_del_Pago_de_la_cuota, MES_CUOTAS.Archivo
                 FROM MES_CUOTAS;
                ",
                "INSERT IGNORE INTO TOTAL_DEUDA ( RutCliente, Rut_Aval, Linea_de_Negocio, Producto, Operación, Estado_de_la_operación, Fecha_de_Castigo, Monto_crédito_original, Monto_saldo_insoluto, Codigo_Moneda, Cuota_Inicial, Cuota_Final, Fecha_Vencimiento_inicial, Fecha_Vencimiento_final, Monto_Cuota, Codigo_Convenio_mandante, Sucursal_mandante, Clasificación_DECOOP, Provisión, Archivo )
                 SELECT MES_DEUDA.RutCliente, MES_DEUDA.Rut_Aval, MES_DEUDA.Linea_de_Negocio, MES_DEUDA.Producto, MES_DEUDA.Operación, MES_DEUDA.Estado_de_la_operación, MES_DEUDA.Fecha_de_Castigo, MES_DEUDA.Monto_crédito_original, MES_DEUDA.Monto_saldo_insoluto, MES_DEUDA.Codigo_Moneda, MES_DEUDA.Cuota_Inicial, MES_DEUDA.Cuota_Final, MES_DEUDA.Fecha_Vencimiento_inicial, MES_DEUDA.Fecha_Vencimiento_final, MES_DEUDA.Monto_Cuota, MES_DEUDA.Codigo_Convenio_mandante, MES_DEUDA.Sucursal_mandante, MES_DEUDA.Clasificación_DECOOP, MES_DEUDA.Provisión, MES_DEUDA.Archivo
                 FROM MES_DEUDA;
                ",
                "INSERT IGNORE INTO TOTAL_DIRECCION ( RutCliente, Tipo_de_dirección, Direccion_, Comuna_, Ciudad, Región, Archivo )
                 SELECT MES_DIRECCION.RutCliente, MES_DIRECCION.Tipo_de_dirección, MES_DIRECCION.Direccion_, MES_DIRECCION.Comuna_, MES_DIRECCION.Ciudad, MES_DIRECCION.Región, MES_DIRECCION.Archivo
                 FROM MES_DIRECCION;
                ",
                "INSERT IGNORE INTO TOTAL_SOCIOS ( RutCliente, Nombre_Cliente, Apellido_Paterno, Apellido_Materno, Fecha_nacimiento, Sexo, Actividad_Profesión, Antigüedad_laboral, Estado_civil, Tipo_Personalidad, Fecha_ingreso_socio, Archivo )
                 SELECT MES_SOCIOS.RutCliente, MES_SOCIOS.Nombre_Cliente, MES_SOCIOS.Apellido_Paterno, MES_SOCIOS.Apellido_Materno, MES_SOCIOS.Fecha_nacimiento, MES_SOCIOS.Sexo, MES_SOCIOS.Actividad_Profesión, MES_SOCIOS.Antigüedad_laboral, MES_SOCIOS.Estado_civil, MES_SOCIOS.Tipo_Personalidad, MES_SOCIOS.Fecha_ingreso_socio, MES_SOCIOS.Archivo
                 FROM MES_SOCIOS;
                ",
                "INSERT IGNORE INTO TOTAL_TELEFONOS ( RutCliente, Tipo_de_telefóno, Código_de_área, Teléfono_, Archivo )
                 SELECT MES_TELEFONOS.RutCliente, MES_TELEFONOS.Tipo_de_telefóno, MES_TELEFONOS.Código_de_área, MES_TELEFONOS.Teléfono_, MES_TELEFONOS.Archivo
                 FROM MES_TELEFONOS;
                "
                );
    foreach ($query as $key => $value) {
        $this->db->query($value);
      //  $this->db->_error_message();
    }
   
    }
    
    
    //paso2
    
    public function p2()
    {
        /*
DELETE CARGA.RUT, CARGA.DV, CARGA.NOMBRE, CARGA.OPERACIÓN, CARGA.CUOTA, CARGA.PRODUCTO, CARGA.[VENCE(AAAAMMDD)], CARGA.MONTO, CARGA.DIRECCIÓN, CARGA.COMUNA, CARGA.T1, CARGA.CA1, CARGA.F1, CARGA.T2, CARGA.CA2, CARGA.F2, CARGA.T3, CARGA.CA3, CARGA.F3, CARGA.T4, CARGA.CA4, CARGA.F4, CARGA.T5, CARGA.CA5, CARGA.F5, CARGA.T6, CARGA.CA6, CARGA.F6, CARGA.T7, CARGA.CA7, CARGA.F7, CARGA.MARCA, CARGA.CEDENTE, CARGA.ORIGEN
FROM CARGA;

         */
        $this->db->truncate("carga");
        
     $this->anexa_carga_ap =  load_query_file
     ( $this->model_path.'/financoop/paso2/anexa_carga_ap.sql')   ;
     $this->db->query($this->anexa_carga_ap)            ;
        
        
$this->anexa_carga_al= load_query_file
     ( $this->model_path.'/financoop/paso2/anexa_carga_al.sql')     ;
     $this->db->query($this->anexa_carga_al)                        ;

$this->anexa_telefonos=load_query_file
     ( $this->model_path.'/financoop/paso2/anexa_telefonos.sql')     ;
     $this->db->query($this->anexa_telefonos)                        ;



$this->db->truncate("base_deuda");
$carbdd='';
$this->base_deuda=load_query_file
     ( $this->model_path.'/financoop/paso2/base_deuda.sql')     ;
     $this->db->query($this->base_deuda)                        ;


//$this->db->query($carbdd);
$carbdd_csv='SELECT *
FROM base_deuda
INTO OUTFILE "d:\carbdd-out.csv"';
//$this->db->query($carbdd_csv);

//copy("d:\carbdd-out.csv", $ruta."\\carbdd_out.csv");
$query = $this->db->query("SELECT * FROM base_deuda");
$data=$query->result_array() ;

$r=generateCsv($data);

if ( ! write_file($this->ruta."\\carbdd.txt", $r))
{
     echo '<div class="label label-danger">Error al crear CARBDD</div>';
}
else
{
     echo '<div class="label label-success">CARBDD Creado</div>';
}


$this->traer_fic_marca();
    }
   
    protected function traer_fic_marca()
    {
         $this->db_operaciones->truncate('FIC_MARCA');
        $this->set_marcas=load_query_file
     ( $this->model_path.'/financoop/fic_marcas/set_marcas.sql')     ;
        $this->db_operaciones->query($this->set_marcas);
        /*
        $set_marcas=  'DROP TABLE OPERACIONES.DBO.FIC_MARCA
SELECT Operacion,Linea_de_Negocio,Producto
INTO	OPERACIONES.DBO.FIC_MARCA
FROM CEDENTES.DBO.FINANCOOP_DEUDA
WHERE FECHA_CARGA=(SELECT MAX(FECHA_CARGA) FROM CEDENTES.DBO.FINANCOOP_DEUDA)
GROUP BY Operacion,Linea_de_Negocio,Producto';
        $this->db_operaciones->query($set_marcas);
        */
        
        
        $fic_marca='select * from OPERACIONES.DBO.FIC_MARCA';
        
        $query = $this->db_operaciones->query($fic_marca);
$data=$query->result_array() ;
$this->db->truncate("fic_marca");
foreach ($data as $key => $value) {
  //  $this->db->insert_batch('fic_marca', $value);
    $this->db->insert('fic_marca', $data[$key]); 
}


        
        
        
        
        
        
        $marca_salida='insert IGNORE into marca_salida SELECT
	"FIC" AS cod_empresa,
	FIC_MARCA.Operacion AS num_operacion,
	LEFT (
		MANTENEDOR_NEGOCIO.NEG_GLO,
		40
	) AS obs_cheque_protestado,
	"" AS monto_cheq_protestado,
	"" AS cod_cartera,
	"" AS anho,
	"" AS semestre,
	LEFT (
		MANTENEDOR_PRODUCTO.PRO_GLO,
		24
	) AS descripcion_cuota 
FROM
	(
		FIC_MARCA
		INNER JOIN MANTENEDOR_NEGOCIO ON FIC_MARCA.Linea_de_Negocio = MANTENEDOR_NEGOCIO.NEG_COD
	)
INNER JOIN MANTENEDOR_PRODUCTO ON FIC_MARCA.Producto = MANTENEDOR_PRODUCTO.PROD_COD;';
$this->db->truncate("marca_salida");
$this->db->query($marca_salida);

$query = $this->db->query("SELECT *
FROM marca_salida");
$data=$query->result_array() ;

$r=generateCsv($data);
if ( ! write_file($this->ruta."\\marca_salida.txt", $r))
{
     echo '<p><div class="label label-danger">Error al crear Marca Salida</div>';
}
else
{
     echo '<p><div class="label label-success">Marca Salida Creado</div>';
}
    }
}
