INSERT INTO CARGA (
	RUT,
	DV,
	OPERACION,
	CUOTA,
	MONTO,
	VENCE, PRODUCTO,
	CEDENTE,
	MARCA_CARTERA, MARCA_1_SEMESTRE, MARCA_2_OBS_CHQ_PROT, MONEDA
) SELECT
	if
(
    SUBSTR( ASI_DEUDAS.Rut_Cliente , 1	, 1 ) < 1
    , SUBSTR( ASI_DEUDAS.Rut_Cliente , 2	, 7 )
    , SUBSTR( ASI_DEUDAS.Rut_Cliente , 1	, 8 )
) AS Expr1,
	ASI_DEUDAS.Dv,
	ASI_DEUDAS.NUMOPE,
	ASI_CUOTAS.Numero_Cuota,
	ASI_CUOTAS.Monto_Cuota AS Expr4,
	ASI_CUOTAS.Fecha_Vencimiento AS Expr2,
	ASI_DEUDAS.Producto,
	If (
		Trim(ASI_DEUDAS.Cedente) = "BANEFE"
		AND Trim(
			ASI_DEUDAS.Situacion_Credito
		) = "CARTERA CASTIGADA",
		"BNF",
		If (
			Trim(ASI_DEUDAS.Cedente) = "BANEFE"
			AND Trim(
				ASI_DEUDAS.Situacion_Credito
			) <> "CARTERA CASTIGADA",
			"BN1",
			If (
				Trim(ASI_DEUDAS.Cedente) = "BANCO SANTANDER SANTIAGO"
				AND Trim(
					ASI_DEUDAS.Situacion_Credito
				) = "CARTERA CASTIGADA",
				"STD",
				If (
					Trim(ASI_DEUDAS.Cedente) = "BANCO SANTANDER SANTIAGO"
					AND Trim(
						ASI_DEUDAS.Situacion_Credito
					) <> "CARTERA CASTIGADA",
					"ST1",
					"SIN DATO"
				)
			)
		)
	) AS Expr3,
	ASI_DEUDAS.Cobrador,
	ASI_DEUDAS.Cicloasi,
	ASI_DEUDAS.Producto,
	If (
		ASI_DEUDAS.TIPO_MONEDA= "UF",
		2,
		1
	) AS Expr5
FROM
	ASI_DEUDAS
INNER JOIN ASI_CUOTAS ON (
	ASI_DEUDAS.Rut_Cliente = ASI_CUOTAS.Rut_Cliente
)
AND (
	ASI_DEUDAS.Dv = ASI_CUOTAS.Dv
)
AND (
	ASI_DEUDAS.NUMOPE = ASI_CUOTAS.NUMOPE
);



