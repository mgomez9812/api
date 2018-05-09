<?php
	/**
	* clase cliente model
	*/
	class Ocacion_model extends CI_model
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
                $query = $this->db->select('*')->from('ocacion')->where('idocacion',$id)->get();

                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('ocacion')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function save($ocacion)
        {
            $this->db->set($this->_setOcacion($ocacion))->insert('ocacion');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }


        public function update($id, $ocacion)
        {
            $this->db->set($this->_setOcacion($ocacion))->where('idocacion', $id)->update('ocacion');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }


        public function delete($id)
        {
            $this->db->where('idocacion', $id)->delete('ocacion');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }

/*
*funcion get para la busqueda por medio de ocacion
*/
				public function getProventas($id = null){

							if(!is_null($id)){
								$query = $this->db->select('*')->from('pro_venta')->where('ocacion_id',$id)->get();
								if($query->num_rows() > 0){
									return $query->result_array();
								}
								return false;
							}
							return false;
				}




/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla ocacion
*
*/
        private function _setOcacion($data)
        {
            return array(
                'nombre_oc' => $data['nombre']
            );
        }
	}
 ?>
