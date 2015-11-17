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
               Ingrese el Periodo y Fecha de carga
            </h4>
         </div>
         
         <div class = "modal-body">
             <label>Ingrese el periodo</label>
             <input type="text" class="form-control periodo" value="<?php echo date("Ym")?>" placeholder="201510" required/>
             <label>Ingrese Fecha de carga</label>
             <input type="text" class="form-control fcarga" placeholder="201510" required value="<?php echo date("Ymd")?>"/>
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Cancelar
            </button>
            
            <button id="continuar" type = "button" class = "btn btn-primary">
               Continuar
            </button>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
<script> 
    $("#periodo").trigger("click");
    
    $("#continuar").on("click",function()
    {
        
       if($(".periodo").val().trim()!==""&&$(".fcarga").val().trim()!=="")
       {
$('#myModal').modal('hide');
$(".contenedor-datos-ajax").prepend('<div class="progr" style="height: 20px; width:100px"></div>');
        $(".progr" ).html('<img src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
            $.ajax({
  type: "POST",
  url: "<?= base_url("c_p/ripley_c/proces_1");?>/"+$(".periodo").val()+"/"+$(".fcarga").val(),
  data: "",
  success: function(data){
     
      $( ".contenedor-datos-ajax" ).html( data );
      
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