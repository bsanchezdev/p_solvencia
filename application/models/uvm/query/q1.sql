INSERT INTO CNB.DBO.UVM_RG_PAGOS_SITREL SELECT
	*
FROM
	[199.69.69.4].Sitrel_rec.dbo.tb_scd426_PagoEfectivoCuota
WHERE
	COD_empresa IN ('UVV', 'UVS', 'UV1')