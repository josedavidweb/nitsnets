<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_library {

    protected $idiomas, $modelo;

    public function __construct($parametros) {
        $this->idiomas = $parametros['idiomas'];
        $this->modelo = $parametros['modelo'];
    }

    public function nueva($campos) {
        $resultado = $this->modelo->insertCategoria();
        if ($resultado) {
            $ultimoId = $this->modelo->getUltimoId()->id;
            foreach ($this->idiomas as $idioma) {
                $nombre = (trim($campos['nombre-' . $idioma->codigo]));
                $this->modelo->insertCategoriaIdioma($ultimoId, $idioma->id, $nombre);
            }
        }

        return $resultado;
    }

    public function editar($id, $campos) {
        foreach ($this->idiomas as $idioma) {
            $nombre = (trim($campos['nombre-' . $idioma->codigo]));
            $resultado = $this->modelo->updateCategoria($id, $nombre, $idioma->codigo);
        }

        return $resultado;
    }

    public function eliminar($id) {
        $resultado = $this->modelo->deleteCategoria($id);
        
        return $resultado;
    }

}
