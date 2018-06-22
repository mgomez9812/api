<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

//para la clase categorias
class Logincliente extends REST_Controller{

	public function __construct(){

		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: *');
		parent::__construct();
		$this->load->model('logincliente_model');
	}


	//funcion para insertar
	public function index_post(){
		if(!$this->post()){
						header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Origin: *');
						$this->response(null, 400);
		}

		$consulta = $this->post('tipo_consulta');

		if($consulta == '1'){

			$id = $this->logincliente_model->Login_get($this->post());

			if($id>0){
					echo json_encode($id, JSON_PRETTY_PRINT );
			}
			else{
				$this->response(array('error'=>false),400);
			}


		}
		else if($consulta == '2') {
			$id = $this->logincliente_model->Login_get($this->post());

			if($id > 0){
				echo $id;
//				$this->response(array('id'=>$id),200);
			}
			else{
				
				$this->response(array('error'=>false),400);
			}
		}
/*		

		*/
	}


}
?>
