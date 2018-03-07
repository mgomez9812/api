<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

//para la clase categorias
class Categoria extends REST_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('categoria_model'

	);
	}
//optener todos los datos de la tabla Categoria
	public function index_get(){
//se llama al modelo categoria
		$categoria = $this->categoria_model->get();
//se valida si el resultado no es null de la respuesta
		if(!is_null($categoria)){
			header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Origin: *');
            //$this->response( array('categoria'=>$categoria), 200);
			echo json_encode($categoria, JSON_PRETTY_PRINT);
		}
		else{
			$this->response(null, 400);
		}
	}

//funcion para buscar por id en la tabla categoria
	public function find_get($id){
//se valida que el id no sea null
		if(!$id){
			$this->response(null, 400);
		}
//se llama la funcion get
		$categoria = $this->categoria_model->get($id);
//si el return de la funcion es true se imprime el resultado
			if($categoria){
			header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Origin: *');
            $this->response( array('categoria'=>$categoria), 200);
			}
			else{
				$this->response(null, 404);
			}
	}

	//funcion para insertar
	public function index_post(){
		if(!$this->post('categoria')){
			header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Origin: *');
			$this->response(null, 400);
		}

		$id = $this->categoria_model->save('categoria');

		if(!is_null($id)){
			$this->respose(array('categoria_post'=>$id),200);
		}
		else{
			$this->response(array('error'=>'no save'),400);
		}
	}

	    //funcion para actualizar
    public function index_put($id){
        if(!$this->post('categoria') || !$id){
            $this->response(null, 400);
        }


        $update = $this->categoria_model->update($id, $this->post('categoria'));
        if(!is_null($update)){
            $this->response(array('response'=>'correct update'));
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

        $delete = $this->categoria_model->delete($id);

        if(!is_null($delete)){
            $this->response(array('response'=>'correct delete'), 200);
        }
        else{
            $this->response(array('error'=>'no save'), 400);
        }
    }

		//obtener sus productos
		public function proventas_get($id, $solicitante){
			//se valida que el id no sea null
					if(!$id){
						$this->response(null, 400);
					}
			//se llama la funcion get
					$proventas = $this->categoria_model->getProVentas($id);
			//si el return de la funcion es true se imprime el resultado
						if($proventas){
						header('Content-Type: application/json; charset=UTF-8');
			            header('Access-Control-Allow-Origin: *');
									if($solicitante ==0){
										echo json_encode($proventas,JSON_PRETTY_PRINT);
									}
			           	else{
										 $this->response( array('proventas'=>$proventas), 200);
									}

						}
						else{
							$this->response(null, 404);
						}
		}

}
?>
