<div class="">
    <div class="row">
        <div class="col-md-9">
            <h2>Eliminar producto</h2>
        </div>
        <div class="col-md-3 text-right">

        </div>
    </div>

    <div class="contenido">
        <form class="form" action="" method="POST">
            <?php
            if (isset($producto)):
                ?>
                <div class="col-md-12">
                    <label for="nombre" class="">Nombre:</label>
                    <div class="well well-sm"><?php echo $producto->nombre; ?></div>
                </div>

                <div class="col-md-12">
                    <label for="nombre" class="">Descripción:</label>
                    <div class="well well-sm"><?php echo $producto->descripcion; ?></div>
                </div>

                <div class="col-md-12">
                    <label for="nombre" class="">Colores:</label>
                    <div class="well well-sm">
                        <div class="checkbox">
                            <?php
                            if (sizeof($productos_colores) > 0):
                                foreach ($productos_colores as $producto_color):
                                    ?>
                                    <label>
                                        <input type="checkbox" checked="checked" disabled="disabled">
                                        <?php echo $producto_color->color; ?>
                                    </label>
                                    <?php
                                endforeach;
                            else:
                                ?>
                                <label>
                                    <span>Este producto no está en ningún color</span>
                                </label>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                    <?php
                    if (isset($producto)):
                        ?>
                        <div class="alert alert-warning" role="alert">¿Seguro que quiere eliminar el producto?</div>
                        <?php
                    endif;
                    ?>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <a class="btn btn-default" href="<?php echo base_url('productos/listado'); ?>" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-success">Eliminar</button>
                    </div>
                </div>

                <?php
            endif;
            ?>
        </form>

    </div>
</div>