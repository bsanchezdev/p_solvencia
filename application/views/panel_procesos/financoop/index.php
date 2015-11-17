<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>FINANCOOP</title>
        <?= load_bootstrap_css();?>
    </head>
    <body>
        <div class="container">
            <?php $this->load->view("headers/uno.php");?>
            
            <div class="row">
                
                <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
 <h3 class="panel-title"><i class="fa fa-dashboard">&nbsp;</i>Carga SITREL FINANCOOP</h3>
        </div>
        <div class="panel-body">
            
            
        </div>
            <div class="row container" >
                
        <div class="col-md-4 col-lg-4 col-xs-4">
        <div class="row">
                <div class="col-md-12 col-xs-12"><img src="<?= base_url("/imagenes/financoop/logo-financoop.jpg"); ?>" width="322" height="81" alt="logo-financoop"/></div>
        </div>    
        <ul class="list-group">
            <li class="list-group-item"><a class="btn btn-default form-control" id="paso1" href="#"><i class="fa fa-gears">&nbsp;</i>Interfaz&nbsp;<i id="Interfaz" class="fa fa-check hidden">&nbsp;</i></a></li>
            <li class="list-group-item"><a class="btn btn-default form-control" id="paso2" href="#" style="height: 53px;"><i class="fa fa-database">&nbsp;</i>GENERA CARBDD&nbsp;<i id="carbdd" class="fa fa-check hidden">&nbsp;</i></a></li>
           
        </ul>
        </div>
                
                
                <div class="col-md-8 contenedor-datos-ajax">
                    
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
            
          //  $("#Interfaz").toggleClass("hidden");
          //  $("#carbdd").toggleClass("hidden");
            $.post( "<?= base_url("c_p/financoop_interfaz_v2");?>", function( data ) {
  $( ".contenedor-datos-ajax" ).html( data );
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
