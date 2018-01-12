<?php 
	defined('BASEPATH') OR exit('No direct script access allow');

	require_once APPPATH . '/libraries/REST_Controller.php';

	/**
	* 
	*/
	class Cliente extends REST_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('cliente_model');
		}
		
	//optener todos los datos de la tabla Categoria
	public function index_get(){
//se llama al modelo categoria 
		$cliente = $this->cliente_model->get();
//se valida si el resultado no es null de la respuesta
		if(!is_null($cliente)){
			header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Origin: *'); 
            $this->response( array('categoria'=>$cliente), 200);
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
		$cliente = $this->cliente_model->get($id);
//si el return de la funcion es true se imprime el resultado
			if($cliente){
			header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Origin: *'); 
            $this->response( array('categoria'=>$cliente), 200);
			}
			else{
				$this->response(null, 404);
			}
	}

	//funcion para insertar
	public function index_post(){
		if(!$this->post('cliente')){
			header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Origin: *'); 
			$this->response(null, 400);
		}

		$id = $this->cliente_model->save('cliente');

		if(!is_null($id)){
			$this->respose(array('cliente_post'=>$id),200);
		}
		else{
			$this->response(array('error'=>'no save'),400);
		}
	}

	    //funcion para actualizar 
    public function index_put($id){
        if(!$this->post('cliente') || !$id){
            $this->response(null, 400);
        }

        $update = $this->cliente_model->update($id, $this->post('cliente'));

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

        $delete = $this->cliente_model->delete($id);

        if(!is_null($delete)){
            $this->response(array('response'=>'correct delete'), 200);
        }
        else{
            $this->response(array('error'=>'no save'), 400);
        }
    }

	}
?>