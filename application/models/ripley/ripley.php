<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ripley
 *
 * @author Desarrollo
 */
class Ripley extends CI_Model {
    var $ruta="//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\RP9_CARSIT";
    public function __construct() {
        parent::__construct();
          $this->db_saturno         = $this->load
                                        ->database('odbc', TRUE)            ;
          $this->db_ripley_sitrel   = $this->load
                                        ->database('ripley_sitrel', TRUE)   ;
          
          $this->db_CNB             = $this->load
                                        ->database('CNB', TRUE)   ;
          
          
    }
    
    protected function querys_paso1() {
        $this->input_query="INSERT INTO INPUT (
	RUT,
	DV,
	NOMBRE,
	OPERACION,
	CUOTA,
	PRODUCTO,
	VENCE,
	MONTO,
	DIRECCION,
	COMUNA,
	F1,
	F3,
	MARCA,
	CEDENTE
) SELECT
	BASE_CEDENTE.Rut,
	BASE_CEDENTE.Dv,
	BASE_CEDENTE.NOMBRES,
	concat(
		BASE_CEDENTE.NroOperacion,
		BASE_CEDENTE.Fte
	) AS Expr1,
	CONCAT(
		YEAR (BASE_CEDENTE.FechaCastigo),

	IF (
		MONTH (BASE_CEDENTE.FechaCastigo) <= 9,
		CONCAT(
			'0',
			MONTH (BASE_CEDENTE.FechaCastigo)
		),
		MONTH (BASE_CEDENTE.FechaCastigo)
	)
	) AS Expr3,
	'JUDICI' AS Expr4,
	CONCAT(
		YEAR (BASE_CEDENTE.FechaCastigo),
		CONCAT(

			IF (
				MONTH (BASE_CEDENTE.FechaCastigo) <= 9,
				CONCAT(
					'0',
					MONTH (BASE_CEDENTE.FechaCastigo)
				),
				MONTH (BASE_CEDENTE.FechaCastigo)
			),

		IF (
			DAY (BASE_CEDENTE.FechaCastigo) <= 9,
			CONCAT(
				'0',
				DAY (BASE_CEDENTE.FechaCastigo)
			),
			DAY (BASE_CEDENTE.FechaCastigo)
		)
		)
	) AS Expr2,
	BASE_CEDENTE.Saldo_Final_Cobrar,
	BASE_CEDENTE.PA_DIRECCION,
	BASE_CEDENTE.PA_COMUNA_DESC,
	BASE_CEDENTE.FONO_PARTICULAR,
	BASE_CEDENTE.FONO_CELULAR,
	BASE_CEDENTE.MARCA,
	'RP9' AS Expr6
FROM
	BASE_CEDENTE;";
        
        $this->base_deuda='
        INSERT INTO BASE_DEUDA (
	RUT,
	DV,
	NOMBRE,
	direcc,
	telefono,
	ciudad,
	comuna,
	OPERACION,
	CUOTA,
	PRODUCTO,
	VENCE, 
  moneda,
	MONTO,
	sucursal,
	cartera,
	sald_ins,
	tipo_deu,
	descrip,
	montoopera,
	observacio,
	categoria,
	segmento,
	año,
	tipo_cred,
	semestre,
	MontoChequeProtestado
)    
        SELECT
	RUT AS Expr1,
	DV AS Expr2,
	NOMBRE AS Expr3,
	"" AS direcc,
	"" AS telefono,
	"" AS ciudad,
	"" AS comuna,
	OPERACION AS Expr4,
	CUOTA AS Expr5,
	PRODUCTO AS Expr6,
	VENCE AS Expr7,
	1 AS moneda,
	MONTO AS Expr8,
	"MATRIZ" AS sucursal,
	"" AS cartera,
	"0" AS sald_ins,
	"D" AS tipo_deu,
	"" AS descrip,
	"0" AS montoopera,
	"" AS observacio,
	"" AS categoria,
	"" AS segmento,
	"" AS año,
	"" AS tipo_cred,
	MARCA AS Expr9,
	"0" AS MontoChequeProtestado
FROM
	INPUT;

';
        
