<button id="periodo" class = "btn btn-primary btn-lg hidden" data-toggle = "modal" data-target = "#myModal">
   Solicitar Periodo
</button>
<!-- Modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               EDITAR USUARIO
            </h4>
         </div>
         
         <div class = "modal-body">
             <?php 
             
            // var_dump($labels);
             foreach ($data as $key => $value) { 
             ?>
            <label><?= $labels[$key] ?></label>
            <input id="<?= $labels[$key] ?>" type="text" class="form-control periodo" value="<?php echo $value;//date("Ym")?>" placeholder="" required/>     
            <?php
             }
             ?>
             
         </div>
         
         <div class = "modal-footer">
             <button id="borrar" type = "button" class = "btn btn-danger" >
               Borrar
            </button>
            <button id="cancela" type = "button" class = "btn btn-default" data-dismiss = "modal">
               Cancelar
            </button>
            
            <button id="continuar" type = "button" class = "btn btn-primary">
               Guardar
            </button>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
<script> 
    $("#periodo").trigger("click");
    $("#borrar").on("click",function()
    {
        if(confirm('Esta seguro de querer borrar?')){
 $('#myModal').modal('hide')                                             ;
        var datos="";
        var data_original="";
        data_original="<?=$data_original?>";
        $.ajax({
  type: "POST",
  url: "<?= base_url("carga_usuarios_reportes/A/borrar");?>/",
  data: {datos: data_original},
  success: function(data){
     
      $( ".contenedor-datos-ajax" ).html( data );
      window.location.replace("<?= base_url("carga_usuarios_reportes/A/");?>");
     // alert(data);
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
    $( ".contenedor-datos-ajax" ).html( errorThrown + XMLHttpRequest.responseText);
    alert( errorThrown + XMLHttpRequest.responseText);
  }
});
//
}else { alert("La acción fue cancelada");$('#myModal').modal('hide');    }                                         ;
         
    });
    $("#continuar").on("click",function()
    {
       
       if(true)
       {
$('#myModal').modal('hide');
var datos="";
var data_original="";
data_original="<?=$data_original?>";
datos=$("#Grupo").val()+"|"+$("#Usuario").val()+"|"+$("#Rut").val()+"|"+$("#Nombre").val()+"|"+$("#Turno").val()+"|"+$("#Periodo").val(); 
$(".contenedor-datos-ajax").prepend('<div class="progr" style="height: 20px; width:100px"></div>');
        $(".progr" ).html('<img src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
            $.ajax({
  type: "POST",
  url: "<?= base_url("carga_usuarios_reportes/A/guardar");?>/",
  data: {data:datos,original: data_original},
  success: function(data){
     
      $( ".contenedor-datos-ajax" ).html( data );
      window.location.replace("<?= base_url("carga_usuarios_reportes/A/");?>");
      
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
    $( ".contenedor-datos-ajax" ).html( errorThrown + XMLHttpRequest.responseText);
  }
});     
            
            
            
            
/*            
            $.ajax({
  type: "POST",
  url: "<?= base_url("c_p/ripley_c/periodo/");?>/"+$(".periodo").val(),
  data: "",
  success: function(data){
      $("#carbdd").toggleClass("hidden");
      
      $( ".contenedor-datos-ajax" ).append( data );
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
    $( ".contenedor-datos-ajax" ).append( data );
  }
});
*/


       }else{alert("Ingrese el Periodo");}
       
    });
    
</script>