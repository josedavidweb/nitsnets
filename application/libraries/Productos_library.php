<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_library {

    protected $idiomas, $colores, $modelo;

    public function __construct($parametros) {
        $this->idiomas = $parametros['idiomas'];
        $this->colores = $parametros['colores'];
        $this->modelo = $parametros['modelo'];
    }

    public function nuevo($campos) {
        $categoria = trim($campos['categoria']);
        $precio = trim($campos['precio']);
        $resultado = $this->modelo->insertProducto($categoria, number_format($precio, 2));
        if ($resultado) {
            $ultimoId = $this->modelo->getUltimoId()->id;
            foreach ($this->idiomas as $idioma) {
                $nombre = (trim($campos['nombre-' . $idioma->codigo]));
                $descripcion = (trim($campos['descripcion-' . $idioma->codigo]));
                $this->modelo->insertProductoIdioma($ultimoId, $idioma->id, $nombre, $descripcion);
            }

            foreach ($this->colores as $color) {
                if (isset($campos['color-' . $color->id])) {
                    $this->modelo->insertProductoColores($ultimoId, $color->id);
                }
            }
        }

        return $resultado;
    }

    public function editar($id, $campos) {
        $categoria = trim($campos['categoria']);
        $precio = trim($campos['precio']);
        $resultado = $this->modelo->updateProducto($id, number_format($precio, 2), $categoria);
        if ($resultado) {
            foreach ($this->idiomas as $idioma) {
                $nombre = (trim($campos['nombre-' . $idioma->codigo]));
                $descripcion = (trim($campos['descripcion-' . $idioma->codigo]));
                $resultado_idioma = $this->modelo->updateProductoIdioma($id, $nombre, $descripcion, $idioma->codigo);
            }
        }

        $this->modelo->deleteProductoColores($id);

        foreach ($this->colores as $color) {
            if (isset($campos['color-' . $color->id])) {
                $this->modelo->insertProductoColores($id, $color->id);
            }
        }

        return $resultado_idioma;
    }

    public function eliminar($id) {
        $resultado = $this->modelo->deleteProducto($id);

        return $resultado;
    }

}
