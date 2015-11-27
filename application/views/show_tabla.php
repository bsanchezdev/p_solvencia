<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Usuarios</title>
     <?= load_bootstrap_css() ?>
     <?= load_bootstrap_js() ?>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
</head>
<body>
    <p></p>
    <div class="container">
        <div class="row">
            

<div class="btn-group">
    <button id="crear" type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp;Agregar</button>
     <button id="refresh" type="button" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Refrescar</button>
</div>

            <hr>
        </div>
    <div class="row">
        <div class="col-xs-12 table-responsive">
    <table id="<?= $id_tab ?>" class="table table-striped table-condensed display">
    <thead>
    <?php
    if($data_tabla)
    {
    ?>
    <tr>
    <?php foreach ($columnas as $key => $value) { ?>
    <th> <?= $value; ?> </th>     
    <?php } ?>     
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data_tabla as $k => $v){ $count++?>
    <tr id="<?php echo $count ;?>">
    <?php foreach ($v as $key => $value) {  ?>
    <td><?= $value ?></td>
    <?php } ?>
    </tr>
    <?php
    }
    
    }
    ?>
    </tbody>
    </table>
        </div>
    </div>
    <?= $this->pagination->create_links() ?>
<hr>
<form style="background-color: rgb(248, 248, 248);border: 1px solid gray; padding: 20px;" action="<?= base_url('carga_usuarios_reportes/A/importarExcel');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div style="float:right">PUEDE IMPORTAR USUARIOS DESDE UN ARCHIVO EXCEL .XLSX</div>
<BR>
<input type="file" name="userfile" size="20" />
<br /><br />
<input type="submit" value="upload" />
</form>
        <div id="box">

    </div>
        <div class="contenedor-datos-ajax"></div>
    </div>
    <script>
        $(document).ready( function () {
    var selected = [];        
            
            
    $('#<?= $id_tab?>').DataTable(
            {
    paging: true,
    searching: true,
    ordering:  true,
    select: true, 
    info:     true,
        "rowCallback": function( row, data ) {
            if ( $.inArray(data.DT_RowId, selected) !== -1 ) {
                $(row).addClass('selected');
            }
        }
}
            );
    
    
    
     $('#<?= $id_tab?> tbody').on('click', 'tr', function () {
        var id = this.id;
        var datos = "";
        var index = $.inArray(id, selected);
 
        if ( index === -1 ) {
            selected.push( id );
        } else {
            selected.splice( index, 1 );
        }
      
     //   $(this).toggleClass('selected');
        
        $(this).find('td').each (function() {
            datos=datos+$(this).html()+"|";
          //  alert($(this).html());
});
$.ajax({
  method: "POST",
  url: "<?= base_url("carga_usuarios_reportes/A/seleccion"); ?>",
  data: { data: datos }
})
  .done(function( msg ) {
  $("#box").empty().html(msg)   ;
  });
    } );
} );


$("#crear").on("click",function()
{
    
$.ajax({
  method: "POST",
  url: "<?= base_url("carga_usuarios_reportes/A/add"); ?>",
  data: { data: "" }
})
  .done(function( msg ) {
  $("#box").empty().html(msg)   ;
  });
});

$("#refresh").on("click",function(){ window.location.replace("<?= base_url("carga_usuarios_reportes/A/");?>");});
    </script>
    
</body>
</html>