<?php
	class Categoria_model extends CI_model{

		public function __construct(){
			parent::__construct();
		}
//funcion para obtener los datos de la tabla Categoria
		public function get($id = null){
			if(!is_null($id)){
				$query = $this->db->select('*')->from('categoria')->where('idcategoria',$id)->get();

				if($query->num_rows() === 1){
					return $query->row_array();

				}
				return false;
			}

			$query = $this->db->select('*')->from('categoria')->get();

			if($query->num_rows() > 0){
				return $query->result_array();
			}

			return false;
		}

		//funcion para guardar datos en la tabla Categoria
	public function save($categoria){
		$this->db->set($this->_setCategoria($categoria))->insert('categoria');

		if($this->db->affected_rows() === 1){
			return $this->db->insert_id();
		}

		return null;
	}

//funcion para realizar una actualizacion
		public function update($categoria){
			$id = $categoria['id'];
			$this->db->set($this->_setCategoria($categoria))->where('idcategoria', $id)->update('categoria');

			if($this->db->affected_rows() === 1){
				return true;
			}

			return null;

		}

//funcion para elimiar un elemento de la tabla categoria
		public function delete($id){
			$this->db->where('idcategoria', $id)->delete('categoria');

			if($this->db->affected_rows() === 1){
				return true;
			}

			return null;
		}
//funcion para crear el array en donde se guardara toda la informacion que se necesita para poder insertar en la tabla cliente
	private function _setCategoria($categoria){
		return array(
			'cat_nombre' => $categoria['nombre'],
			);
	}

	public function getProVentas($id = null){
		
		if(!is_null($id)){
			$query = $this->db->select('*')->from('pro_venta')->where('categoria_id',$id)->get();
			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;
		}
		return false;
	}


	}
 ?>
