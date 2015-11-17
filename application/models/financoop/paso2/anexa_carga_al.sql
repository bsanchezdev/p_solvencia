INSERT IGNORE INTO CARGA ( RUT, DV, NOMBRE, OPERACIÓN, CUOTA, PRODUCTO, VENCE, MONTO, TIPO_DEUDOR )
    SELECT distinct
	
		LEFT (
			RIGHT (TOTAL_AVAL.RutCliente, 9),
			8
		)
	 AS Expr4,
	RIGHT (TOTAL_AVAL.RutCliente, 1) AS Expr5,
	concat(TOTAL_AVAL.Nombre_Cliente , " " , TOTAL_AVAL.Apellido_Paterno , " " , TOTAL_AVAL.Apellido_Materno) AS Expr6,
	TOTAL_DEUDA.Operación,
	TOTAL_CUOTAS.Numero_de_Cuota,
	"PAGARE" AS Expr2,
	RIGHT (
		TOTAL_CUOTAS.Fecha_de_Vencimiento, 4
	) & Mid(
		TOTAL_CUOTAS.Fecha_de_Vencimiento, 4,
		2
	) & LEFT (
		TOTAL_CUOTAS.Fecha_de_Vencimiento, 2
	) AS Expr3,
	TOTAL_CUOTAS.Monto_Cuota AS Expr7,
	"A" AS Expr1
FROM
	TOTAL_AVAL
INNER JOIN (
	TOTAL_DEUDA
	INNER JOIN TOTAL_CUOTAS ON (
		TOTAL_DEUDA.Operación = TOTAL_CUOTAS.Operación
	)
	AND (
		TOTAL_DEUDA.RutCliente = TOTAL_CUOTAS.RutCliente
	)
) ON TOTAL_AVAL.RutCliente = TOTAL_DEUDA.Rut_Aval
WHERE
	(
		(
			(
				TOTAL_CUOTAS.Estado_de_la_cuota
			) <> "2"
		)
	);
