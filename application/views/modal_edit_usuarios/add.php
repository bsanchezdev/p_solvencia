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
              AGREGAR USUARIO
            </h4>
         </div>
         
         <div class = "modal-body">
             <?php 
             
            // var_dump($labels);
             foreach ($labels as $key => $value) { 
             ?>
            <label><?= $labels[$key] ?></label>
            <input id="<?= $labels[$key] ?>" type="text" class="form-control periodo" value="" placeholder="<?php echo $value;?>" required/>     
            <?php
             }
             ?>
             
         </div>
         
         <div class = "modal-footer">
             
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
   
    $("#continuar").on("click",function()
    {
       
       if(true)
       {
$('#myModal').modal('hide');
var datos="";

datos=$("#Grupo").val()+"|"+$("#Usuario").val()+"|"+$("#Rut").val()+"|"+$("#Nombre").val()+"|"+$("#Turno").val()+"|"+$("#Periodo").val(); 
$(".contenedor-datos-ajax").prepend('<div class="progr" style="height: 20px; width:100px"></div>');
        $(".progr" ).html('<img src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
            $.ajax({
  type: "POST",
  url: "<?= base_url("carga_usuarios_reportes/A/nuevo");?>/",
  data: {data:datos},
  success: function(data){
     
      $( ".contenedor-datos-ajax" ).html( data );
   //   $( ".contenedor-datos-ajax" ).html(data);
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