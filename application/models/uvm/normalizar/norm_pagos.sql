SELECT
	UVM_RG_PAGOS_SITREL.rut_deudor,
	UVM_RG_PAGOS_SITREL.num_operacion,
	UVM_RG_PAGOS_SITREL.num_cuota,
	sum(UVM_RG_PAGOS_SITREL.monto)
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
	)

GROUP BY rut_deudor,num_operacion,num_cuota,monto

