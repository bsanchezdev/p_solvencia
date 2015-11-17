<style>
    .listgroup{border-radius: 1px ! important; box-shadow: none;}
    .listgroupitem{border-radius: 1px ! important;}
    .centronegrilla{text-align: center; font-weight: 600;}
    
    .panel-u{border-color: #646C74 !important; }
    .panel-heading-u{background-color: #747474 !important;
border-color: #646C74 !important;background-image:none !important;}
</style>
<div class="panel panel-primary panel-u">
        <div class="panel-heading panel-heading-u">
            <h3 class="panel-title">Interfaz Financoop</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                
                <div class="col-lg-12">
                    <label><i class="fa fa-calendar">&nbsp;</i>Fecha Archivo:</label>
                    <input type="text" class="form-control" id="f_archivo" name="f_archivo" value="<?php echo date("Ymd")?>" />
                </div>
                <div class="col-lg-12">
                    <label><i class="fa fa-calendar">&nbsp;</i>Fecha Carga:</label>
                    <input type="text" class="form-control" name="f_carga" id="f_carga" value="<?php echo date("Ymd")?>" />
                </div>
            </div>
        </div>
        
    <div class="row">
                
                <div class="col-lg-12" style="">
                    <div class="centronegrilla">DIARIA</div>      
                    
                    <ul class="list-group listgroup listgroup" style="">
    <li class="list-group-item listgroupitem" style="">
        <a id="diaria" class="btn btn-default form-control"><i class="fa fa-play">&nbsp;</i>INICIAR</a>
        <p></p><div class=""></div>
    </li>
           <!-- 
            <a id="anexar" class="btn btn-default form-control">Anexar DW</a> -->
       <li class="list-group-item listgroupitem" style="">
           <p></p><div class="out-info-importar"></div>
      </li>  

<div class="progress" style="display: none">
  <div id="progresobar" class="progress-bar" role="progressbar" aria-valuenow="60"
       aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
    <span id="paso1" class="sr-only">0% completado</span>
  </div>
</div>


            
        </ul>
                </div>
                
                <div class="col-lg-12" style=" ">
                    <div class="centronegrilla">MES</div>   
                    <ul class="list-group listgroup">
                        <li class="list-group-item listgroupitem">
                            <a id="mensual" class="btn btn-default form-control"><i class="fa fa-play">&nbsp;</i>INICIAR</a>
                        <p></p><div class=""></div>
                        </li>
        <!-- 
        <li class="list-group-item listgroupitem"><a id="importar" class="btn btn-default form-control">IMPORTAR</a><p></p></li>
        <li class="list-group-item listgroupitem"><a id="importar" class="btn btn-default form-control">ANEXAR</a><p></p></li> 
        -->       
        <li class="list-group-item listgroupitem" style="">
           <p></p><div class="out-info-mes"></div>
      </li> 
            </ul>
                </div>
                
                <div class="col-lg-12" style="" >
                    <div class="centronegrilla">TOTAL</div>
                    <ul class="list-group listgroup">
              <li class="list-group-item listgroupitem"><a id="total" class="btn btn-default form-control"><i class="fa fa-play">&nbsp;</i>PROCESO</a><p></p></li>
              <li class="list-group-item listgroupitem" style="">
           <p></p><div class="out-info-total"></div>
      </li> 
        </ul>
                </div>
            </div>
        
</div>

         <script>
            $("#diaria").on("click",function(e)
        {
            $(".out-info-importar" ).html('<img src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
            e.preventDefault();
          $.ajax({
  type: "POST",
  url: "<?=base_url("c_p/financoop_interfaz_v2/importar/MES");?>/"+$("#f_archivo").val()+"/"+$("#f_carga").val(),
  data: "",
  success: function(data){
       $( ".out-info-importar" ).html( data );
       $("#total").trigger("click");
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
    $( ".out-info-importar" ).html( errorThrown );
  }
});
        })  ; 
        
        
         $("#mensual").on("click",function(e)
        {
           $( ".out-info-mes" ).html('<img src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
             e.preventDefault();
            $.ajax({
  type: "POST",
  url: "<?=base_url("c_p/financoop_interfaz_v2/importar_mes/");?>/"+$("#f_archivo").val()+"/"+$("#f_carga").val(),
  data: "",
  success: function(data){
       $( ".out-info-mes" ).html( data );
       $("#total").trigger("click");
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
    $( ".out-info-mes" ).html( errorThrown );
  }
});
             
            
            
           
          
           
        })  ; 
        
     
     $("#total").on("click",function(e)
        {
            $(".out-info-total" ).html('<img src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
            e.preventDefault();
          $.ajax({
  type: "POST",
  url: "<?=base_url("c_p/financoop_interfaz_v2/total");?>/"+$("#f_archivo").val()+"/"+$("#f_carga").val(),
  data: "",
  success: function(data){
       $( ".out-info-total" ).html( data );
       $("#paso2").trigger("click");
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
    $( ".out-info-importar" ).html( errorThrown );
  }
});
        })  ; 
        </script>