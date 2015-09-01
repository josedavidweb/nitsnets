<!DOCTYPE html>
<html>
    <head>
        <title>Nitsnets</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="<?php echo base_url(); ?>css/estilos.css" rel="stylesheet" />
    </head>
    <body>
        
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 contenedor">
                <?php require_once('application/views/modulos/cabecera.php'); ?>
                <main>

                    <?php
                    echo $yield;
                    ?>

                </main>
            </div>
            <div class="col-md-2">
            </div>
        </div>

        <div class="clear-both"></div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
    </body>
</html>