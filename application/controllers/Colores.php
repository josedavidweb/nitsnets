<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Colores extends MY_Controller {

    protected $models = array('colores');

    function index() {
        redirect('colores/listado');
    }

    function listado() {
        $this->data['colores'] = $this->colores->getcolores('es');
    }

    function nuevo() {
        $metodo = $this->input->server('REQUEST_METHOD');

        $this->load->model('idiomas_model');
        $idiomas = $this->idiomas_model->getIdiomas();

        $this->data['accion'] = 'Nuevo';

        if ($metodo == 'POST') {
            $nombre = trim($this->input->post('nombre-es', TRUE));
            if ($nombre !== '') {
                $parametros = array('idiomas' => $idiomas, 'modelo' => $this->colores);
                $this->load->library('colores_library', $parametros);
                $resultado = $this->colores_library->nuevo($this->input->post(NULL, TRUE));

                $this->session->set_flashdata('resultado', $resultado);
                redirect('colores/listado');
            } else {
                $this->session->set_flashdata('campo_obligatorio', 'Nombre');
            }
        }

        $this->view = 'colores/editar.php';

        $this->data['idiomas_colores'] = $idiomas;
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
                    $parametros = array('idiomas' => $idiomas, 'modelo' => $this->colores);
                    $this->load->library('colores_library', $parametros);
                    $resultado = $this->colores_library->editar($id, $this->input->post(NULL, TRUE));

                    $this->session->set_flashdata('resultado', $resultado);
                    redirect('colores/listado');
                } else {
                    $this->session->set_flashdata('campo_obligatorio', 'Nombre');
                }
            }

            foreach ($idiomas as $idioma) {
                $idioma->color = $this->colores->getColor($id, $idioma->codigo);
            }
            $this->data['idiomas_colores'] = $idiomas;
        } else {
            redirect('error/ver');
        }
    }

    function eliminar($id = 0) {
        $metodo = $this->input->server('REQUEST_METHOD');

        if (ctype_digit($id) && $id > 0) {
            if ($metodo == 'GET') {
                $this->data['color'] = $this->colores->getColor($id, 'es');

                $this->load->model('productos_model');
                $productos = $this->productos_model->getProductosColor($id);
                $num_productos = sizeof($productos);

                $this->data['num_productos'] = $num_productos;
            } elseif ($metodo == 'POST') {
                $parametros = array('idiomas' => NULL, 'modelo' => $this->colores);
                $this->load->library('colores_library', $parametros);
                $resultado = $this->colores_library->eliminar($id);
                
                $this->session->set_flashdata('resultado', $resultado);
                redirect('colores/listado');
            }
        } else {
            redirect('error/ver');
        }
    }

}
