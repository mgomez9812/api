<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once APPPATH . '/libraries/REST_Controller.php';

	/**
	* clase para producto venta
	*/
	class Proventa extends REST_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('proventa_model');
		}

//optener todos los datos de la tabla Categoria
	public function index_get($seleccionar){
//se llama al modelo categoria
		$data = $this->proventa_model->get();
//se valida si el resultado no es null de la respuesta
		if(!is_null($data)){
			header('Content-Type: application/json; charset=UTF-8');
      header('Access-Control-Allow-Origin: *');

			if ($seleccionar == 0) {
				echo json_encode($data, JSON_PRETTY_PRINT);
			}
			else{
				$this->response( array('proventa'=>$data), 200);
			}
		}
		else{
			$this->response(null, 400);
		}
	}

	//obtener imagenes del producto
	public function imagen_get($id, $seleccionar){
		//se llama al modelo categoria
				$data = $this->proventa_model->fotografias();
		//se valida si el resultado no es null de la respuesta
				if(!is_null($data)){
					header('Content-Type: application/json; charset=UTF-8');
		      header('Access-Control-Allow-Origin: *');
					if ($seleccionar == 0) {
						echo json_encode($data, JSON_PRETTY_PRINT);
					}
					else{
						$this->response( array('fotografias'=>$data), 200);
					}
				}
				else{
					$this->response(null, 400);
				}
	}

//funcion para buscar por id en la tabla categoria
	public function find_get($id,$seleccionar){
//se valida que el id no sea null
		if(!$id){
			$this->response(null, 400);
		}
//se llama la funcion get
		$data = $this->proventa_model->get($id);
//si el return de la funcion es true se imprime el resultado
			if($data){
						header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Origin: *');
						if ($seleccionar == 0) {
							echo json_encode($data, JSON_PRETTY_PRINT);
						}
						else{
							$this->response( array('proventa'=>$data), 200);
						}
			}
			else{
				$this->response(null, 404);
			}
	}

	//funcion para insertar
	public function index_post(){
		if(!$this->post()){
						header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Origin: *');
			$this->response(null, 400);
		}

		$id = $this->proventa_model->save($this->post());

		if(!is_null($id)){
			$this->response(array('proventa'=>$id),200);
		}
		else{
			$this->response(array('error'=>'no save'),400);
		}
	}

	    //funcion para actualizar
    public function index_put($id){
        if(!$this->put() || !$id){
            $this->response(null, 400);
        }

        $update = $this->proventa_model->update($id, $this->put());

        if(!is_null($update)){
            $this->response(array('proventa'=>'correct update'),200);
        }
        else{
            $this->response(array('error'=>'no save'), 400);
        }
    }

    //para borrar un pastel
    public function index_delete($id){
        if(!$id){
            $this->response(null, 400);
        }

        $delete = $this->proventa_model->delete($id);

        if(!is_null($delete)){
            $this->response(array('proventa'=>'correct delete'), 200);
        }
        else{
            $this->response(array('error'=>'no save'), 400);
        }
    }

		//obtener ofertas del producto
		public function ofertas_get($id,$seleccionar){
			//se llama al modelo categoria
					$data = $this->proventa_model->ofertas();
			//se valida si el resultado no es null de la respuesta
					if(!is_null($data)){
						header('Content-Type: application/json; charset=UTF-8');
			            header('Access-Control-Allow-Origin: *');
									if ($seleccionar == 0) {
										echo json_encode($data, JSON_PRETTY_PRINT);
									}
									else{
										$this->response( array('proventas'=>$data), 200);
									}
					}
					else{
						$this->response(null, 400);
					}
		}
	}
 ?>
