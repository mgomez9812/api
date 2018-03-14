<?php
	/**
	* clase cliente model
	*/
	class Oferta_model extends CI_model
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
                $query = $this->db->select('*')->from('oferta')->where('idoferta',$id)->get();

                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('oferta')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function save($oferta)
        {
            $this->db->set($this->_setOferta($oferta))->insert('oferta');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }
        public function update($id, $oferta)
        {
            $this->db->set($this->_setOferta($oferta))->where('idoferta', $id)->update('oferta');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }
        public function delete($id)
        {
            $this->db->where('idoferta', $id)->delete('oferta');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }

/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla empresa
*
*/

        private function _setOferta($oferta)
        {
            return array(
                'finicio_oferta' => $oferta['inicio'],
                'fefin_oferta' => $oferta['fin'],
                'descuento_oferta' => $oferta['descuento'],
                'cantidad_oferta' => $oferta['cantidad'],
                'estado_oferta' => $oferta['estado'],
            );
        }



	}


 ?>
