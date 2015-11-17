INSERT INTO F1 SELECT
	 ASI_TELEFONIA.Rut_Cliente
	 AS RUT,
	ASI_TELEFONIA.Clasificacion_Telefono,
	"C" AS TIPO,
	RIGHT (
		ASI_TELEFONIA.Numero_Fono, 8
	) AS FONO 
FROM
	ASI_TELEFONIA
WHERE
	(
		(
			(
				ASI_TELEFONIA.Clasificacion_Telefono
			) = 1
		)
	);
