<?php 
	/**
	* clase cliente model 
	*/
	class Empresa_model extends CI_model
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
                $query = $this->db->select('*')->from('empresa')->where('idempresa',$id)->get();
                
                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('empresa')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function save($empresa)
        {
            $this->db->set($this->_setEmpresa($empresa))->insert('empresa');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }
        public function update($empresa)
        {
            $id = $empresa['id'];
            $this->db->set($this->_setEmpresa($empresa))->where('idempresa', $id)->update('empresa');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }
        public function delete($id)
        {
            $this->db->where('idempresa', $id)->delete('empresa');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }

/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla empresa
*
*/

        private function _setEmpresa($empresa)
        {
            return array(
                'nombre_emp' => $empresa['nombre'],
                'nit_emp' => $empresa['nit_emp'],
                'direccion_emp' => $empresa['direccion'],
                'ciudad_emp' => $empresa['ciudad'],
                'telefono_emp' => $empresa['telefono'],
                'logo_emp' => $empresa['logo'],

            );
        }



	}


 ?>