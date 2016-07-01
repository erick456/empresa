<?php
class Cliente_modelo extends CI_Model {

    public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }
    public function traercliente()
    {
            // select * from productos where estado = 1
            // $this->db->get_where("productos",array("estado"=>"1"))->result_array();


            // select * from productos  -- el result() es solo para consultas tambien el return
        return  $this->db->get("clientes")->result();

    }

    public function guardarcliente()
    {
        $data=array(
            'nombre'=>$this->input->post('nombre'),
            'apellido'=>$this->input->post('apellido'),
            'telefono'=>$this->input->post('telefono')
            );
        $r=$this->db->insert("clientes",$data);
        if ($r) {
            echo '1';
        }
        else{
            echo '0';
        }
    }
     public function eliminarcliente()
        {
            $this->db->where('id_cliente',$this->input->post('id_cliente'));
          $r=$this->db->delete('clientes');
            if ($r){
                echo '1';

            } else{
                echo '0';
            }
        }

         public function traerclientemodifi()
        {
            // el row es para solo llamar un registro
            $this->db->where('id_cliente',$this->input->post('id_cliente'));
            return $this->db->get('clientes')->row();
        }

         public function modificar_cliente(){
            $data=array(
                'nombre'=>$this->input->post('nombre'),
                'apellido'=>$this->input->post('apellido'),
                'telefono'=>$this->input->post('telefono'));
            $this->db->where('id_cliente',$this->input->post('id_cliente'));
             $r=$this->db->update("clientes",$data);
            if ($r) {
                echo '1';
            }
            else{
                echo '0';
            }
        }
}



?>