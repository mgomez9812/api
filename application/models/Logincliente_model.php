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
            $query = $this->db->get_where('cliente', array('nickname_cli'=>$login['user'], 'password_cli'=>$login['password']));
					//si se encuentera el usuario se realiza el if y retorna todos los datos de los usuarios
						if($query->num_rows()  === 1){
								return $query->row_array();
						}
            return false;
        }
	}


 ?>
