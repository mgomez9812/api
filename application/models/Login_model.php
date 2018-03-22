<?php
	/**
	* clase cliente model
	*/
	class Login_model extends CI_model
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
            $query = $this->db->get_where('usuario', array('nickname_user'=>$login['user'], 'pasword_user'=>$login['password']));
            if($query->num_rows()  === 1){
                return true;
            }
            return false;
        }
/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla clientes
*
*/
	}


 ?>
