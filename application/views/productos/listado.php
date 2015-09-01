<div class="">
    <div class="row titulo">
        <div class="col-md-9">
            <h2>Listado de productos</h2>
        </div>
        <div class="col-md-3 text-right">
            <a class="btn btn-default" href="<?php echo base_url('productos/nuevo'); ?>" role="button">Nuevo producto</a>
        </div>
    </div>

    <?php
    if ($this->session->flashdata('resultado')):
        if ($this->session->flashdata('resultado') === TRUE):
            ?>
            <div class="alert alert-success" role="alert">Los datos se han guardado correctamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <?php
        endif;
    endif;
    ?>

    <div class="contenido">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class='texto-grande'>
                    <td width="50" align="right">id</td>
                    <td>Categoría</td>
                    <td>Nombre</td>
                    <td align="center">Precio</td>
                    <td width="130" align="center">Colores</td>
                    <td width="120"></td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($productos as $producto):
                    ?>
                    <tr>
                        <td align="right"><?php echo $producto->id; ?></td>
                        <td><?php echo $producto->categoria->nombre; ?></td>
                        <td><?php echo $producto->nombre; ?></td>
                        <td align="center"><?php echo number_format($producto->precio, 2); ?> €</td>
                        <td align="center">
                            <?php
                            if (sizeof($producto->colores) > 0):
                                ?>
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="" data-toggle="dropdown">

                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <?php
                                        foreach ($producto->colores as $color):
                                            ?>
                                            <li><a><?php echo $color->color; ?></a></li>
                                            <?php
                                        endforeach;
                                        ?>
                                    </ul>
                                </div>
                                <?php
                            endif;
                            ?>

                        </td>
                        <td align="center">
                            <a href="<?php echo base_url('productos/editar/' . $producto->id); ?>" role="button" class="btn btn-default" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="<?php echo base_url('productos/eliminar/' . $producto->id); ?>" role="button" class="btn btn-default" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
            <tfoot>
                <tr class='texto-grande'><td></td><td colspan="5"><?php echo sizeof($productos); ?> productos en total</td></tr>
            </tfoot>
        </table>
    </div>
</div>