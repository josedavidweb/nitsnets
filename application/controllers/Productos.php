<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends MY_Controller {

    protected $models = array('productos');

    function index() {
        redirect('productos/listado');
    }

    function listado() {
        $productos = $this->productos->getProductos('es');

        $this->load->model('categorias_model');
        $this->load->model('colores_model');

        foreach ($productos as $producto) {
            $producto->categoria = $this->categorias_model->getCategoria($producto->id_categoria, 'es');
            $producto->colores = $this->colores_model->getColorProductos($producto->id, 'es');
        }

        $this->data['productos'] = $productos;
    }

    function nuevo() {
        $metodo = $_SERVER['REQUEST_METHOD'];
	
		$this->load->model('idiomas_model');
		$idiomas = $this->idiomas_model->getIdiomas();

		$this->load->model('categorias_model');
		$categorias = $this->categorias_model->getCategorias('es');

		$this->load->model('colores_model');
		$colores = $this->colores_model->getColores('es');
		
		$this->data['accion'] = 'Nuevo';
		
		if ($metodo == 'POST') {
			$nombre = trim($this->input->post('nombre-es'));
			if ($nombre !== '') {
				$precio = trim($this->input->post('precio'));
				if ($precio !== '') {
					if (is_numeric($precio) && ((float) $precio > 0)) {
						$categoria = trim($this->input->post('categoria'));
						$resultado_insert = $this->productos->insertProducto($categoria, number_format($precio, 2));
						if ($resultado_insert) {
							$ultimoId = $this->productos->getUltimoId()->id;
							foreach ($idiomas as $idioma) {
								$nombre = (trim($this->input->post('nombre-' . $idioma->codigo)));
								$descripcion = (trim($this->input->post('descripcion-' . $idioma->codigo)));
								$this->productos->insertProductoIdioma($ultimoId, $idioma->id, $nombre, $descripcion);
							}
							
							foreach ($colores as $color) {
								if ($this->input->post('color-' . $color->id)) {
									$this->productos->insertProductoColores($ultimoId, $color->id);
								}
							}
						}
						
						$this->session->set_flashdata('resultado', $resultado_insert);
						redirect('productos/listado');
					} else {
						$this->session->set_flashdata('campo_incorrecto', 'Precio');
					}
				} else {
					$this->session->set_flashdata('campo_obligatorio', 'Precio');
				}
			} else {
				$this->session->set_flashdata('campo_obligatorio', 'Nombre');
			}
		}

		$this->view = 'productos/editar.php';
		
		$this->data['idiomas_productos'] = $idiomas;

		$this->data['categorias'] = $categorias;
		$this->data['colores'] = $colores;
    }

	function editar($id = '') {
        $metodo = $_SERVER['REQUEST_METHOD'];

        if (ctype_digit($id) || is_int($id)) {
            $this->load->model('idiomas_model');
            $idiomas = $this->idiomas_model->getIdiomas();

            $this->load->model('categorias_model');
            $categorias = $this->categorias_model->getCategorias('es');

            $this->load->model('colores_model');
            $colores = $this->colores_model->getColores('es');

			$this->data['accion'] = 'Editar';

			if ($metodo == 'POST') {
				$nombre = trim($this->input->post('nombre-es'));
				if ($nombre !== '') {
					$precio = trim($this->input->post('precio'));
					if ($precio !== '') {
						if (is_numeric($precio) && ((float) $precio > 0)) {
							$categoria = trim($this->input->post('categoria'));
							foreach ($idiomas as $idioma) {
								$nombre = (trim($this->input->post('nombre-' . $idioma->codigo)));
								$descripcion = (trim($this->input->post('descripcion-' . $idioma->codigo)));

								$resultado_update = $this->productos->updateProducto($id, number_format($precio, 2), $categoria);
								$resultado_update_idioma = false;
								if ($resultado_update) {
									$resultado_update_idioma = $this->productos->updateProductoIdioma($id, $nombre, $descripcion, $idioma->codigo);
								}
							}

							$this->productos->deleteProductoColores($id);

							foreach ($colores as $color) {
								if ($this->input->post('color-' . $color->id)) {
									$this->productos->insertProductoColores($id, $color->id);
								}
							}

							$this->session->set_flashdata('resultado', $resultado_update_idioma);
							redirect('productos/listado');
						} else {
							$this->session->set_flashdata('campo_incorrecto', 'Precio');
						}
					} else {
						$this->session->set_flashdata('campo_obligatorio', 'Precio');
					}
				} else {
					$this->session->set_flashdata('campo_obligatorio', 'Nombre');
				}
			}

			$this->data['producto'] = $this->productos->getProducto($id, 'es');

			foreach ($idiomas as $idioma) {
				$idioma->producto = $this->productos->getProducto($id, $idioma->codigo);
			}
			$this->data['idiomas_productos'] = $idiomas;

			$productos_colores = $this->colores_model->getColorProductos($id, 'es');

			$producto_colores_array = Array();
			foreach ($productos_colores as $producto_color) {
				$producto_colores_array[] = $producto_color->id_colores;
			}
			$this->data['productos_colores'] = $producto_colores_array;

            $this->data['categorias'] = $categorias;
            $this->data['colores'] = $colores;
        } else {
            redirect('error/ver');
        }
    }
	
    function eliminar($id = 0) {
        $metodo = $_SERVER['REQUEST_METHOD'];

        if (ctype_digit($id) && $id > 0) {
            if ($metodo == 'GET') {
                $this->data['producto'] = $this->productos->getProducto($id, 'es');

                $this->load->model('colores_model');

                $this->data['productos_colores'] = $this->colores_model->getColorProductos($id, 'es');
            } elseif ($metodo == 'POST') {
                $resultado_delete = $this->productos->deleteProducto($id);

                $this->session->set_flashdata('resultado', $resultado_delete);
                redirect('productos/listado');
            }
        } else {
            redirect('error/ver');
        }
    }

}
