<?php
$db['mysql'] = array(
	'dsn'	=> '',
	'hostname' => '199.69.69.3',
	'username' => 'desarrollo',
	'password' => 'solvenciadesarrollo',
	'database' => 'curso_php',
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

//var_dump($config);
?>
<div class="row">
    <div class="form-group">
    <div class="col-md-4">
        <label>Servidor (MySQLi)</label>
        <input class="form-control" type="text" name="driver[mysqli][servidor]" placeholder="192.169.1.125" value="" required />
    </div>
    <div class="col-md-4">
        <label>Nombre de usuario</label>
        <input class="form-control" type="text" name="driver[mysqli][usuario]" value="" required/>
    </div>
    <div class="col-md-4">
        <label>Password</label>
        <input class="form-control" type="password" name="driver[mysqli][password]" value="" required/>
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
    <div class="col-md-4">
        <label>Base de datos</label>
        <input class="form-control" type="text" name="driver[mysqli][basededatos]" value="" required/>
    </div>
    <div class="col-md-4">
        <label>Prefijo</label>
        <input class="form-control" type="text" name="driver[mysqli][prefijo]" value="" />
    </div>
    <div class="col-md-4">
        <label>PConect?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
        <input id="mysqlipconect" name="driver[mysqli][pconect]" class="check-driver" type="checkbox">
        <label for="mysqlipconect" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
    
    <div class="col-md-4">
        <label>Cache On?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="mysqlicacheon" name="driver[mysqli][cacheon]" class="check-driver" type="checkbox">
        <label for="mysqlicacheon" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>     
    <div class="col-md-4">
        <label>Cache Dir</label>
        <input class="form-control" type="text" name="driver[mysqli][cachedir]" value="" />
    </div>
    <div class="col-md-4">
        <label>Charset</label>
        <input class="form-control" type="text" name="driver[mysqli][charset]" value="utf8" />
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">    
    <div class="col-md-4">
        <label>DBCollat</label>
        <input class="form-control" type="text" name="driver[mysqli][dbcollat]" value="utf8_general_ci" />
    </div>
    <div class="col-md-4">
        <label>SwapPre</label>
        <input class="form-control" type="text" name="driver[mysqli][swappre]" value="" />
    </div>
        
    <div class="col-md-4">
        <label>Encryptar?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="encrypt" name="driver[mysqli][encrypt]" class="check-driver" type="checkbox">
        <label for="encrypt" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>     
    </div>
</div>

<div class="row">
    <div class="form-group">    
    <div class="col-md-4">
        <label>Comprimir?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="comprimir" name="driver[mysqli][comprimir]" class="check-driver" type="checkbox">
        <label for="comprimir" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    <div class="col-md-4">
        <label>Striction?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="striction" name="driver[mysqli][striction]" class="check-driver" type="checkbox">
        <label for="striction" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    
    <div class="col-md-4">
        <label>Salvar Querys?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="savequerys" name="driver[mysqli][save_querys]" class="check-driver" type="checkbox">
        <label for="savequerys" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
        
    </div>
</div>
<div class="row">&nbsp</div>