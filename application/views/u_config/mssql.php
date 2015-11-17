<div class="row">
    <div class="form-group">
    <div class="col-md-4">
        <label>Servidor (MS-SQL)</label>
        <input class="form-control" type="text" name="driver[mssql][servidor]" placeholder="192.169.1.125" value="" required />
    </div>
    <div class="col-md-4">
        <label>Nombre de usuario</label>
        <input class="form-control" type="text" name="driver[mssql][usuario]" value="" required/>
    </div>
    <div class="col-md-4">
        <label>Password</label>
        <input class="form-control" type="password" name="driver[mssql][password]" value="" required/>
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
    <div class="col-md-4">
        <label>Base de datos</label>
        <input class="form-control" type="text" name="driver[mssql][basededatos]" value="" required/>
    </div>
    <div class="col-md-4">
        <label>Prefijo</label>
        <input class="form-control" type="text" name="driver[mssql][prefijo]" value="" />
    </div>
    <div class="col-md-4">
        <label>PConect?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
        <input id="mssqlpconect" name="driver[mssql][pconect]" class="check-driver" type="checkbox">
        <label for="mssqlpconect" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
    
    <div class="col-md-4">
        <label>Cache On?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="mssqlcacheon" name="driver[mssql][cacheon]" class="check-driver" type="checkbox">
        <label for="mssqlcacheon" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>     
    <div class="col-md-4">
        <label>Cache Dir</label>
        <input class="form-control" type="text" name="driver[mssql][cachedir]" value="" />
    </div>
    <div class="col-md-4">
        <label>Charset</label>
        <input class="form-control" type="text" name="driver[mssql][charset]" value="utf8" />
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">    
    <div class="col-md-4">
        <label>DBCollat</label>
        <input class="form-control" type="text" name="driver[mssql][dbcollat]" value="utf8_general_ci" />
    </div>
    <div class="col-md-4">
        <label>SwapPre</label>
        <input class="form-control" type="text" name="driver[mssql][swappre]" value="" />
    </div>
        
    <div class="col-md-4">
        <label>Encryptar?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="mssqlencrypt" name="driver[mssql][encrypt]" class="check-driver" type="checkbox">
        <label for="mssqlencrypt" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>     
    </div>
</div>

<div class="row">
    <div class="form-group">    
    <div class="col-md-4">
        <label>Comprimir?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="mssqlcomprimir" name="driver[mssql][comprimir]" class="check-driver" type="checkbox">
        <label for="mssqlcomprimir" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    <div class="col-md-4">
        <label>Striction?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="mssqlstriction" name="driver[mssql][striction]" class="check-driver" type="checkbox">
        <label for="mssqlstriction" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    
    <div class="col-md-4">
        <label>Salvar Querys?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="mssqlsavequerys" name="driver[mssql][save_querys]" class="check-driver" type="checkbox">
        <label for="mssqlsavequerys" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
        
    </div>
</div>
<div class="row">&nbsp</div>