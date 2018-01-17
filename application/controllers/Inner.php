<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once APPPATH . '/libraries/REST_Controller.php';

	/**
	* clase para producto venta
	*/
	class inner extends REST_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('inner_model');
		}

//optener todos los datos de la tabla Categoria
	public function index_get(){
//se llama al modelo categoria
		$data = $this->inner_model->get();
//se valida si el resultado no es null de la respuesta
		if(!is_null($data)){
			header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Origin: *');
            $this->response( array('inner'=>$data), 200);
		}
		else{
			$this->response(null, 400);
		}
	}

	}
 ?>
