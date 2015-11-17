<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>UVM</title>
        <?= load_bootstrap_css();?>
    </head>
    <body>
        <div class="container" style="padding-bottom: 100px;">
            <?php $this->load->view("headers/uno.php");?>
            
            <div class="row">
                
                <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
 <h3 class="panel-title"><i class="fa fa-dashboard">&nbsp;</i>CARGA SITREL UVM</h3>
        </div>
        <div class="panel-body">
            
            
        </div>
            <div class="row container" >
                
        <div class="col-md-4 col-lg-4 col-xs-4">
        <div class="row">
                <div class="col-md-12 col-xs-12" style="text-align: center;"><img src="<?= base_url("/imagenes/uvm/uvmLogo.png"); ?>" alt="logo-financoop"/></div>
        </div>    
        <ul class="list-group">
            <li class="list-group-item"><a class="btn btn-default form-control" id="init" href="#"><i class="fa fa-gears">&nbsp;</i>Iniciar&nbsp;<i id="Interfaz" class="fa fa-check hidden">&nbsp;</i></a></li>
        </ul>
        </div>
                
                
                <div class="col-md-8 contenedor-datos-ajax">
                    ...
                </div>
            </div>
        </div>
                </div>
                
              <!-- <input id="testuvm" type="button" value="test uvm" />  -->
            </div>
        
          
        </div>
        <footer>
        <div class="container"> 
          <?php $this->load->view("footer/footer1.php");?>
        </div>
        </footer>
        <?= load_bootstrap_js();?>
        
        <script>
          $("#init").on("click",function()
          {
              
              var cod='<div id="p2" style="display: none" class="panel panel-default"><div class="panel-heading"></div><div class="outputpaso"></div></div>';
            $(".contenedor-datos-ajax").html(cod);
            $("#p2").css("display","block");
            $(".outputpaso" ).html('<span>&nbsp;Procesando...</span><img style="height: 25px; width: 100px;" src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
           
              $.ajax({
  type: "POST",
  url: "<?= base_url("c_p/uvm_c/iniciar");?>/",
  data: "",
  success: function(data){
    //  $("#carbdd").toggleClass("hidden");
      $( ".contenedor-datos-ajax" ).html( data );
      var cod='<div id="p2" style="display: none" class="panel panel-default"><div class="panel-heading"></div><div class="outputpaso"></div></div>';
            $(".contenedor-datos-ajax").append(cod);
            $("#p2").css("display","block");
             $(".outputpaso" ).append('<span>&nbsp;Procesando...</span><img style="height: 25px; width: 100px;" src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
           
     normaliza_modal();
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) { 
    $( ".contenedor-datos-ajax" ).append(XMLHttpRequest.responseText)           ; 
  }
});
          });
        
       
        
        function normaliza_modal()
        {
            //$this->db_santander->truncate("base_deuda")    
   $.ajax({
  type: "POST",
  url: "<?= base_url("c_p/uvm_c/normaliza");?>/",
  data: "",
  success: function(data){
   //   $("#carbdd").toggleClass("hidden");
   $(".outputpaso" ).html();$(".outputpaso" ).empty(); $(".outputpaso" ).remove();
   $("#p2" ).html();$("#p2" ).empty(); $("#p2" ).remove();
   
   
      $( ".contenedor-datos-ajax" ).append( data );
     //  $( ".contenedor-datos-ajax" ).html( data );
      var cod='<div id="p2" style="display: none" class="panel panel-default"><div class="panel-heading"></div><div class="outputpaso"></div></div>';
           // $(".contenedor-datos-ajax").append(cod);
            $("#p2").css("display","block");
            $(".outputpaso" ).append('<span>&nbsp;Procesando...</span><img style="height: 25px; width: 100px;" src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
           
     
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) { 
    $( ".contenedor-datos-ajax" ).append( XMLHttpRequest.responseText );
  }
});                                                      ;
        }
        
        function paso_3()
        {
          
    $.ajax({
  type: "POST",
  url: "<?= base_url("c_p/uvm_c/carga_base_sitrel");?>/",
  data: "",
  success: function(data){
   //   $("#carbdd").toggleClass("hidden");
   $(".outputpaso" ).html();$(".outputpaso" ).empty(); $(".outputpaso" ).remove();
   $("#p2" ).html();$("#p2" ).empty(); $("#p2" ).remove();
   
   
      $( ".contenedor-datos-ajax" ).append( data );
     //  $( ".contenedor-datos-ajax" ).html( data );
      var cod='<div id="p2" style="display: none" class="panel panel-default"><div class="panel-heading"></div><div class="outputpaso"></div></div>';
           // $(".contenedor-datos-ajax").append(cod);
            $("#p2").css("display","block");
             $(".outputpaso" ).append('<span>&nbsp;Procesando...</span><img style="height: 25px; width: 100px;" src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
           
   //   paso_4();
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) { 
    $( ".contenedor-datos-ajax" ).append( XMLHttpRequest.responseText );
  }
}); 
        }
        
        
         function update_pagos()
        {
    /*    var cod='<div id="p2" style="display: none" class="panel panel-default"><div class="panel-heading"></div><div class="outputpaso"></div></div>';
            $(".contenedor-datos-ajax").html(cod);
            $("#p2").css("display","block");
            $(".outputpaso" ).append('<span>&nbsp;Procesando...</span><img style="height: 25px; width: 100px;" src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
        */   
       $.ajax({
  type: "POST",
  url: "<?= base_url("c_p/uvm_c/update_pagos");?>/",
  data: "",
  success: function(data){
   //   $("#carbdd").toggleClass("hidden");
   $(".outputpaso" ).html();$(".outputpaso" ).empty(); $(".outputpaso" ).remove();
   $("#p2" ).html();$("#p2" ).empty(); $("#p2" ).remove();
   
   
      $( ".contenedor-datos-ajax" ).append( data );
     //  $( ".contenedor-datos-ajax" ).html( data );
      var cod='<div id="p2" style="display: none" class="panel panel-default"><div class="panel-heading"></div><div class="outputpaso"></div></div>';
           // $(".contenedor-datos-ajax").append(cod);
            $("#p2").css("display","block");
             $(".outputpaso" ).append('<span>&nbsp;Procesando...</span><img style="height: 25px; width: 100px;" src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
           
     
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) { 
    $( ".contenedor-datos-ajax" ).append( XMLHttpRequest.responseText );
  }
}); 
        }
        
        function paso_5()
        {
            $.ajax({
  type: "POST",
  url: "<?= base_url("c_p/santander_c/paso_5");?>/",
  data: "",
  success: function(data){
   //   $("#carbdd").toggleClass("hidden");
   $(".outputpaso" ).html();$(".outputpaso" ).empty(); $(".outputpaso" ).remove();
   $("#p2" ).html();$("#p2" ).empty(); $("#p2" ).remove();
   
   
      $( ".contenedor-datos-ajax" ).append( data );
     //  $( ".contenedor-datos-ajax" ).html( data );
      var cod='<div id="p2" style="display: none" class="panel panel-default"><div class="panel-heading"></div><div class="outputpaso"></div></div>';
           // $(".contenedor-datos-ajax").append(cod);
            $("#p2").css("display","block");
             $(".outputpaso" ).append('<span>&nbsp;Procesando...</span><img style="height: 25px; width: 100px;" src="<?=base_url('/imagenes/6C59C7124.gif');?>" width="100%"/>' );
           
      
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) { 
    $( ".contenedor-datos-ajax" ).append( XMLHttpRequest.responseText );
  }
}); 
            
        }
        </script>
    </body>
</html>
