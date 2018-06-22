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
//llamar a la funcion get  para validar pedido 
	public function index_get(){
		$data = $this->inner_model->validar_pedido();
	
		
		if(!is_null($data)){
			header('Content-type: application/json: charset=UTF-8');
			header('Access-Control-Allow-Origin: *');
			$this->response(array('pedidos' => $data), 200);
		}
		else{
			$this->response(null, 400);
		}
		
	}
	


	}


 ?>
