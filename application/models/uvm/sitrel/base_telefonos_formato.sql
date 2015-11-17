insert INTO BASE_TELEFONOS_FORMATO 
SELECT
	BASE_TELEFONOS.RUT,
	BASE_TELEFONOS.DV,
	BASE_TELEFONOS.TELEFONO,
	BASE_TELEFONOS.ZONA,
	BASE_TELEFONOS.COMUNA,
	BASE_TELEFONOS.TIPO_TELEFONO, BASE_TELEFONOS.CEDENTE 
FROM
	BASE_TELEFONOS
GROUP BY
	BASE_TELEFONOS.RUT,
	BASE_TELEFONOS.DV,
	BASE_TELEFONOS.TELEFONO,
	BASE_TELEFONOS.ZONA,
	BASE_TELEFONOS.COMUNA,
	BASE_TELEFONOS.TIPO_TELEFONO, BASE_TELEFONOS.CEDENTE
HAVING
	(
		(
			(BASE_TELEFONOS.TELEFONO) <> "0"
		)
	);