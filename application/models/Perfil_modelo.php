<?php
class Perfil_modelo extends CI_Model {

    public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }
    public function traerperfil()
    {
            // select * from productos where estado = 1
            // $this->db->get_where("productos",array("estado"=>"1"))->result_array();


            // select * from productos  -- el result() es solo para consultas tambien el return
        return  $this->db->get_where("perfil",array("estado"=>"1"))->result();

    }

    public function traeruno()
    {
            // select * from productos where estado = 1
            // $this->db->get_where("productos",array("estado"=>"1"))->result_array();


            // select * from productos  -- el result() es solo para consultas tambien el return
            $this->db->where('id_perfil',$this->input->post('id_perfil'));
            return $this->db->get('perfil')->row();

    }

    public function eliminarperfil()
        {
            $data=array(
                'estado'=>'0'
                );
            $this->db->where('id_perfil',$this->input->post('id_perfil'));
          $r=$this->db->update('perfil',$data);
            if ($r){
                echo '1';

            } else{
                echo '0';
            }
        }

    public function guardarperfil()
    {
        $data=array(
            'descripcion'=>$this->input->post('descripcion'),
            'estado'=>$this->input->post('estado')
            );

        $r=$this->db->insert("perfil",$data);
        if ($r) {
            echo '1';
        }
        else{
            echo '0';
        }
    }

     public function modificar_perfil(){
            $data=array(

                'descripcion'=>$this->input->post('descripcion'),
                'estado'=>$this->input->post('estado')

                );

            $this->db->where('id_perfil',$this->input->post('id_perfil'));
             $r=$this->db->update("perfil",$data);
            if ($r) {
                echo '1';
            }
            else{
                echo '0';
            }
        }
}



?>