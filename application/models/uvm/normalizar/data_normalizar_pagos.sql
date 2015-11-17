select * from normalizar_pagos 
where 
normalizar_pagos.num_cuota like '%cuota%' 
and 
normalizar_pagos.NRO_OPERACION like '%operacion%'
and
normalizar_pagos.RUT_NRO like '%rut%'
