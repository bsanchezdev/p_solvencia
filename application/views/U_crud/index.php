<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Paginación Codeigniter 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <table class="table table-striped">
    <?php
    //  var_dump($provincias);
    if($data_tabla)
    {
    ?>
        <tr>
            <?php
        foreach ($columnas as $key => $value) { ?>
       <th>
                <?= $value; ?>
            </th>     
      <?php
      }
            ?>
            
        </tr>
        <?php
    
        foreach ($data_tabla as $k => $v)
        {
        ?>
            <tr>
                
                    <?php 
                    foreach ($v as $key => $value) {
                        ?>
                    <td>
                            <?php
                         echo $value ;
                         ?>
                    </td>
                    <?php
                    }?>
                   
                
            </tr>
        <?php
        }
        ?>
    <?php
    }
    ?>
    </table>
    <?php echo $this->pagination->create_links() ?>
 
</body>
</html>