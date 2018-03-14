<?php
	/**
	* clase cliente model
	*/
	class Tipousuario_model extends CI_model
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
 		public function get($id = null){
            if(!is_null($id)){
                $query = $this->db->select('*')->from('tipo_usuario')->where('idtipo_usuario',$id)->get();

                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('tipo_usuario')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function save($tipo_usuario)
        {
            $this->db->set($this->_setTipousuario($tipo_usuario))->insert('tipo_usuario');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }

			  public function update($id, $tipo_usuario)
        {
            $this->db->set($this->_setTipousuario($tipo_usuario))->where('idtipo_usuario', $id)->update('tipo_usuario');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }
        public function delete($id)
        {
            $this->db->where('idtipo_usuario', $id)->delete('tipo_usuario');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }

/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla empresa
*
*/

        private function _setTipousuario($tipo_usuario)
        {
            return array(
                'nombre_tipo_usuario' => $tipo_usuario['nombre'],
            );
        }



	}


 ?>
