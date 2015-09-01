<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colores_model extends CI_Model {

    //Obtiene todos los colores
    function getColores($codigo_idioma) {
        $this->db->select('id, nombre');
        $this->db->from('listar_colores');
        $this->db->where('codigo', $codigo_idioma);
        $this->db->order_by('nombre', 'ASC');
        $query = $this->db->get();

        $colores = array();

        foreach ($query->result() as $color) {
            $color->nombre = stripslashes($color->nombre);

            $colores[] = $color;
        }

        return $colores;
    }

    //Obtiene un color por id
    function getColor($id, $codigo_idioma) {
        $this->db->select('id, nombre');
        $this->db->from('listar_colores');
        $this->db->where('id', $id);
        $this->db->where('codigo', $codigo_idioma);
        $query = $this->db->get();

        $color = NULL;

        if ($query->num_rows() > 0) {
            $color = $query->first_row();
        }

        return $color;
    }

    //Obtiene todos los colores por producto
    function getColorProductos($id, $codigo_idioma) {
        $this->db->select('id_colores, color');
        $this->db->from('listar_productos_colores');
        $this->db->where('id', $id);
        $this->db->where('codigo', $codigo_idioma);
        $this->db->order_by('color', 'ASC');
        $query = $this->db->get();

        $colores = array();

        foreach ($query->result() as $color) {
            $colores[] = $color;
        }

        return $colores;
    }

    //Actualiza los textos de un color
    function updateColor($id, $nombre, $codigo_idioma) {
        $datos = array(
            'nombre' => $nombre
        );

        $this->db->where('id', $id);
        $this->db->where('codigo', $codigo_idioma);
        $query = $this->db->update('listar_colores', $datos);

        return $query;
    }

    //Inserta un color
    function insertColor() {
        $this->db->set('id', NULL);
        $query = $this->db->insert('colores');

        return $query;
    }

    //Obtiene el último id de la tabla colores
    function getUltimoId() {
        $this->db->select_max('id');
        $query = $this->db->get('colores');

        return $query->first_row();
    }

    //Inserta los textos de un color
    function insertColorIdioma($fk_colores, $fk_idiomas, $nombre) {
        $datos = array(
            'fk_colores' => $fk_colores,
            'fk_idiomas' => $fk_idiomas,
            'nombre' => $nombre
        );

        $query = $this->db->insert('colores_idiomas', $datos);

        return $query;
    }

    //Elimina un color
    function deleteColor($id) {
        $datos = array(
            'id' => $id
        );

        $query = $this->db->delete('colores', $datos);

        return $query;
    }

}
