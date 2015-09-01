<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends MY_Controller {

    protected $models = array('categorias');

    function index() {
        redirect('categorias/listado');
    }

    function listado() {
        $categorias = $this->categorias->getCategorias('es');

        $this->load->model('productos_model');

        foreach ($categorias as $categoria) {
            $productos = $this->productos_model->getProductosCategoria($categoria->id, 'es');
            $num_productos = sizeof($productos);
            $categoria->num_productos = $num_productos;
        }

        $this->data['categorias'] = $categorias;
    }

    function nueva() {
        $metodo = $this->input->server('REQUEST_METHOD');

        $this->load->model('idiomas_model');
        $idiomas = $this->idiomas_model->getIdiomas();

        $this->data['accion'] = 'Nueva';

        if ($metodo == 'POST') {
            $nombre = trim($this->input->post('nombre-es', TRUE));
            if ($nombre !== '') {
                $parametros = array('idiomas' => $idiomas, 'modelo' => $this->categorias);
                $this->load->library('categorias_library', $parametros);
                $resultado = $this->categorias_library->nueva($this->input->post(NULL, TRUE));

                $this->session->set_flashdata('resultado', $resultado);
                redirect('categorias/listado');
            } else {
                $this->session->set_flashdata('campo_obligatorio', 'Nombre');
            }
        }

        $this->view = 'categorias/editar.php';

        $this->data['idiomas_categorias'] = $idiomas;
    }

    function editar($id = '') {
        $metodo = $this->input->server('REQUEST_METHOD');

        if (ctype_digit($id) || is_int($id)) {
            $this->load->model('idiomas_model');
            $idiomas = $this->idiomas_model->getIdiomas();

            $this->data['accion'] = 'Editar';

            if ($metodo == 'POST') {
                $nombre = trim($this->input->post('nombre-es', TRUE));
                if ($nombre !== '') {
                    $parametros = array('idiomas' => $idiomas, 'modelo' => $this->categorias);
                    $this->load->library('categorias_library', $parametros);
                    $resultado = $this->categorias_library->editar($id, $this->input->post(NULL, TRUE));

                    $this->session->set_flashdata('resultado', $resultado);
                    redirect('categorias/listado');
                } else {
                    $this->session->set_flashdata('campo_obligatorio', 'Nombre');
                }
            }

            foreach ($idiomas as $idioma) {
                $idioma->categoria = $this->categorias->getCategoria($id, $idioma->codigo);
            }
            $this->data['idiomas_categorias'] = $idiomas;
        } else {
            redirect('error/ver');
        }
    }

    function eliminar($id = 0) {
        $metodo = $this->input->server('REQUEST_METHOD');

        if (ctype_digit($id) && $id > 0) {
            if ($metodo == 'GET') {
                $this->data['categoria'] = $this->categorias->getCategoria($id, 'es');

                $this->load->model('productos_model');
                $productos = $this->productos_model->getProductosCategoria($id, 'es');
                $num_productos = sizeof($productos);

                $this->data['num_productos'] = $num_productos;
            } elseif ($metodo == 'POST') {
                $parametros = array('idiomas' => NULL, 'modelo' => $this->categorias);
                $this->load->library('categorias_library', $parametros);
                $resultado = $this->categorias_library->eliminar($id);

                $this->session->set_flashdata('resultado', $resultado);
                redirect('categorias/listado');
            }
        } else {
            redirect('error/ver');
        }
    }

}
