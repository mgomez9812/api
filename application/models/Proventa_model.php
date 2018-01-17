<?php
	/**
	* clase cliente model
	*/
	class Proventa_model extends CI_model
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
                $query = $this->db->select('*')->from('pro_venta')->where('idpro_venta',$id)->get();

                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('pro_venta')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }
	public function fotografias($id = null){
			if(!is_null($id)){
    			return false;
			}
			$query = $this->db->select('*')->from('fotografias_pasteles')->where('pro_ventaid',$id)->get();

           	if($query->num_rows() > 0){
				return $query->result_array();
			}

			return false;
		}
		public function ofertas($id = null){
				if(!is_null($id)){
	    			return false;
				}
				$query = $this->db->select('*')->from('oferta')->where('pro_venta_idpro_venta',$id)->get();

	           	if($query->num_rows() > 0){
					return $query->result_array();
				}

				return false;
			}

        public function save($Proventa)
        {
            $this->db->set($this->_setProventa($Proventa))->insert('pro_venta');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }
        public function update($pro_venta)
        {
            $id = $pro_venta['id'];
            $this->db->set($this->_setDetallespedido($precio_pro_venta))->where('idpro_venta', $id)->update('pro_venta');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }
        public function delete($id)
        {
            $this->db->where('idpro_venta', $id)->delete('pro_venta');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }

/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla empresa
*
*/

        private function _setProventa($venta)
        {
            return array(
                'nombre_pro_venta' => $empresa['nombre'],
                'precio_pro_venta' => $empresa['nit_emp'],
                'descripcion_pro_venta' => $empresa['direccion'],
                'decoracion_pastel' => $empresa['ciudad'],
                'oferta_id' => $empresa['telefono'],
                'categoria_id' => $empresa['logo'],
                'ocacion_id' => $empresa['logo'],

            );
        }



	}


 ?>
