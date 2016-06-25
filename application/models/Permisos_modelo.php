<?php
class Permisos_modelo extends CI_Model {

    public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }
    public function traerpermisos()
    {
            // select * from productos where estado = 1
            // $this->db->get_where("productos",array("estado"=>"1"))->result_array();


            // select * from productos  -- el result() es solo para consultas tambien el return
        return  $this->db->get_where("permisos",array("estado"=>"1"))->result();

    }

    public function traeruno()
    {
            // select * from productos where estado = 1
            // $this->db->get_where("productos",array("estado"=>"1"))->result_array();


            // select * from productos  -- el result() es solo para consultas tambien el return
            $this->db->where('id_permiso',$this->input->post('id_permiso'));
            return $this->db->get('permisos')->row();

    }

    public function eliminarpermisos()
        {
            $data=array(
                'estado'=>'0'
                );
            $this->db->where('id_permiso',$this->input->post('id_permiso'));
          $r=$this->db->update('permisos',$data);
            if ($r){
                echo '1';

            } else{
                echo '0';
            }
        }

    public function guardarpermisos()
    {
        $data=array(
            'descripcion'=>$this->input->post('descripcion'),
            'estado'=>$this->input->post('estado')
            );

        $r=$this->db->insert("permisos",$data);
        if ($r) {
            echo '1';
        }
        else{
            echo '0';
        }
    }

     public function modificar_permisos(){
            $data=array(

                'descripcion'=>$this->input->post('descripcion'),
                'estado'=>$this->input->post('estado')

                );

            $this->db->where('id_permiso',$this->input->post('id_permiso'));
             $r=$this->db->update("permisos",$data);
            if ($r) {
                echo '1';
            }
            else{
                echo '0';
            }
        }
}



?>