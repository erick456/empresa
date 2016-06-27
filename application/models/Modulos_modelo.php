<?php
class Modulos_modelo extends CI_Model {

    public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }
    public function traer_modulos()
    {
        return  $this->db->query("select p.nombre as hijo,p.id_modulo as idhijo,h.nombre as padre,h.id_modulo as idpadre,p.icono,p.url from modulos as p
            inner join modulos as h on(p.id_padre=h.id_modulo)
            where p.id_modulo >1 and p.estado='1'")->result();
    }

    public function traer_padres()
    {
        return  $this->db->query("select * from modulos
            where id_padre=1 and estado='1'")->result();
    }

    public function guardar_modulo()
    {
        $data=array(
            'nombre'=>$this->input->post('nombre'),
            'url'=>$this->input->post('url'),
            'icono'=>$this->input->post('icono'),
            'id_padre'=>$this->input->post('id_padre'),
            );

        $r=$this->db->insert("modulos",$data);
        if ($r) {
            echo '1';
        }
        else{
            echo '0';
        }
    }

    public function modificar_modulo(){
            $data=array(

            'nombre'=>$this->input->post('nombre'),
            'url'=>$this->input->post('url'),
            'icono'=>$this->input->post('icono'),
            'id_padre'=>$this->input->post('id_padre'),

                );

            $this->db->where('id_modulo',$this->input->post('id_modulo'));
             $r=$this->db->update("modulos",$data);
            if ($r) {
                echo '1';
            }
            else{
                echo '0';
            }
        }


        public function traeruno()
    {
            // select * from productos where estado = 1
            // $this->db->get_where("productos",array("estado"=>"1"))->result_array();


            // select * from productos  -- el result() es solo para consultas tambien el return
            $this->db->where('id_modulo',$this->input->post('id_modulo'));
            return $this->db->get('modulos')->row();

    }

     public function modificar_modulos(){
            $data=array(

                'nombre'=>$this->input->post('nombre'),
            'url'=>$this->input->post('url'),
            'icono'=>$this->input->post('icono'),
            'id_padre'=>$this->input->post('id_padre'),

                );

            $this->db->where('id_modulo',$this->input->post('id_modulo'));
             $r=$this->db->update("modulos",$data);
            if ($r) {
                echo '1';
            }
            else{
                echo '0';
            }
        }


        public function eliminarmodulos()
        {
            $data=array(
                'estado'=>'0'
                );
            $this->db->where('id_modulo',$this->input->post('id_modulo'));
          $r=$this->db->update('modulos',$data);
            if ($r){
                echo '1';

            } else{
                echo '0';
            }
        }

}



?>