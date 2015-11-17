<div class="row">
    <div class="form-group">
    <div class="col-md-4">
        <label>Servidor (SQLSRV)</label>
        <input class="form-control" type="text" name="driver[sqlsrv][servidor]" placeholder="192.169.1.125" value="" required />
    </div>
    <div class="col-md-4">
        <label>Nombre de usuario</label>
        <input class="form-control" type="text" name="driver[sqlsrv][usuario]" value="" required/>
    </div>
    <div class="col-md-4">
        <label>Password</label>
        <input class="form-control" type="password" name="driver[sqlsrv][password]" value="" required/>
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
    <div class="col-md-4">
        <label>Base de datos</label>
        <input class="form-control" type="text" name="driver[sqlsrv][basededatos]" value="" required/>
    </div>
    <div class="col-md-4">
        <label>Prefijo</label>
        <input class="form-control" type="text" name="driver[sqlsrv][prefijo]" value="" />
    </div>
    <div class="col-md-4">
        <label>PConect?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
        <input id="sqlsrvpconect" name="driver[sqlsrv][pconect]" class="check-driver" type="checkbox">
        <label for="sqlsrvpconect" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
    
    <div class="col-md-4">
        <label>Cache On?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="sqlsrvcacheon" name="driver[sqlsrv][cacheon]" class="check-driver" type="checkbox">
        <label for="sqlsrvcacheon" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>     
    <div class="col-md-4">
        <label>Cache Dir</label>
        <input class="form-control" type="text" name="driver[sqlsrv][cachedir]" value="" />
    </div>
    <div class="col-md-4">
        <label>Charset</label>
        <input class="form-control" type="text" name="driver[sqlsrv][charset]" value="utf8" />
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">    
    <div class="col-md-4">
        <label>DBCollat</label>
        <input class="form-control" type="text" name="driver[sqlsrv][dbcollat]" value="utf8_general_ci" />
    </div>
    <div class="col-md-4">
        <label>SwapPre</label>
        <input class="form-control" type="text" name="driver[sqlsrv][swappre]" value="" />
    </div>
        
    <div class="col-md-4">
        <label>Encryptar?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="sqlsrvencrypt" name="driver[sqlsrv][encrypt]" class="check-driver" type="checkbox">
        <label for="sqlsrvencrypt" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>     
    </div>
</div>

<div class="row">
    <div class="form-group">    
    <div class="col-md-4">
        <label>Comprimir?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="sqlsrvcomprimir" name="driver[sqlsrv][comprimir]" class="check-driver" type="checkbox">
        <label for="sqlsrvcomprimir" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    <div class="col-md-4">
        <label>Striction?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="sqlsrvstriction" name="driver[sqlsrv][striction]" class="check-driver" type="checkbox">
        <label for="sqlsrvstriction" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    
    <div class="col-md-4">
        <label>Salvar Querys?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="sqlsrvsavequerys" name="driver[sqlsrv][save_querys]" class="check-driver" type="checkbox">
        <label for="sqlsrvsavequerys" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
        
    </div>
</div>
<div class="row">&nbsp</div>