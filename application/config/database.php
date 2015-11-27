<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['dsn']      The full DSN string describe a connection to the database.
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database driver. e.g.: mysqli.
|			Currently supported:
|				 cubrid, ibase, mssql, mysql, mysqli, oci8,
|				 odbc, pdo, postgre, sqlite, sqlite3, sqlsrv
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Query Builder class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A odbc table prefix that should be swapped with the dbprefix
|	['encrypt']  Whether or not to use an encrypted connection.
|
|			'mysql' (deprecated), 'sqlsrv' and 'pdo/sqlsrv' drivers accept TRUE/FALSE
|			'mysqli' and 'pdo/mysql' drivers accept an array with the following options:
|
|				'ssl_key'    - Path to the private key file
|				'ssl_cert'   - Path to the public key certificate file
|				'ssl_ca'     - Path to the certificate authority file
|				'ssl_capath' - Path to a directory containing trusted CA certificats in PEM format
|				'ssl_cipher' - List of *allowed* ciphers to be used for the encryption, separated by colons (':')
|				'ssl_verify' - TRUE/FALSE; Whether verify the server certificate or not ('mysqli' only)
|
|	['compress'] Whether or not to use client compression (MySQL only)
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|	['ssl_options']	Used to set various SSL options that can be used when making SSL connections.
|	['failover'] array - A array with 0 or more data for connections if the main should fail.
|	['save_queries'] TRUE/FALSE - Whether to "save" all executed queries.
| 				NOTE: Disabling this will also effectively disable both
| 				$this->db->last_query() and profiling of DB queries.
| 				When you run a query, with this setting set to TRUE (odbc),
| 				CodeIgniter will store the SQL statement for debugging purposes.
| 				However, this may cause high memory usage, especially if you run
| 				a lot of SQL queries ... disable this to avoid that problem.
|
| The $active_group variable lets you choose which connection group to
| make active.  By odbc there is only one group (the 'odbc' group).
|
| The $query_builder variables lets you determine whether or not to load
| the query builder class.
*/
$active_group = 'mysqli';
$query_builder = TRUE;

$db['mysqli'] = array(
	'dsn'	=> '',
	'hostname' => 'naboo',
	'username' => 'desarrollo',
	'password' => 'solvencia',
	'database' => 'mig',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);


$db['ripley_sitrel'] = array(
	'dsn'	=> '',
	'hostname' => 'naboo',
	'username' => 'desarrollo',
	'password' => 'solvencia',
	'database' => 'ripley_sitrel',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);


$db['odbc']['hostname'] = 'Driver={SQL Server Native Client 10.0};Server=Saturno;Database=CEDENTES;'; /*desarrollo naboo*/
$db['odbc']['username'] = 'sa';
$db['odbc']['password'] = 'One2Three';
$db['odbc']['database'] = 'CEDENTES';
$db['odbc']['dbdriver'] = 'odbc';
$db['odbc']['dbprefix'] = '';
$db['odbc']['pconnect'] = FALSE;
$db['odbc']['db_debug'] = TRUE;
$db['odbc']['cache_on'] = FALSE;
$db['odbc']['cachedir'] = '';
$db['odbc']['char_set'] = 'utf8';
$db['odbc']['dbcollat'] = 'utf8_general_ci';
$db['odbc']['swap_pre'] = '';
$db['odbc']['autoinit'] = TRUE;
$db['odbc']['stricton'] = FALSE;
$db['odbc']['schema']   = "dbo";


