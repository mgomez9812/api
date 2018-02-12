<?php
	/**
	* clase cliente model
	*/
	class Fotografia_model extends CI_model
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
                $query = $this->db->select('*')->from('fotografias_pasteles')->where('idfoto_pasteles',$id)->get();

                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('fotografias_pasteles')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function save($fotografia)
        {
            $this->db->set($this->_setDetallespedido($fotografia))->insert('fotografias_pasteles');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }
        public function update($fotografia)
        {
            $id = $fotografia['id'];
            $this->db->set($this->_setDetallespedido($empresa))->where('idfoto_pasteles', $id)->update('fotografia_pasteles');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }
        public function delete($id)
        {
            $this->db->where('idfoto_pasteles', $id)->delete('fotografia_pasteles');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }

/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla fotografia de los pasteles
*
*/

        private function _setFotografiapasteles($fotografia)
        {
            return array(
                'url_foto' => $fotografia['fotografia'],
                'pro_ventaid' => $fotografia['idventa'],
            );
        }



	}


 ?>
