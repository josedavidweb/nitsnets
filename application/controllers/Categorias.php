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
        $metodo = $_SERVER['REQUEST_METHOD'];

		$this->load->model('idiomas_model');
		$idiomas = $this->idiomas_model->getIdiomas();

		$this->data['accion'] = 'Nueva';

		if ($metodo == 'POST') {
			$nombre = trim($this->input->post('nombre-es'));
			if ($nombre !== '') {
				$resultado_insert = $this->categorias->insertCategoria();
				if ($resultado_insert) {
					$ultimoId = $this->categorias->getUltimoId()->id;
					foreach ($idiomas as $idioma) {
						$nombre = (trim($this->input->post('nombre-' . $idioma->codigo)));
						$this->categorias->insertCategoriaIdioma($ultimoId, $idioma->id, $nombre);
					}
				}

				$this->session->set_flashdata('resultado', $resultado_insert);
				redirect('categorias/listado');
			} else {
				$this->session->set_flashdata('campo_obligatorio', 'Nombre');
			}
		}
		
		$this->view = 'categorias/editar.php';
		
		$this->data['idiomas_categorias'] = $idiomas;
    }

	function editar($id = '') {
        $metodo = $_SERVER['REQUEST_METHOD'];

        if (ctype_digit($id) || is_int($id)) {
            $this->load->model('idiomas_model');
            $idiomas = $this->idiomas_model->getIdiomas();

			$this->data['accion'] = 'Editar';

			if ($metodo == 'POST') {
				$nombre = trim($this->input->post('nombre-es'));
				if ($nombre !== '') {
					foreach ($idiomas as $idioma) {
						$nombre = (trim($this->input->post('nombre-' . $idioma->codigo)));
						$resultado_update = $this->categorias->updateCategoria($id, $nombre, $idioma->codigo);
					}

					$this->session->set_flashdata('resultado', $resultado_update);
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
        $metodo = $_SERVER['REQUEST_METHOD'];

        if (ctype_digit($id) && $id > 0) {
            if ($metodo == 'GET') {
                $this->data['categoria'] = $this->categorias->getCategoria($id, 'es');

                $this->load->model('productos_model');
                $productos = $this->productos_model->getProductosCategoria($id, 'es');
                $num_productos = sizeof($productos);

                $this->data['num_productos'] = $num_productos;
            } elseif ($metodo == 'POST') {
                $resultado_delete = $this->categorias->deleteCategoria($id);

                $this->session->set_flashdata('resultado', $resultado_delete);
                redirect('categorias/listado');
            }
        } else {
            redirect('error/ver');
        }
    }

}
