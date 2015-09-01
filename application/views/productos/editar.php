<div class="">
    <div class="row">
        <div class="col-md-9">
            <h2><?php echo($accion); ?> producto</h2>
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

    <?php
    if ($this->session->flashdata('campo_incorrecto')):
        ?>
        <div class="alert alert-danger error-campo" role="alert">El campo <?php echo $this->session->flashdata('campo_incorrecto'); ?> no tiene el formato correcto.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <?php
    endif;
    ?>

    <div class="contenido">
        <form class="form" action="" method="POST">
            <?php
            if (isset($producto)):
                $precio = $producto->precio;
                $id_categoria = $producto->id_categoria;
            else:
                $precio = '0.0';
                $id_categoria = '';
            endif;
            ?>
            <div class="col-md-12">
                <label for="nombre" class="">Categoría:</label>
            </div>
            <div class="form-group">
                <div class="col-md-11">
                    <select name="categoria" class="form-control">
                        <?php
                        foreach ($categorias as $categoria):
                            ?>
                            <option value="<?php echo $categoria->id; ?>" <?php if ($id_categoria === $categoria->id) echo 'selected="selected"' ?>><?php echo $categoria->nombre; ?></option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>

            <?php
            if (isset($idiomas_productos)):
                ?>
                <div class="col-md-12">
                    <label for="nombre" class="">Nombre:</label>
                </div>
                <?php
                foreach ($idiomas_productos as $idioma_producto):
                    if (isset($idioma_producto->producto)):
                        $nombre = $idioma_producto->producto->nombre;
                    else:
                        $nombre = '';
                    endif;
                    ?>
                    <div class="form-group">
                        <div class="col-md-11">
                            <input type="text" class="form-control" name="nombre-<?php echo $idioma_producto->codigo; ?>" value="<?php echo $nombre; ?>">
                        </div>
                        <div class="col-md-1">
                            <img src="<?php echo base_url(); ?>img/<?php echo $idioma_producto->bandera; ?>" width="33" class="img-thumbnail">
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>

                <div class="col-md-12">
                    <label for="nombre" class="">Descripción:</label>
                </div>
                <?php
                foreach ($idiomas_productos as $idioma_producto):
                    if (isset($idioma_producto->producto)):
                        $descripcion = $idioma_producto->producto->descripcion;
                    else:
                        $descripcion = '';
                    endif;
                    ?>
                    <div class="form-group">
                        <div class="col-md-11">
                            <textarea class="form-control" name="descripcion-<?php echo $idioma_producto->codigo; ?>"><?php echo $descripcion; ?></textarea>
                        </div>
                        <div class="col-md-1">
                            <img src="<?php echo base_url(); ?>img/<?php echo $idioma_producto->bandera; ?>" width="33" class="img-thumbnail">
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>

                <div class="col-md-7">
                    <label for="nombre" class="">Precio:</label>
                </div>
                <div class="col-md-5">
                    <label for="nombre" class="">Colores:</label>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="precio" value="<?php echo number_format($precio, 2); ?>">
                    </div>
                    <div class="col-md-3">
                        <span class="euro">€</span>
                    </div>
                    <div class="col-md-5">
                        <?php
                        foreach ($colores as $color):
                            $checked = '';
                            if (isset($productos_colores)):
                                if (in_array($color->id, $productos_colores)):
                                    $checked = 'checked="checked"';
                                endif;
                            endif;
                            ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="color-<?php echo $color->id; ?>" value="<?php echo $color->nombre; ?>" <?php echo $checked; ?>>
                                    <?php echo $color->nombre; ?>
                                </label>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <a class="btn btn-default" href="<?php echo base_url('productos/listado'); ?>" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>

                <?php
            endif;
            ?>
        </form>

    </div>
</div>