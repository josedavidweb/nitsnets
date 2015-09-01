<div class="">
    <div class="row">
        <div class="col-md-9">
            <h2>Eliminar color</h2>
        </div>
        <div class="col-md-3 text-right">

        </div>
    </div>

    <div class="contenido">
        <form class="form" action="" method="POST">
            <?php
            if (isset($color)):
                ?>
                <div class="col-md-12">
                    <label for="nombre" class="">Nombre:</label>
                </div>

                <div class="col-md-12">
                    <div class="well well-sm"><?php echo $color->nombre; ?></div>
                    <?php
                    if (isset($color)):
                        if ($num_productos === 0):
                            ?>
                            <div class="alert alert-warning" role="alert">¿Seguro que quiere eliminar el color?</div>
                            <?php
                        else:
                            ?>
                            <div class="alert alert-danger" role="alert">No se puede eliminar el color porque tiene productos asociados.</div>
                        <?php
                        endif;
                    endif;
                    ?>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <a class="btn btn-default" href="<?php echo base_url('colores/listado'); ?>" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-success" <?php if($num_productos > 0) echo "disabled='disabled'"; ?>>Eliminar</button>
                    </div>
                </div>

                <?php
            endif;
            ?>
        </form>

    </div>
</div>