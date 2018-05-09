<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once APPPATH . '/libraries/REST_Controller.php';

	/**
	*
	*/
	class Ocacion extends REST_Controller
	{
		function __construct()
		{
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Methods: *');
			parent::__construct();
			$this->load->model('ocacion_model');
		}

//optener todos los datos de la tabla Categoria
	public function index_get($seleccion){
//se llama al modelo categoria
		$data = $this->ocacion_model->get();
//se valida si el resultado no es null de la respuesta
		if(!is_null($data)){
			header('Content-Type: application/json; charset=UTF-8');

			header('Access-Control-Allow-Origin: *');

			if($seleccion == 0){
				echo json_encode($data, JSON_PRETTY_PRINT);
			}
			else{
				$this->response( array('ocacion'=>$data), 200);
			}
		}
		else{
			$this->response(null, 400);
		}
	}

//funcion para buscar por id en la tabla categoria
	public function find_get($id, $solicitud){
//se valida que el id no sea null
		if(!$id){
			$this->response(null, 400);
		}
//se llama la funcion get
		$data = $this->ocacion_model->get($id);
//si el return de la funcion es true se imprime el resultado
			if($data){
				header('Content-Type: application/json; charset=UTF-8');
				header('Access-Control-Allow-Origin: *');

				if ($solicitud==0) {
					  echo json_encode($data, JSON_PRETTY_PRINT);
				}
				else{
					$this->response( array('ocacion'=>$data), 200);
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
		$id = $this->ocacion_model->save($this->post());

		if(!is_null($id)){
			$this->response(array('ocacion'=>$id),200);
		}
		else{
			$this->response(array('error'=>'no save'),400);
		}
	}

	    //funcion para actualizar
    public function index_put($id){

				if(!$this->put() || !$id){
					header('Content-Type: application/json; charset=UTF-8');
					header('Access-Control-Allow-Origin: *');
					$this->response(null, 400);
        }
        $update = $this->ocacion_model->update($id, $this->put());

        if(!is_null($update)){

            $this->response(array('ocacion'=>'correct update'),200);
        }
        else{
					header('Content-Type: application/json; charset=UTF-8');
					header('Access-Control-Allow-Origin: *');
            $this->response(array('error'=>'no save'), 400);
        }
    }

    //para borrar un pastel
    public function index_delete($id){
        if(!$id){
            $this->response(null, 400);
        }

        $delete = $this->ocacion_model->delete($id);

        if(!is_null($delete)){
            $this->response(array('ocacion'=>'correct delete'), 200);
        }
        else{
            $this->response(array('error'=>'no save'), 400);
        }
    }

/*
*funcion para seleccionar pasteles por medio de la ocacion
*/

public function proventas_get($id, $seleccion){

		//se valida que el id no sea nulo
		if(!$id){
			$this->response(null, 404);
		}

	//llamamos a la funcion get
	$proventas = $this->ocacion_model->getProventas($id);

	//si el return de la funcion es true se imprime el resultado
				if($proventas){
							header('Content-Type: application/json; charset=UTF-8');
							header('Access-Control-Allow-Origin: *');

							if($seleccion == 0){
								echo json_encode($proventas,JSON_PRETTY_PRINT);
							}
							else{
								 $this->response( array('proventa'=>$proventas), 200);
							}

				}
				else{
					$this->response(null, 404);
				}
}



		//para options
		//dejadlo es para que funcione update and delete
	  public function index_options(){
        echo 'options';
    }
	}

?>
