
<div class="row">
    <div class="form-group">
    <div class="col-md-4">
        <label>Driver (PDO)</label>
        <input class="form-control" type="text" name="driver[<?= $driver ?>][servidor]" placeholder="192.169.1.125" value="" required />
    </div>
    <div class="col-md-4">
        <label>Nombre de usuario</label>
        <input class="form-control" type="text" name="driver[<?= $driver ?>][usuario]" value="" required/>
    </div>
    <div class="col-md-4">
        <label>Password</label>
        <input class="form-control" type="password" name="driver[<?= $driver ?>][password]" value="" required/>
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
    <div class="col-md-4">
        <label>Base de datos</label>
        <input class="form-control" type="text" name="driver[<?= $driver ?>][basededatos]" value="" required/>
    </div>
    <div class="col-md-4">
        <label>Prefijo</label>
        <input class="form-control" type="text" name="driver[<?= $driver ?>][prefijo]" value="" />
    </div>
    <div class="col-md-4">
        <label>PConect?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
        <input id="<?= $driver ?>pconect" name="driver[<?= $driver ?>][pconect]" class="check-driver" type="checkbox">
        <label for="<?= $driver ?>pconect" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
    
    <div class="col-md-4">
        <label>Cache On?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="<?= $driver ?>cacheon" name="driver[<?= $driver ?>][cacheon]" class="check-driver" type="checkbox">
        <label for="<?= $driver ?>cacheon" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>     
    <div class="col-md-4">
        <label>Cache Dir</label>
        <input class="form-control" type="text" name="driver[<?= $driver ?>][cachedir]" value="" />
    </div>
    <div class="col-md-4">
        <label>Charset</label>
        <input class="form-control" type="text" name="driver[<?= $driver ?>][charset]" value="utf8" />
    </div>
    </div>
</div>

<div class="row">
    <div class="form-group">    
    <div class="col-md-4">
        <label>DBCollat</label>
        <input class="form-control" type="text" name="driver[<?= $driver ?>][dbcollat]" value="utf8_general_ci" />
    </div>
    <div class="col-md-4">
        <label>SwapPre</label>
        <input class="form-control" type="text" name="driver[<?= $driver ?>][swappre]" value="" />
    </div>
        
    <div class="col-md-4">
        <label>Encryptar?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="<?= $driver ?>encrypt" name="driver[<?= $driver ?>][encrypt]" class="check-driver" type="checkbox">
        <label for="<?= $driver ?>encrypt" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>     
    </div>
</div>

<div class="row">
    <div class="form-group">    
    <div class="col-md-4">
        <label>Comprimir?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="<?= $driver ?>comprimir" name="driver[<?= $driver ?>][comprimir]" class="check-driver" type="checkbox">
        <label for="<?= $driver ?>comprimir" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    <div class="col-md-4">
        <label>Striction?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="<?= $driver ?>striction" name="driver[<?= $driver ?>][striction]" class="check-driver" type="checkbox">
        <label for="<?= $driver ?>striction" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
    
    <div class="col-md-4">
        <label>Salvar Querys?</label>
        <div class="material-switch pull-right" style="float: none ! important;  ">
            <input id="<?= $driver ?>savequerys" name="driver[<?= $driver ?>][save_querys]" class="check-driver" type="checkbox">
        <label for="<?= $driver ?>savequerys" class="label-primary" style="background-color: rgb(45, 143, 108); float: right ! important; width: 100%; top: 10px;"></label>
        </div>
    </div>
        
    </div>
</div>
<div class="row">&nbsp</div>
