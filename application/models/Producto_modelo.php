<?php
	class Producto_modelo extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        public function traerproductos()
        {
        	// select * from productos where estado = 1
        	// $this->db->get_where("productos",array("estado"=>"1"))->result_array();


        	// select * from productos  -- el result() es solo para consultas tambien el return
        	return  $this->db->get("productos")->result();

        }
        public function guardarproductos()
        {
        	$data=array(
        		'producto'=>$this->input->post('producto'),
        		'descripcion'=>$this->input->post('descripcion'),
        		'precio'=>$this->input->post('precio'),
        		'numeroexistente'=>$this->input->post('numeroexistente'));
        	 $r=$this->db->insert("productos",$data);
      		if ($r) {
      			echo '1';
      		}
      		else{
      			echo '0';
      		}
        }
        public function eliminarproducto()
        {
        	$this->db->where('id',$this->input->post('id'));
          $r=$this->db->delete('productos');
        	if ($r){
        		echo '1';

        	} else{
        		echo '0';
        	}
        }
        public function traerproductomodifi()
        {
        	// el row es para solo llamar un registro
        	$this->db->where('id',$this->input->post('id'));
        	return $this->db->get('productos')->row();
        }
        public function modificar_productos(){
        	$data=array(
        		'producto'=>$this->input->post('producto'),
        		'descripcion'=>$this->input->post('descripcion'),
        		'precio'=>$this->input->post('precio'),
        		'numeroexistente'=>$this->input->post('numeroexistente'));
        	$this->db->where('id',$this->input->post('id'));
        	 $r=$this->db->update("productos",$data);
      		if ($r) {
      			echo '1';
      		}
      		else{
      			echo '0';
      		}
        }
}



 ?>