        $this->base_direccion='INSERT INTO BASE_DIRECCION (
	RUT,
	DV,
	TIPO_DIRECCION, 
	DIRECCION,
	CODIGO_COMUNA
) SELECT
	RUT AS Expr1,
	DV AS Expr2,
	1 AS "TIPO_DIRECCION", 
  DIRECCION AS Expr3,
	sitrel_zona_geografica.CodZona AS "CODIGO_COMUNA"
FROM
	INPUT
LEFT JOIN sitrel_zona_geografica ON INPUT.COMUNA = sitrel_zona_geografica.Nombre
GROUP BY
	RUT,
	DV,
	1,
	DIRECCION,
	sitrel_zona_geografica.CodZona,
	sitrel_zona_geografica.CodNivel
HAVING
	(
		(
			(
				sitrel_zona_geografica.CodZona
			) IS NOT NULL
		)
		AND (
			(
				sitrel_zona_geografica.CodNivel
			) = "COM"
		)
	);

';
        $this->base_telefonos='INSERT INTO BASE_TELEFONOS (
	RUT,
	DV,
	TELEFONO,
	ZONA,
	COMUNA,
	TIPO_TELEFONO,
	CEDENTE
) SELECT
	RUT AS Expr1,
	DV AS Expr2,
	F1 AS Expr3,
	sitrel_zona_geografica.CodZona AS ZONA,
	sitrel_zona_geografica.CodZona AS COMUNA,
	15 AS Expr4,
	CEDENTE AS Expr5
FROM
	INPUT
INNER JOIN sitrel_zona_geografica ON INPUT.COMUNA = sitrel_zona_geografica.Nombre
GROUP BY
	RUT,
	DV,
	F1,
	sitrel_zona_geografica.CodZona,
	sitrel_zona_geografica.CodZona,
	Expr4,
	CEDENTE,
	sitrel_zona_geografica.CodNivel
HAVING
	(
		(
			(
				sitrel_zona_geografica.CodNivel
			) = "COM"
		)
		AND ((INPUT.F1) IS NOT NULL)
	);
';
        
        $this->base_telefonos_celu='INSERT INTO BASE_TELEFONOS (
	RUT,
	DV,
	TELEFONO,
	ZONA,
	COMUNA,
	TIPO_TELEFONO, CEDENTE
) SELECT
	RUT AS Expr1,
	DV AS Expr2,
	F3 AS Expr3,
	sitrel_zona_geografica.CodZona AS ZONA,
	sitrel_zona_geografica.CodZona AS COMUNA,
	16 AS Expr1,
	CEDENTE AS Expr4
FROM
	INPUT
INNER JOIN sitrel_zona_geografica ON INPUT.COMUNA = sitrel_zona_geografica.Nombre
GROUP BY
	RUT,
	DV,
	F3,
	sitrel_zona_geografica.CodZona,
	sitrel_zona_geografica.CodZona,
	Expr4,
	CEDENTE,
	sitrel_zona_geografica.CodNivel
HAVING
	(
		(
			(
				sitrel_zona_geografica.CodNivel
			) = "COM"
		)
		AND ((INPUT.F3) IS NOT NULL)
	);


';
        
        $this->base_telefonos_formato='INSERT INTO BASE_TELEFONOS_FORMATO SELECT 
	BASE_TELEFONOS.RUT,
	BASE_TELEFONOS.DV,
	BASE_TELEFONOS.TELEFONO,
	BASE_TELEFONOS.ZONA,
	BASE_TELEFONOS.COMUNA,
	BASE_TELEFONOS.TIPO_TELEFONO 
FROM
	BASE_TELEFONOS
GROUP BY
	BASE_TELEFONOS.RUT,
	BASE_TELEFONOS.DV,
	BASE_TELEFONOS.TELEFONO,
	BASE_TELEFONOS.ZONA,
	BASE_TELEFONOS.COMUNA,
	BASE_TELEFONOS.TIPO_TELEFONO
