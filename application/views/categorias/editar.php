<div class="">
    <div class="row">
        <div class="col-md-9">
            <h2><?php echo($accion); ?> categoría</h2>
        </div>
        <div class="col-md-3 text-right">

        </div>
    </div>

    <?php
    if ($this->session->flashdata('campo_obligatorio')):
        ?>
        <div class="alert alert-danger error-campo" role="alert">El campo <?php echo $this->session->flashdata('campo_obligatorio'); ?> es obligatorio.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <?php
    endif;
    ?>

    <div class="contenido">
        <form class="form" action="" method="POST">
            <div class="col-md-12">
                <label for="nombre" class="">Nombre:</label>
            </div>
            <?php
            if (isset($idiomas_categorias)):
                foreach ($idiomas_categorias as $idioma_categoria):
                    if (isset($idioma_categoria->categoria)):
                        $nombre = $idioma_categoria->categoria->nombre;
                    else:
                        $nombre = '';
                    endif;
                    ?>
                    <div class="form-group">
                        <div class="col-md-11">
                            <input type="text" class="form-control" name="nombre-<?php echo $idioma_categoria->codigo; ?>" value="<?php echo $nombre; ?>">
                        </div>
                        <div class="col-md-1">
                            <img src="<?php echo base_url(); ?>img/<?php echo $idioma_categoria->bandera; ?>" width="33" class="img-thumbnail">
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>

                <div class="form-group">
                    <div class="col-md-12">
                        <a class="btn btn-default" href="<?php echo base_url('categorias/listado'); ?>" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>

                <?php
            endif;
            ?>
        </form>

    </div>
</div>