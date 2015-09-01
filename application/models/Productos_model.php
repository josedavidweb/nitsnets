<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {

    //Obtiene todos los productos
    function getProductos($codigo_idioma) {
        $this->db->select('id_categoria, id, nombre, descripcion, precio');
        $this->db->from('listar_productos');
        $this->db->where('codigo', $codigo_idioma);
        $this->db->order_by('nombre', 'ASC');
        $query = $this->db->get();

        $productos = array();

        foreach ($query->result() as $producto) {
            $producto->nombre = stripslashes($producto->nombre);

            $productos[] = $producto;
        }

        return $productos;
    }

    //Obtiene un producto por id
    function getProducto($id, $codigo_idioma) {
        $this->db->select('id_categoria, id, nombre, descripcion, precio');
        $this->db->from('listar_productos');
        $this->db->where('id', $id);
        $this->db->where('codigo', $codigo_idioma);
        $query = $this->db->get();

        $producto = NULL;

        if ($query->num_rows() > 0) {
            $producto = $query->first_row();
        }

        return $producto;
    }

    //Obtiene todos los productos por categoría
    function getProductosCategoria($id_categoria, $codigo_idioma) {
        $this->db->select('id, nombre, descripcion, precio');
        $this->db->from('listar_productos');
        $this->db->where('codigo', $codigo_idioma);
        $this->db->where('id_categoria', $id_categoria);
        $this->db->order_by('nombre', 'ASC');
        $query = $this->db->get();

        $productos = array();

        foreach ($query->result() as $producto) {
            $producto->nombre = stripslashes($producto->nombre);

            $productos[] = $producto;
        }

        return $productos;
    }

    //Obtiene todos los productos por color
    function getProductosColor($id) {
        $this->db->select('fk_productos');
        $this->db->from('productos_colores');
        $this->db->where('fk_colores', $id);
        $this->db->order_by('fk_productos', 'ASC');
        $query = $this->db->get();

        $productos = array();

        foreach ($query->result() as $producto) {
            $productos[] = $producto;
        }

        return $productos;
    }

    //Actualiza un producto
    function updateProducto($id, $precio, $categoria) {
        $datos = array(
            'precio' => $precio,
            'fk_categorias' => $categoria,
        );

        $this->db->where('id', $id);
        $query = $this->db->update('productos', $datos);

        return $query;
    }
    
    //Actualiza los textos de un producto
    function updateProductoIdioma($id, $nombre, $descripcion, $codigo_idioma) {
        $datos = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
        );

        $this->db->where('id', $id);
        $this->db->where('codigo', $codigo_idioma);
        $query = $this->db->update('listar_productos', $datos);

        return $query;
    }
    
    //Inserta un producto
    function insertProducto($categoria, $precio) {
        $datos = array(
            'fk_categorias' => $categoria,
            'precio' => $precio
        );

        $query = $this->db->insert('productos', $datos);

        return $query;
    }

    //Obtiene el último id de la tabla productos
    function getUltimoId() {
        $this->db->select_max('id');
        $query = $this->db->get('productos');

        return $query->first_row();
    }

    //Inserta los textos de un producto
    function insertProductoIdioma($fk_productos, $fk_idiomas, $nombre, $descripcion) {
        $datos = array(
            'fk_productos' => $fk_productos,
            'fk_idiomas' => $fk_idiomas,
            'nombre' => $nombre,
            'descripcion' => $descripcion
        );

        $query = $this->db->insert('productos_idiomas', $datos);

        return $query;
    }

    //Inserta los colores de un producto
    function insertProductoColores($fk_productos, $fk_colores) {
        $datos = array(
            'fk_productos' => $fk_productos,
            'fk_colores' => $fk_colores
        );

        $query = $this->db->insert('productos_colores', $datos);

        return $query;
    }

    //Elimina los colores de un producto
    function deleteProductoColores($fk_productos) {
        $datos = array(
            'fk_productos' => $fk_productos
        );

        $query = $this->db->delete('productos_colores', $datos);

        return $query;
    }

    //Elimina un producto
    function deleteProducto($id) {
        $datos = array(
            'id' => $id
        );

        $query = $this->db->delete('productos', $datos);

        return $query;
    }

}
