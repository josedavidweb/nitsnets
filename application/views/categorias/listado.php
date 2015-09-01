<div class="">
    <div class="row titulo">
        <div class="col-md-9">
            <h2>Listado de categorías</h2>
        </div>
        <div class="col-md-3 text-right">
            <a class="btn btn-default" href="<?php echo base_url('categorias/nueva'); ?>" role="button">Nueva categoría</a>
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
                    <td>Nombre</td>
                    <td width="130" align="center">Nº Productos</td>
                    <td width="120"></td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($categorias as $categoria):
                    ?>
                    <tr>
                        <td align="right"><?php echo $categoria->id; ?></td>
                        <td><?php echo $categoria->nombre; ?></td>
                        <td align="center"><?php echo $categoria->num_productos; ?></td>
                        <td align="center"">
                            <a href="<?php echo base_url('categorias/editar/' . $categoria->id); ?>" role="button" class="btn btn-default" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="<?php echo base_url('categorias/eliminar/' . $categoria->id); ?>" role="button" class="btn btn-default" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
            <tfoot>
                <tr class='texto-grande'><td></td><td colspan="4"><?php echo sizeof($categorias); ?> categorías en total</td></tr>
            </tfoot>
        </table>
    </div>
</div>