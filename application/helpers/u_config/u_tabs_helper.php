<?php
function tab_headers($n_driver)
{
    $CI = & get_instance();  //get instance, access the CI superobject
   $contador = $CI->session->userdata("contador");
    $clck="";
    if($contador==1):
        $active="active";
    $clck="click";
    endif;
?>   
  
    <li id="t_<?= $n_driver ?>" class="<?= $clck?>" >
        <a class="<?= @$active." ".$clck;?>" data-toggle="tabajax" data-target="#dt_<?=$n_driver?>" href="<?= base_url("u_config/driver_conf/u_drivconf/load/".$n_driver)?>" data-toggle="tab" id="<?= $n_driver?>"><?= $n_driver?></a>
    </li>   
   
    <script>    
    $("#head-tab").append($("#t_<?= $n_driver ?>"));
    $(".initmsg").empty();
    </script>
<?php
}

function t_cont($n_driver)
{ 
    $active="";
     $CI = & get_instance();  //get instance, access the CI superobject
   $contador = $CI->session->userdata("contador");
     if($contador==1):
         $active="in active";
     endif;
    
    ?>
    

<div class="tab-pane fade <?= $active; ?>" id="dt_<?= $n_driver;?>">Default <?= $n_driver;?></div>                   


    <script>    
    $("#pbody").append($("#dt_<?= $n_driver ?>"));
    
    </script>
<?php }


function remove_tab_header($n_driver)
{
    ?>
    <script>
        tt="#dt_<?= $n_driver?>";
      //  alert(tt);
        tabs[tt]=false;
    $("#t_<?= $n_driver ?>").remove();
    $("#dt_<?= $n_driver ?>").remove();
    </script>
    <?php
}
