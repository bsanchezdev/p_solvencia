insert IGNORE into FONOS_DEPURADOS
SELECT
	
		LEFT (
			RIGHT (
				TOTAL_TELEFONOS.RutCliente , 9
			),
			8
		)
	 AS RUT,
	TOTAL_TELEFONOS.Tipo_de_telefóno,
	
		 TOTAL_TELEFONOS.Código_de_área 
	 AS CA,
	TOTAL_TELEFONOS.Teléfono_ 
FROM
	TOTAL_TELEFONOS;