HAVING
	(
		(
			(BASE_TELEFONOS.TELEFONO) <> "0"
		)
	);';
    }
        
    public function proces_1() {
        $this->querys_paso1();
        $this->db_ripley_sitrel->trans_begin()                          ;
        $this->db_ripley_sitrel->truncate("input")                      ;
        $this->db_ripley_sitrel->query($this->input_query)              ;
        $this->db_ripley_sitrel->truncate("base_deuda")                 ;
        $this->db_ripley_sitrel->query($this->base_deuda)               ;
        $this->db_ripley_sitrel->truncate("base_direccion")             ;
        $this->db_ripley_sitrel->query($this->base_direccion)           ;
        $this->db_ripley_sitrel->truncate("base_telefonos")             ;
        $this->db_ripley_sitrel->query($this->base_telefonos)           ;
        $this->db_ripley_sitrel->query($this->base_telefonos_celu)      ;
        $this->db_ripley_sitrel->truncate("base_telefonos_formato")     ;
        $this->db_ripley_sitrel->query($this->base_telefonos_formato)   ;
       
        
        if ($this->db_ripley_sitrel->trans_status() === FALSE)
		{			
			//si ha habido algún error lo debemos mostrar aquí
            echo "error en process_1";
                        $this->db_ripley_sitrel->trans_rollback();	
                        return false;
		}else{
			// echo "OK en process_1";
			//en otro caso todo ha ido bien
			$this->db_ripley_sitrel->trans_commit();
                        $this->carbdd();
                        $this->cardir();
                        $this->tmovil();
                        return true;
		}
    }
    
    public function cuadratura($fechacarga="nodef")
    {
         $this->db_CNB->trans_begin()                          ;
         $this->db_CNB->truncate("CUADRATURA_BANCO_RIPLEY");
         $query_cuadratura='SELECT
	BASE_DEUDA.RUT,
	BASE_DEUDA.OPERACION,
	BASE_DEUDA.CUOTA,
	BASE_DEUDA.MONTO,
	"BANCO RIPLEY" AS Expr1,
	"'.$fechacarga.'" AS Expr2
FROM
	BASE_DEUDA;';
         
         $query = $this->db_ripley_sitrel->query($query_cuadratura) ;
    $adata=$query->result_array() ;
    
   // var_dump($data);
   $datos_array= construir_array_de_inserts($adata,"CUADRATURA_BANCO_RIPLEY");
   
   
                
   foreach ($datos_array as $key => $value) {
       $this->db_CNB->query($value);
       if ($this->db_CNB->trans_status() === FALSE)
		{			
			//si ha habido algún error lo debemos mostrar aquí
            echo '<p><div class="label label-danger">Error en insert CUADRATURA</div>';
            echo $this->db_CNB->last_query();
                        $this->db_CNB->trans_rollback();	
                        //return false;
		}else{
			// echo "OK en process_1";
			//en otro caso todo ha ido bien
			$this->db_CNB->trans_commit();
                        $this->db_CNB->trans_begin()                          ;
                           //echo '<p><div class="label label-success">CUADRATURA OK</div>';
                        //return true;
		}
   }
    }
    
