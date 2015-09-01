<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Colores_library {

    protected $idiomas, $modelo;

    public function __construct($parametros) {
        $this->idiomas = $parametros['idiomas'];
        $this->modelo = $parametros['modelo'];
    }

    public function nuevo($campos) {
        $resultado = $this->modelo->insertColor();
        if ($resultado) {
            $ultimoId = $this->modelo->getUltimoId()->id;
            foreach ($this->idiomas as $idioma) {
                $nombre = (trim($campos['nombre-' . $idioma->codigo]));
                $this->modelo->insertColorIdioma($ultimoId, $idioma->id, $nombre);
            }
        }

        return $resultado;
    }

    public function editar($id, $campos) {
        foreach ($this->idiomas as $idioma) {
            $nombre = (trim($campos['nombre-' . $idioma->codigo]));
            $resultado = $this->modelo->updateColor($id, $nombre, $idioma->codigo);
        }

        return $resultado;
    }

    public function eliminar($id) {
        $resultado = $this->modelo->deleteColor($id);
        
        return $resultado;
    }

}
