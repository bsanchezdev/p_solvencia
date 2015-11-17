<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PANEL DE APLICACIONES</title>
        <?=load_bootstrap_css();?>
        <style>
            .active_a {
            text-shadow: 0px -1px 0px #FFF !important;
            background-image: linear-gradient(to bottom, #647D92 0px, #2C6F93 100%) !important;
            background-repeat: repeat-x !important;
            border-color: #B0BFCE !important;
            color: white !important;
            }

.panel-a > .panel-heading {
    background-image: linear-gradient(to bottom, #A1A1A1 0px, #98948C 100%);
    background-repeat: repeat-x;
    color: white;
}
        </style>
    </head>
    <body>
        
        <div class="container"> 
              
            <?php $this->load->view("headers/uno.php");?>
           

            <!-- -->
            
            <div class="contenedor-datos-ajax row " style="width: 101.3%;min-height: 540px; background-image: url(<?=base_url("imagenes/3ds_website-background-tiled_100.jpg")?>)">
           
            </div>
            
            
        </div>
        <div class="container"> 
          <?php $this->load->view("footer/footer1.php");?>
        </div>
            <?=load_bootstrap_js();?>
</body>
</html>
