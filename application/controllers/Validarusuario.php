
 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 require_once APPPATH . '/libraries/REST_Controller.php';

 //para la clase categorias
 class Validarusuario extends REST_Controller{

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('validarusuario_model');
 	}

 	//funcion para insertar
 	public function index_post(){
 		if(!$this->post()){
 						header('Content-Type: application/json; charset=UTF-8');
             header('Access-Control-Allow-Origin: *');
 						$this->response(null, 400);
 		}

 		$validar = $this->validarusuario_model->validaruser_get($this->post());

 		if($validar == true){
 				echo json_encode($validar, JSON_PRETTY_PRINT);
 		}
 		else{
 				echo json_encode($validar, JSON_PRETTY_PRINT);
 		}
 	}


 }
 ?>
