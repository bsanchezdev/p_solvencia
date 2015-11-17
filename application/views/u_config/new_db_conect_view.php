<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nueva Conexión de Datos</title>
        <?=load_bootstrap_css();?>
    </head>
    <style>
        .material-switch > input[type="checkbox"] {
    display: none;   
}

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative; 
    width: 40px;  
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: inherit;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    background: inherit;
    left: 20px;
}
    </style>
    <body>
        <header class="container jumbotron" style="height: 90px;" >
            <h3 style="position: relative; top: -40px;">U_CONFIG 4 CodeIgniter </h3>
        </header>
        <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Seleccione el o los Drivers</div>
            
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">
                        MYSQLi
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionMySQLi" name="mysqli" type="checkbox" class="check-driver"/>
                            <label for="someSwitchOptionMySQLi" class="label-primary"></label>
                        </div>
                        <div class="">
                           
                            <ul class="" style="height: 30px;">
  <li class="list-group-item" style="background-color: transparent ! important;">
    <span class="badge btn">+</span>
  </li>
</ul>
                            
                        </div>
                    </li>
                   <!-- <li class="list-group-item">
                        SQLSRV
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionSQLSRV" name="sqlsrv" type="checkbox" class="check-driver"/>
                            <label for="someSwitchOptionSQLSRV" class="label-primary"></label>
                        </div>
                    </li> 
                    <li class="list-group-item">
                        MySQL
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionDefault" name="mysql" type="checkbox" class="check-driver"/>
                            <label for="someSwitchOptionDefault" class="label-primary"></label>
                        </div>
                    </li> 
                    <li class="list-group-item">
                        MS-SQL
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionPrimary" name="mssql" type="checkbox" class="check-driver"/>
                            <label for="someSwitchOptionPrimary" class="label-primary"></label>
                        </div>
                    </li> 
                    <li class="list-group-item">
                        Postgre
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess" name="postgre" type="checkbox" class="check-driver"/>
                            <label for="someSwitchOptionSuccess" class="label-primary"></label>
                        </div>
                    </li> -->
                    <li class="list-group-item">
                        ODBC
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionInfo" name="odbc" type="checkbox" class="check-driver"/>
                            <label for="someSwitchOptionInfo" class="label-primary"></label>
                        </div>
                    </li>
                    <!-- <li class="list-group-item">
                        SQLite3
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionWarning" name="sqlite3" type="checkbox" class="check-driver"/>
                            <label for="someSwitchOptionWarning" class="label-primary"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        SQLite
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionDanger" name="sqlite" type="checkbox" class="check-driver"/>
                            <label for="someSwitchOptionDanger" class="label-primary"></label>
                        </div>
                    </li> -->
                    <li class="list-group-item">
                        PDO
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionPDO" name="pdo" type="checkbox" class="check-driver"/>
                            <label for="someSwitchOptionPDO" class="label-primary"></label>
                        </div>
                    </li>
                    
                </ul>
            </div>            
        </div>
        <div class="col-md-8">
            
                   
            
            
        <form method="post" action='<?= base_url("u_config/new_db_connect/crear");?>'>  
             <div class="row well well-lg" style="margin-right: 0px !important; margin-left: 0px !important;">
                    
                <div class="col-md-3">
                    <label>Grupo Activo</label>
                <select class="form-control" name="active_group">
                    <option>1</option>
                    <option>2</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>QueryBuilder?</label>
                        <div class="material-switch ">
                            <input id="query_builder" name="query_builder" type="checkbox" class="check-driver"/>
                            <label for="query_builder" class="label-primary" style="position: relative; top: 7px ! important;"></label>
                        </div>
            </div>
             
            </div>
            <p></p>
<div class="panel panel-default with-nav-tabs">
    <div class="panel-heading">
        <div class="initmsg">
            Contenedor de configuraciones
        </div>
        <ul id="head-tab" class="nav nav-tabs">
        </ul>
    </div>
    
                <div class="panel-body" style="background-color: rgb(69, 69, 69); color: rgb(255, 255, 255);">
                   <div id="pbody" class="tab-content">
                   </div>
                </div>
        </div>
<input class="btn btn-block btn-default" type="submit" value="enviar" />   
</form>   
        </div>
    </div>
            <div class="row">
         <div class="contenedor-datos"></div>
    </div>
        </div>
        
    </body>
    <?=load_bootstrap_js();?>
    <script>
        var tabs=[];
      $(".check-driver").on("click",function()
      {
          if($(this).attr("name")!="query_builder"){
          if($(this).is(':checked'))
            {
                
                 $.post( "<?= base_url("u_config/new_db_connect");?>/check/"+$(this).attr("name"), 
                 function( data ) 
                 {
                    $(".contenedor-datos").html( data );
                 });
                  
            }
            else
            { 
                   $.post( "<?= base_url("u_config/new_db_connect");?>/uncheck/"+$(this).attr("name"), 
                 function( data ) 
                 {
                    $(".contenedor-datos").html( data );
                 });
            }      
            }
      });  
    </script>
    
</html>
