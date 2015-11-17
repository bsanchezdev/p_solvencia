SELECT
	UVM_RG_PAGOS_SITREL.rut_deudor,
	UVM_RG_PAGOS_SITREL.num_operacion,
	UVM_RG_PAGOS_SITREL.num_cuota,
	UVM_RG_PAGOS_SITREL.fecha_pago,
	UVM_RG_PAGOS_SITREL.monto,
        UVM_RG_PAGOS_SITREL.fecha_pago AS FECHA_DE_PAGO,
	UVM_RG_PAGOS_SITREL.rut_deudor AS RUT_NRO,
	rTrim(
		UVM_RG_PAGOS_SITREL.num_operacion 
	) AS NRO_OPERACION
FROM
	UVM_RG_PAGOS_SITREL
WHERE
	(
		(
			(
				
					UVM_RG_PAGOS_SITREL.fecha_pago 
				
			) >= %fini%
			AND (
				
					UVM_RG_PAGOS_SITREL.fecha_pago 
				
			) <= %fter%
		)
	);