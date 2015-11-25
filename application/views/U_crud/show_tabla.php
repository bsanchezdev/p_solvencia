<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title;?> - Paginación Codeigniter 3</title>
     <?= load_bootstrap_css() ?>
</head>
<body>
    
    <div class="container">
       
    <div class="row">
        <div class="col-xs-12 table-responsive">
    <table class="table table-striped table-condensed ">
    <?php
    if($data_tabla)
    {
    ?>
    <tr>
    <?php foreach ($columnas as $key => $value) { ?>
    <th> <?= $value; ?> </th>     
    <?php } ?>     
    </tr>
    <?php
    foreach ($data_tabla as $k => $v){ ?>
    <tr>
    <?php foreach ($v as $key => $value) { ?>
         <td><?= $value ?></td>
    <?php } ?>
    </tr>
    <?php
    }
    
    }
    ?>
    </table>
        </div>
    </div>
    <?= $this->pagination->create_links() ?>
    </div>
</body>
</html>