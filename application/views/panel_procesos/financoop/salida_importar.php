<ul class="list-group">
    <li class="list-group-item" style="background-color: rgb(243, 208, 138);"><div class="row" style="background-color: rgb(224, 202, 158);"><div class="col-md-6" >TABLA</div> <div class="col-md-6" style="text-align: right">REGISTROS</div></div></li>
    <?php
        
//        var_dump($registros_insertados);
$total=0;
        foreach ($registros_insertados as $key => $value) {
            $total+=$value;
    ?>
    <li class="list-group-item"><div class="row"><div class="col-md-6"><?=$key?></div><div class="col-md-6" style="text-align: right"><?=$value?></div></div> </li>     
            <?php
}

        ?>
    <li class="list-group-item"><div class="row"><div class="col-md-6">TOTAL:</div> <div class="col-md-6" style="text-align: right"><?=$total?></div></div></li>
          
        </ul>
        

<script>
    $("#importar").addClass("btn-success");
    $("#anexar").addClass("btn-success");
    
</script>