<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

//para la clase categorias
class Ventaoferta extends REST_Controller{

	public function __construct(){
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: *');
		parent::__construct();
		$this->load->model('ventaoferta_model');
	}
//optener todos los datos de la tabla Categoria
	public function index_get($seleccionar){
//se llama al modelo categoria
		$venta_a_oferta = $this->ventaoferta_model->get();
//se valida si el resultado no es null de la respuesta
		if(!is_null($venta_a_oferta)){
			header('Content-Type: application/json; charset=UTF-8');
      header('Access-Control-Allow-Origin: *');
			if ($seleccionar == 0) {
				echo json_encode($venta_a_oferta, JSON_PRETTY_PRINT);
			}
			else{
				$this->response( array('ventaoferta'=>$venta_a_oferta), 200);
			}
			//echo json_encode($venta_a_oferta, JSON_PRETTY_PRINT);
		}
		else{
			$this->response(null, 400);
		}
	}

//funcion para buscar por id en la tabla categoria
	public function find_get($id, $seleccionar){
//se valida que el id no sea null
		if(!$id){
			$this->response(null, 400);
		}
//se llama la funcion get
		$venta_a_oferta = $this->ventaoferta_model->get($id);
//si el return de la funcion es true se imprime el resultado
			if($venta_a_oferta){
			header('Content-Type: application/json; charset=UTF-8');
      header('Access-Control-Allow-Origin: *');
			if ($seleccionar == 0) {
				echo json_encode($venta_a_oferta, JSON_PRETTY_PRINT);
			}
			else{
				$this->response( array('ventaoferta'=>$venta_a_oferta), 200);
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

		$id = $this->ventaoferta_model->save($this->post());

		if(!is_null($id)){
			$this->response(array('venta_a_oferta'=>$id),200);
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


        $update = $this->ventaoferta_model->update($id, $this->put());
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

        $delete = $this->ventaoferta_model->delete($id);

        if(!is_null($delete)){
            $this->response(array('response'=>'correct delete'), 200);
        }
        else{
            $this->response(array('error'=>'no save'), 400);
        }
    }

		//para options
		//dejadlo es para que funcione update and delete
		public function index_options(){
				echo 'options';
		}

		}

?>
