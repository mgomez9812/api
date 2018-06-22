<?php
	/**
	* clase cliente model
	*/
	class Logincliente_model extends CI_model
	{
		/*
		*constructor de la clase
		*/
		function __construct()
		{
			parent::__construct();
		}
		/*
		*funcion para seleccionar los datos de la tabla Clientes
		*
		*/
 		public function Login_get($login){


				$usuario = $login['user'];
				$password = $login['password'];
//la variable tipo consulta es utilizado para saber si es una peticion de android o de angular
			 if($login['tipo_consulta'] == '1'){
				$query = $this->db->get_where('cliente', array('nickname_cli'=>$login['user'], 'password_cli'=>$login['password']));
				//si se encuentera el usuario se realiza el if y retorna todos los datos de los usuarios
					if($query->num_rows()  === 1){
							return $query->row_array(); 
					}
			 }else if($login['tipo_consulta'] == '2'){
				$query = $this->db->query("SELECT  idcliente From  cliente WHERE nickname_cli = '$usuario' and password_cli = '$password' ");
				if($query->num_rows() > 0){
					$data = $query->row_array();
					return $data['idcliente'];

			 }

            return false;
        }
	}
  }

 ?>
