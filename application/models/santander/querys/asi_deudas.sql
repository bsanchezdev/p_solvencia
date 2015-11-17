INSERT INTO ASI_DEUDAS SELECT	
	ASI_ORIGINAL_DEUDAS.Rut_Cliente AS Rut_Cliente,
	ASI_ORIGINAL_DEUDAS.Dv,
	ASI_ORIGINAL_DEUDAS.NUMOPE,
	ASI_ORIGINAL_DEUDAS.Cicloasi,
	ASI_ORIGINAL_DEUDAS.Saldo_Capital,
	ASI_ORIGINAL_DEUDAS.Saldo_Insoluto,
	ASI_ORIGINAL_DEUDAS.Fecha_Vencimiento,
	ASI_ORIGINAL_DEUDAS.Estado_Cobranza,
	ASI_ORIGINAL_DEUDAS.Cobrador,
	ASI_ORIGINAL_DEUDAS.Fecha_Asignacion,
	ASI_ORIGINAL_DEUDAS.Situacion_Credito,
	ASI_ORIGINAL_DEUDAS.Cedente,
	ASI_ORIGINAL_DEUDAS.Producto,
	ASI_ORIGINAL_DEUDAS.Sucursal_Origen,
	ASI_ORIGINAL_DEUDAS.Glosa_Sucursal,
	ASI_ORIGINAL_DEUDAS.TIPO_MONEDA,
	ASI_ORIGINAL_DEUDAS.GRUPO,
	ASI_ORIGINAL_DEUDAS.POSICION_TOTAL,
	ASI_ORIGINAL_DEUDAS.PLAZO_CREDITO,
	ASI_ORIGINAL_DEUDAS.CICLO_REBAJE,
DATE_FORMAT(
adddate(STR_TO_DATE(concat (
		RIGHT (
			 ASI_ORIGINAL_DEUDAS.Fecha_Vencimiento , 2
		) , '-' , Mid(
			 ASI_ORIGINAL_DEUDAS.Fecha_Vencimiento , 5,
			2
		) , '-' , LEFT (
			 ASI_ORIGINAL_DEUDAS.Fecha_Vencimiento , 4
		)
	), '%d-%m-%Y'),%dias_para_vencimiento%),'%d/%m/%Y') AS Fecha_de_Vencimiento 
FROM
	ASI_ORIGINAL_DEUDAS
WHERE
	(
		(
			(
				ASI_ORIGINAL_DEUDAS.Estado_Cobranza
			) <> '%VARX%'
			AND (
				ASI_ORIGINAL_DEUDAS.Estado_Cobranza
			) <> '%VARY%'
			AND (
				ASI_ORIGINAL_DEUDAS.Estado_Cobranza
			) <> '%VARZ%'
		)
		AND (
			(
				ASI_ORIGINAL_DEUDAS.Cobrador
			) <> '%COBRADOR%'
		)
	);