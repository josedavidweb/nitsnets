<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Idiomas_model extends CI_Model {

    //Obtiene un idioma por código
    function getIdioma($codigo_idioma) {
        $this->db->select('id, nombre, bandera');
        $this->db->from('idiomas');
        $this->db->where('codigo',$codigo_idioma);
        $query = $this->db->get();

        $idioma = NULL;

        if ($query->num_rows() > 0) {
            $idioma = $query->first_row();
        }

        return $idioma;
    }
    
    //Obtiene todos los idiomas
    function getIdiomas() {
        $this->db->select('id, codigo, nombre, bandera');
        $this->db->from('idiomas');
//        $this->db->where('codigo <>',$codigo_idioma);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();

        $idiomas = array();

        foreach ($query->result() as $idioma) {
            $idioma->nombre = stripslashes($idioma->nombre);
            
            $idiomas[] = $idioma;
        }

        return $idiomas;
    }
    



}
