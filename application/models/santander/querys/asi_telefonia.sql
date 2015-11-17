INSERT INTO ASI_TELEFONIA SELECT
	ASI_ORIGINAL_TELEFONIA.Tipo_Fono,
	if(
	SUBSTR(	ASI_ORIGINAL_TELEFONIA.Rut_Cliente ,1 , 1 ) < 1
,	SUBSTR(	ASI_ORIGINAL_TELEFONIA.Rut_Cliente ,2 , 7 )
,	SUBSTR(	ASI_ORIGINAL_TELEFONIA.Rut_Cliente ,1 , 8 )
) AS Rut_Cliente,
	RIGHT (
	ASI_ORIGINAL_TELEFONIA.Rut_Cliente, 1
	) AS DV,
	ASI_ORIGINAL_TELEFONIA.Numero_Fono,
	ASI_ORIGINAL_TELEFONIA.Clasificacion_Telefono,
	ASI_ORIGINAL_TELEFONIA.Prioridad_Llamada,
	ASI_ORIGINAL_TELEFONIA.Ciudad,
	ASI_ORIGINAL_TELEFONIA.Cod_area 
FROM
	ASI_ORIGINAL_TELEFONIA;