$db['operaciones']['hostname'] = 'Driver={SQL Server Native Client 10.0};Server=Saturno;Database=OPERACIONES;';
$db['operaciones']['username'] = 'sa';
$db['operaciones']['password'] = 'One2Three';
$db['operaciones']['database'] = 'OPERACIONES';
$db['operaciones']['dbdriver'] = 'odbc';
$db['operaciones']['dbprefix'] = '';
$db['operaciones']['pconnect'] = FALSE;
$db['operaciones']['db_debug'] = TRUE;
$db['operaciones']['cache_on'] = FALSE;
$db['operaciones']['cachedir'] = '';
$db['operaciones']['char_set'] = 'utf8';
$db['operaciones']['dbcollat'] = 'utf8_general_ci';
$db['operaciones']['swap_pre'] = '';
$db['operaciones']['autoinit'] = TRUE;
$db['operaciones']['stricton'] = FALSE;
$db['operaciones']['schema']   = "dbo";


$db['CNB']['hostname'] = 'Driver={SQL Server Native Client 10.0};Server=Saturno;Database=CNB;'; //naboo test
$db['CNB']['username'] = 'sa';
$db['CNB']['password'] = 'One2Three';
$db['CNB']['database'] = 'CNB';
$db['CNB']['dbdriver'] = 'odbc';
$db['CNB']['dbprefix'] = '';
$db['CNB']['pconnect'] = FALSE;
$db['CNB']['db_debug'] = TRUE;
$db['CNB']['cache_on'] = FALSE;
$db['CNB']['cachedir'] = '';
$db['CNB']['char_set'] = 'utf8';
$db['CNB']['dbcollat'] = 'utf8_general_ci';
$db['CNB']['swap_pre'] = '';
$db['CNB']['autoinit'] = TRUE;
$db['CNB']['stricton'] = FALSE;
$db['CNB']['schema']   = "dbo";


$db['santander'] = array(
	'dsn'	=> '',
	'hostname' => 'naboo',
	'username' => 'desarrollo',
	'password' => 'solvencia',
	'database' => 'santander',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['uvm'] = array(
	'dsn'	=> '',
	'hostname' => 'naboo',
	'username' => 'desarrollo',
	'password' => 'solvencia',
	'database' => 'uvm',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);


$db['mysql_movistar'] = array(
	'dsn'	=> '',
	'hostname' => 'naboo',
	'username' => 'desarrollo',
	'password' => 'solvencia',
	'database' => 'movistar',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['movistar']['hostname'] = 'Driver={SQL Server Native Client 10.0};Server=Saturno;Database=CEDENTES;'; //naboo test
$db['movistar']['username'] = 'sa';
$db['movistar']['password'] = 'One2Three';
$db['movistar']['database'] = 'CNB';
$db['movistar']['dbdriver'] = 'odbc';
$db['movistar']['dbprefix'] = '';
$db['movistar']['pconnect'] = FALSE;
$db['movistar']['db_debug'] = TRUE;
$db['movistar']['cache_on'] = FALSE;
$db['movistar']['cachedir'] = '';
$db['movistar']['char_set'] = 'utf8';
$db['movistar']['dbcollat'] = 'utf8_general_ci';
$db['movistar']['swap_pre'] = '';
$db['movistar']['autoinit'] = TRUE;
$db['movistar']['stricton'] = FALSE;
$db['movistar']['schema']   = "dbo";

$db['BI']['hostname'] = 'Driver={SQL Server Native Client 10.0};Server=Saturno;Database=BI;'; /*desarrollo naboo*/
$db['BI']['username'] = 'sa';
$db['BI']['password'] = 'One2Three';
$db['BI']['database'] = 'BI';
$db['BI']['dbdriver'] = 'odbc';
$db['BI']['dbprefix'] = '';
$db['BI']['pconnect'] = FALSE;
$db['BI']['db_debug'] = TRUE;
$db['BI']['cache_on'] = FALSE;
$db['BI']['cachedir'] = '';
$db['BI']['char_set'] = 'utf8';
$db['BI']['dbcollat'] = 'utf8_general_ci';
$db['BI']['swap_pre'] = '';
$db['BI']['autoinit'] = TRUE;
$db['BI']['stricton'] = FALSE;
$db['BI']['schema']   = "dbo";