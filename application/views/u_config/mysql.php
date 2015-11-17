<div class="row">
    <div class="form-group">
    <div class="col-md-4">
        <label>Servidor (MySQL)</label>
        <input class="form-control" type="text" name="driver[mysql][servidor]" placeholder="192.169.1.125" value="" required />
    </div>
    <div class="col-md-4">
        <label>Nombre de usuario</label>
        <input class="form-control" type="text" name="driver[mysql][usuario]" value="" required/>
    </div>
    <div class="col-md-4">
        <label>Password</label>
        <input class="form-control" type="password" name="driver[mysql][password]" value="" required/>
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
    <div class="col-md-4">
        <label>Base de datos</label>
        <input class="form-control" type="text" name="driver[mysql][basededatos]" value="" required/>
    </div>
    <div class="col-md-4">
        <label>Prefijo</label>
        <input class="form-control" type="text" name="driver[mysql][prefijo]" value="" />
    </div>
    <div class="col-md-4">
        <label>PConect?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
        <input id="mysqlpconect" name="driver[mysql][pconect]" class="check-driver" type="checkbox">
        <label for="mysqlpconect" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
    
    <div class="col-md-4">
        <label>Cache On?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="mysqlcacheon" name="driver[mysql][cacheon]" class="check-driver" type="checkbox">
        <label for="mysqlcacheon" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>     
    <div class="col-md-4">
        <label>Cache Dir</label>
        <input class="form-control" type="text" name="driver[mysql][cachedir]" value="" />
    </div>
    <div class="col-md-4">
        <label>Charset</label>
        <input class="form-control" type="text" name="driver[mysql][charset]" value="utf8" />
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">    
    <div class="col-md-4">
        <label>DBCollat</label>
        <input class="form-control" type="text" name="driver[mysql][dbcollat]" value="utf8_general_ci" />
    </div>
    <div class="col-md-4">
        <label>SwapPre</label>
        <input class="form-control" type="text" name="driver[mysql][swappre]" value="" />
    </div>
        
    <div class="col-md-4">
        <label>Encryptar?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="mysqlencrypt" name="driver[mysql][encrypt]" class="check-driver" type="checkbox">
        <label for="mysqlencrypt" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>     
    </div>
</div>

<div class="row">
    <div class="form-group">    
    <div class="col-md-4">
        <label>Comprimir?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="mysqlcomprimir" name="driver[mysql][comprimir]" class="check-driver" type="checkbox">
        <label for="mysqlcomprimir" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    <div class="col-md-4">
        <label>Striction?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="mysqlstriction" name="driver[mysql][striction]" class="check-driver" type="checkbox">
        <label for="mysqlstriction" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    
    <div class="col-md-4">
        <label>Salvar Querys?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="mysqlsavequerys" name="driver[mysql][save_querys]" class="check-driver" type="checkbox">
        <label for="mysqlsavequerys" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
        
    </div>
</div>
<div class="row">&nbsp</div>