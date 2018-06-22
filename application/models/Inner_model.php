<?php
	/**
	* clase cliente model
	*/
	class Inner_model extends CI_model
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
                $this->db->select('SELECT fotografias_pasteles.fotografias_p, pro_venta.nombre_pro_venta,pro_venta.precio_pro_venta, pro_venta.descripcion_pro_venta, pro_venta.decoracion_pastel FROM fotografias_pasteles INNER JOIN pro_venta on fotografias_pasteles.pro_ventaid = pro_venta.idpro_venta');

                //$query = $this->db->select('*')->from('pro_venta')->where('idpro_venta',$id)->get();
                $query = $this->db->get();
                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

                //$this->db->select('fotografias_pasteles.fotografias_p, pro_venta.nombre_pro_venta,pro_venta.precio_pro_venta, pro_venta.descripcion_pro_venta, pro_venta.decoracion_pastel FROM fotografias_pasteles INNER JOIN pro_venta on fotografias_pasteles.pro_ventaid = pro_venta.idpro_venta');
            $this->db->select('fotografias_pasteles.fotografias_p, pro_venta.nombre_pro_venta,pro_venta.precio_pro_venta, pro_venta.descripcion_pro_venta, pro_venta.decoracion_pastel');
            $this->db->from('fotografias_pasteles');
            $this->db->join('pro_venta', 'fotografias_pasteles.pro_ventaid = pro_venta.idpro_venta');
                //$query = $this->db->select('*')->from('pro_venta')->where('idpro_venta',$id)->get();
                $query = $this->db->get();
            //$query = $this->db->select('*')->from('pro_venta')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }


        //funcion para validar pedidos 
        public function validar_pedido(){
            $query = $this->db->query("SELECT 
            cliente.nombre_cli, 
            cliente.apellido_cli, 
            cliente.telefono_cli, 
            cliente.correo_cli, 
            pedido.fecha_entrega_pedido, 
            pedido.estado, 
            detalles_pedido.cantidad_pasteles_pedido, 
            detalles_pedido.rebanadas_pasteles_pedido, 
            detalles_pedido.foto_decoracion, 
            pro_venta.nombre_pro_venta 
        FROM 
            cliente 
        INNER JOIN 
            pedido on 
            cliente.idcliente = pedido.idpedido 
        INNER JOIN 
            detalles_pedido on 
            detalles_pedido.id_dett_pedido = pedido.idpasteles_pedido 
        INNER JOIN 
            pro_venta on 
            pro_venta.idpro_venta = detalles_pedido.pasteles_venta_id");

        if($query->num_rows() > 0){
            return $query->result_array();
        }


        }


        public function prod_to_venta(){

            $query = $this->db->query("SELECT 
            pro_venta.nombre_pro_venta, 
            pro_venta.precio_pro_venta, 
              pro_venta.descripcion_pro_venta, 
                pro_venta.decoracion_pastel, 
                categoria.cat_nombre, 
                fotografias_pasteles.url_foto, 
                ocacion.nombre_oc
        from 
            pro_venta 
        INNER JOIN
            categoria on 
                categoria.idcategoria = pro_venta.categoria_id
        INNER JOIN 
            ocacion on 
                ocacion.idocacion = pro_venta.ocacion_id
        INNER JOIN 
            fotografias_pasteles ON
                fotografias_pasteles.idfoto_pasteles = pro_venta.idpro_venta");

        if($query->num_rows() > 0){
            return $query->result_array();
        }

        }
    
        public function pedidos(){
            $query = $this->db->query("SELECT 
            cliente.nombre_cli, 
            cliente.apellido_cli, 
            cliente.telefono_cli, 
            cliente.correo_cli, 
            pedido.fecha_entrega_pedido, 
            pedido.estado, 
            detalles_pedido.cantidad_pasteles_pedido, 
            detalles_pedido.rebanadas_pasteles_pedido, 
            detalles_pedido.foto_decoracion, 
            pro_venta.nombre_pro_venta 
        FROM 
            cliente 
        INNER JOIN 
            pedido on 
            cliente.idcliente = pedido.idpedido 
        INNER JOIN 
            detalles_pedido on 
            detalles_pedido.id_dett_pedido = pedido.idpasteles_pedido 
        INNER JOIN 
            pro_venta on 
            pro_venta.idpro_venta = detalles_pedido.pasteles_venta_id
        ");

        if($query->num_rows() > 0){
            return $query->result_array();
        }
        }



	}


 ?>
