<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>RIPLEY</title>
        <?= load_bootstrap_css();?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-dashboard">&nbsp;</i>CARGA SITREL BANCO RIPLEY</h3>
        </div>
        <div class="panel-body">
         
            
        </div>
            <div class="row container" >
                
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12"><img src="<?= base_url("/imagenes/ripley/Ripley_logo.jpg"); ?>" style="width:100%"/></div>
                
            </div>   
        <ul class="list-group">
            <li class="list-group-item"><a class="btn btn-default form-control" id="paso1" href="#"><i class="fa fa-gears">&nbsp;</i>Paso 1&nbsp;<i id="Interfaz" class="fa fa-check hidden">&nbsp;</i></a></li>
           
        </ul>
        </div>
                
                
                <div class="col-lg-12 contenedor-datos-ajax">
                   <!-- <div class="progr" style="height: 20px; width:100px"></div>-->
                  
                </div>
            </div>
        </div>
                </div>
                
                
            </div>
            
        </div>
        <footer>
        <div class="container"> 
          <?php $this->load->view("footer/footer1.php");?>
        </div>
        </footer>
        <?= load_bootstrap_js();?>
        
        <script>
            $("#paso1").on("click",function(e)
        {
            $(".contenedor-datos-ajax").prepend('<div class="progr" style="height: 20px; width:100px"></div>');
        $(".progr" ).html('<img src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
            $.ajax({
  type: "POST",
  url: "<?= base_url("c_p/ripley_c/modal_periodo");?>/",
  data: "",
  success: function(data){
      $("#carbdd").toggleClass("hidden");
      $(".progr" ).empty();$(".progr" ).remove();
      $( ".contenedor-datos-ajax" ).append( data );
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
    $( ".contenedor-datos-ajax" ).append( errorThrown );
  }
});
           
          
            
          
            e.preventDefault();
        })  ; 
        
        
        
        $("#paso2").on("click",function(e)
        {
            $("#Interfaz").toggleClass("hidden");
            var cod='<div id="p2" style="display: none" class="panel panel-default"><div class="panel-heading"></div><div class="outputpaso"></div></div>';
            $(".contenedor-datos-ajax").html(cod);
            $("#p2").css("display","block");
             $(".outputpaso" ).html('<span>&nbsp;Procesando base de entrada...</span><img style="height: 25px; width: 100px;" src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
           
    
    
    $.ajax({
  type: "POST",
  url: "<?= base_url("c_p/financoop_interfaz/paso2");?>/",
  data: "",
  success: function(data){
      $("#carbdd").toggleClass("hidden");
      $( ".contenedor-datos-ajax" ).html( data );
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
    $( ".contenedor-datos-ajax" ).html( errorThrown );
  }
});
  /*  
    $.post( "<?= base_url("c_p/financoop_interfaz/paso2");?>", function( data ) {
  $( ".contenedor-datos-ajax" ).html( data );
});*/
          
            e.preventDefault();
        })  ; 
        </script>
    </body>
</html>
