insert into f3
SELECT
		ASI_TELEFONIA.Rut_Cliente AS RUT,
	ASI_TELEFONIA.Clasificacion_Telefono,
	"F" AS TIPO,
	ASI_TELEFONIA.Numero_Fono AS FONO
FROM
	ASI_TELEFONIA
WHERE
	(
		(
			(
ASI_TELEFONIA.Clasificacion_Telefono
			) = 3
		)
	);

