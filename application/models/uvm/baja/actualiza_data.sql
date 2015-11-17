
IF (EXISTS (SELECT * 
                 FROM INFORMATION_SCHEMA.TABLES 
                 WHERE TABLE_SCHEMA = 'dbo' 
                 AND  TABLE_NAME = 'paso'))
BEGIN
drop table paso;
END

IF (EXISTS (SELECT * 
                 FROM INFORMATION_SCHEMA.TABLES 
                 WHERE TABLE_SCHEMA = 'dbo' 
                 AND  TABLE_NAME = 'paso2'))
BEGIN
drop table paso2;
END

 create table paso 
(
a1    nvarchar(255), 
a2    nvarchar(255), 
a3    nvarchar(255), 
a4    nvarchar(255), 
a5    nvarchar(255), 
a6    nvarchar(255), 
a7    nvarchar(255), 
a8    nvarchar(255), 
a9    nvarchar(255), 
a10   nvarchar(255), 
a11   nvarchar(255), 
a12   nvarchar(255), 
a13   nvarchar(255), 
a14   nvarchar(255), 
a15   nvarchar(255), 
a16   nvarchar(255), 
a17   nvarchar(255), 
a18   nvarchar(255), 
a19   nvarchar(255), 
a20   nvarchar(255), 
a21   nvarchar(255), 
a22   nvarchar(255), 
a23   nvarchar(255), 
a24   nvarchar(255), 
a25   nvarchar(255), 
a26 nvarchar(255)
)
-- crea tabla para las bajas 
create table paso2
(
RUT   nvarchar(255),
OPERACION nvarchar(255),
CUOTA nvarchar(255),
VENCE nvarchar(255),
MONTO nvarchar(255)
)
--inserta del CARBDD origuinal 
BULK INSERT paso   FROM '\\199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\UVM_CARSIT\SALIDA\CARBDD.txt'  WITH(FIELDTERMINATOR = ';');
-- inserta las bajas
BULK INSERT paso2   FROM '\\199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\UVM_CARSIT\SALIDA\baja.csv'  WITH(FIELDTERMINATOR = ';');
-- borro las bajas del CARBDD
delete from  paso 
where   a1+a8 in (select RUT+OPERACION as llave from paso2 group by RUT+OPERACION)  
 --creo archivo CARBDD definitivo 
 EXEC xp_cmdshell 'bcp "select * from  operaciones.dbo.paso  " queryout "\\199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\UVM_CARSIT\SALIDA\CARBDD.txt" -T -c -t;';
  
delete paso2
where RUT='rut';

delete deudas_uvm_bajas
where fecha_carga=CONVERT (VARCHAR (8), GETDATE (), 112);

insert into deudas_uvm_bajas
select *, CONVERT (VARCHAR (8), GETDATE (), 112) as fecha_carga 
from paso2 ;

 
drop table paso;
drop table paso2;