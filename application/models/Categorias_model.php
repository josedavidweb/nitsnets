<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

    //Obtiene todas las categorías
    function getCategorias($codigo_idioma) {
        $this->db->select('id, nombre');
        $this->db->from('listar_categorias');
        $this->db->where('codigo', $codigo_idioma);
        $this->db->order_by('nombre', 'ASC');
        $query = $this->db->get();

        $categorias = array();

        foreach ($query->result() as $categoria) {
            $categoria->nombre = stripslashes($categoria->nombre);

            $categorias[] = $categoria;
        }

        return $categorias;
    }

    //Obtiene una categoría por id
    function getCategoria($id, $codigo_idioma) {
        $this->db->select('id, nombre');
        $this->db->from('listar_categorias');
        $this->db->where('id', $id);
        $this->db->where('codigo', $codigo_idioma);
        $query = $this->db->get();

        $categoria = NULL;

        if ($query->num_rows() > 0) {
            $categoria = $query->first_row();
        }

        return $categoria;
    }

    //Actualiza los textos de una categoría
    function updateCategoria($id, $nombre, $codigo_idioma) {
        $datos = array(
            'nombre' => $nombre
        );
        
        $this->db->where('id', $id);
        $this->db->where('codigo', $codigo_idioma);
        $query = $this->db->update('listar_categorias', $datos);

        return $query;
    }

    //Inserta una categoría
    function insertCategoria() {
        $this->db->set('id', NULL);
        $query = $this->db->insert('categorias');

        return $query;
    }

    //Obtiene el último id de la tabla categorías
    function getUltimoId() {
        $this->db->select_max('id');
        $query = $this->db->get('categorias');

        return $query->first_row();
    }

    //Inserta los textos de una categoría
    function insertCategoriaIdioma($fk_categorias, $fk_idiomas, $nombre) {
        $datos = array(
            'fk_categorias' => $fk_categorias,
            'fk_idiomas' => $fk_idiomas,
            'nombre' => $nombre
        );

        $query = $this->db->insert('categorias_idiomas', $datos);

        return $query;
    }

    //Elimina una categoría
    function deleteCategoria($id) {
        $datos = array(
            'id' => $id
        );

        $query = $this->db->delete('categorias', $datos);

        return $query;
    }

}