public function carbdd() {
    $query = $this->db_ripley_sitrel->query("SELECT * FROM base_deuda") ;
    $data=$query->result_array() ;

$r=generateCsv($data);
if ( ! write_file($this->ruta."\\carbdd.txt", $r))
{
     echo '<p><div class="label label-danger">Error al crear CARBDD</div>';
}
else
{
     echo '<p><div class="label label-success">CARBDD Creado</div>';
}
    }
    
    public function cardir() {
    $query = $this->db_ripley_sitrel->query("SELECT * FROM base_direccion") ;
    $data=$query->result_array() ;

$r=generateCsv($data);
if ( ! write_file($this->ruta."\\cardir.txt", $r))
{
     echo '<p><div class="label label-danger">Error al crear CARDIR</div>';
}
else
{
     echo '<p><div class="label label-success">CARDIR Creado</div>';
}
    }
    
    public function tmovil() {
    $query = $this->db_ripley_sitrel->query("SELECT * FROM base_telefonos_formato") ;
    $data=$query->result_array() ;

$r=generateCsv($data);
if ( ! write_file($this->ruta."\\tmovil.txt", $r))
{
     echo '<p><div class="label label-danger">Error al crear TMOVIL</div>';
}
else
{
     echo '<p><div class="label label-success">TMOVIL Creado</div>';
}
    }
    
    
    
    public function periodo_proc($periodo) {
        $query="SELECT
	BASE_CEDENTE.Fte2,
	BASE_CEDENTE.Fte,
	BASE_CEDENTE.Percast,
	BASE_CEDENTE.TipoProducto,
	BASE_CEDENTE.NroOperacion,
	BASE_CEDENTE.`Rut/Dv`, 
        BASE_CEDENTE.Rut,
	BASE_CEDENTE.Dv,
	BASE_CEDENTE.Tipo_Cobrador,
	BASE_CEDENTE.Cobrador,
	BASE_CEDENTE.Tipo_Cobrador_DIC,
	BASE_CEDENTE.Cobrador_DIC,
	BASE_CEDENTE.FechaCastigo,
	BASE_CEDENTE.MontoCastigado,
	BASE_CEDENTE.MontoRecuperoBruto,
	BASE_CEDENTE.Zona,
	BASE_CEDENTE.Sucursal,
	BASE_CEDENTE.Nombre_Sucursal,
	BASE_CEDENTE.Ruta,
	BASE_CEDENTE.Zona_Asig,
	BASE_CEDENTE.Saldo_Final_Cobrar,
	BASE_CEDENTE.PRE_STATUS,
	BASE_CEDENTE.DESCRIPCION_STATUS,
	BASE_CEDENTE.Basquet,
	BASE_CEDENTE.ContactabTelef90dias, 
  BASE_CEDENTE.Fallecido, 
  BASE_CEDENTE.Inubicable,
	BASE_CEDENTE.AreaInubicable,
	BASE_CEDENTE.Mantener,
	BASE_CEDENTE.Cob_Mantener,
	BASE_CEDENTE.CobranzaJudicial,
  BASE_CEDENTE.Cob_Jud,
	BASE_CEDENTE.PagosUltimos90dias,
	BASE_CEDENTE.EmpleadoRipley,
	BASE_CEDENTE.NOMBRES,
	BASE_CEDENTE.N_REGION_X_DIREC_PART,
	BASE_CEDENTE.NOMBREREGION,
	BASE_CEDENTE.PA_REGION_DESC,
	BASE_CEDENTE.PA_COMUNA_DESC,
	BASE_CEDENTE.PA_DIRECCION,
	BASE_CEDENTE.LA_REGION_DESC,
	BASE_CEDENTE.LA_COMUNA_DESC,
	BASE_CEDENTE.LA_DIRECCION,
	BASE_CEDENTE.SUC_REGION_DESC,
	BASE_CEDENTE.SUC_COMUNA_DESC,
	BASE_CEDENTE.SUC_DIRECCION,
	BASE_CEDENTE.RUT_AVAL,
	BASE_CEDENTE.DV_AVAL,
	BASE_CEDENTE.NOMBRE_AVAL,
	BASE_CEDENTE.FONO_AVAL_1,
	BASE_CEDENTE.FONO_AVAL_2,
	BASE_CEDENTE.FONO_AVAL_3,
	BASE_CEDENTE.COM_AVAL_1,
	BASE_CEDENTE.DIR_AVAL_1,
	BASE_CEDENTE.COM_AVAL_2,
	BASE_CEDENTE.DIR_AVAL_2,
	BASE_CEDENTE.NOMBRE_REFERENCIAL,
	BASE_CEDENTE.FONO_REFERENCIAL_1,
	BASE_CEDENTE.FONO_REFERENCIAL_2,
	BASE_CEDENTE.TIPO_RELACION_REF,
	BASE_CEDENTE.FONO_PARTICULAR,
	BASE_CEDENTE.FONO_PARTICULAR_2,
	BASE_CEDENTE.FONO_LABORAL,
	BASE_CEDENTE.FONO_LABORAL_2,
	BASE_CEDENTE.FONO_CELULAR,
	BASE_CEDENTE.FONO_CELULAR_2,
	BASE_CEDENTE.FONO_FAX,
	BASE_CEDENTE.FONO_FAX_2,
	'$periodo' AS Expr1,
	LEFT (BASE_CEDENTE.Percast, 4) AS Expr2
FROM
	BASE_CEDENTE;";
        
        $query = $this->db_ripley_sitrel->query($query) ;
    $adata=$query->result_array() ;
    
   // var_dump($data);
   $datos_array= construir_array_de_inserts($adata,"BANCO_RIPLEY_ASIGNACION");
    
   foreach ($datos_array as $key => $value) {
       $this->db_saturno->query($value);
   }
   
   
   
    return $datos_array;
    }
}
