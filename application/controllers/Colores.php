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
        $metodo = $_SERVER['REQUEST_METHOD'];
		
		$this->load->model('idiomas_model');
		$idiomas = $this->idiomas_model->getIdiomas();

		$this->data['accion'] = 'Nuevo';

		if ($metodo == 'POST') {
			$nombre = trim($this->input->post('nombre-es'));
			if ($nombre !== '') {
				$resultado_insert = $this->colores->insertColor();
				if ($resultado_insert) {
					$ultimoId = $this->colores->getUltimoId()->id;
					foreach ($idiomas as $idioma) {
						$nombre = (trim($this->input->post('nombre-' . $idioma->codigo)));
						$this->colores->insertColorIdioma($ultimoId, $idioma->id, $nombre);
					}
				}

				$this->session->set_flashdata('resultado', $resultado_insert);
				redirect('colores/listado');
			} else {
				$this->session->set_flashdata('campo_obligatorio', 'Nombre');
			}
		}
		
		$this->view = 'colores/editar.php';
		
		$this->data['idiomas_colores'] = $idiomas;
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
						$resultado_update = $this->colores->updateColor($id, $nombre, $idioma->codigo);
					}
					
					$this->session->set_flashdata('resultado', $resultado_update);
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
        $metodo = $_SERVER['REQUEST_METHOD'];

        if (ctype_digit($id) && $id > 0) {
            if ($metodo == 'GET') {
                $this->data['color'] = $this->colores->getColor($id, 'es');

                $this->load->model('productos_model');
                $productos = $this->productos_model->getProductosColor($id);
                $num_productos = sizeof($productos);

                $this->data['num_productos'] = $num_productos;
            } elseif ($metodo == 'POST') {
                $resultado_delete = $this->colores->deleteColor($id);

                $this->session->set_flashdata('resultado', $resultado_delete);
                redirect('colores/listado');
            }
        } else {
            redirect('error/ver');
        }
    }

}
