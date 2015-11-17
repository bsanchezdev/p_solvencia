INSERT IGNORE INTO CARGA (
	RUT,
	DV,
	NOMBRE,
	OPERACIÓN,
	CUOTA,
	PRODUCTO,
	VENCE, 
        MONTO,
	TIPO_DEUDOR
) 
SELECT distinct
	
		LEFT (
			RIGHT (
				TOTAL_SOCIOS.RutCliente, 9
			),
			8
		)
	 AS Expr4,
	RIGHT (
		TOTAL_SOCIOS.RutCliente, 1
	) AS Expr5,
	concat(TOTAL_SOCIOS.Nombre_Cliente ," " , TOTAL_SOCIOS.apellido_Paterno , " " , TOTAL_SOCIOS.Apellido_Materno) AS Expr6,
	TOTAL_DEUDA.Operación,
	TOTAL_CUOTAS.Numero_de_Cuota,
	"PAGARE" AS Expr2,
	concat(RIGHT (TOTAL_CUOTAS.Fecha_de_Vencimiento, 4) , Mid(TOTAL_CUOTAS.Fecha_de_Vencimiento, 4,2), LEFT (TOTAL_CUOTAS.Fecha_de_Vencimiento, 2)) AS Expr3,
	TOTAL_CUOTAS.Monto_Cuota AS Expr7,
	1 AS Expr1
FROM
	(
		TOTAL_SOCIOS
		INNER JOIN TOTAL_DEUDA ON TOTAL_SOCIOS.RutCliente = TOTAL_DEUDA.RutCliente
	)
INNER JOIN TOTAL_CUOTAS ON (
	TOTAL_DEUDA.Operación = TOTAL_CUOTAS.Operación
)
AND (
	TOTAL_DEUDA.RutCliente = TOTAL_CUOTAS.RutCliente
)
WHERE
	(
		(
			(
				TOTAL_CUOTAS.Estado_de_la_cuota
			) <> "2"
		)
	)
