<?php
class Empleados_modelo extends CI_Model {

    public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }
    public function traerempleados()
    {
            // select * from productos where estado = 1
            // $this->db->get_where("productos",array("estado"=>"1"))->result_array();


            // select * from productos  -- el result() es solo para consultas tambien el return
        return  $this->db->get_where("empleados",array("estado"=>"1"))->result();

    }

    public function traeruno()
    {
            // select * from productos where estado = 1
            // $this->db->get_where("productos",array("estado"=>"1"))->result_array();


            // select * from productos  -- el result() es solo para consultas tambien el return
            $this->db->where('id_empleado',$this->input->post('id_empleado'));
            return $this->db->get('empleados')->row();

    }

    public function eliminarempleados()
        {
            $data=array(
                'estado'=>'0'
                );
            $this->db->where('id_empleado',$this->input->post('id_empleado'));
          $r=$this->db->update('empleados',$data);
            if ($r){
                echo '1';

            } else{
                echo '0';
            }
        }

    public function guardarempleados()
    {
        $data=array(
            'nombre'=>$this->input->post('nombre'),
            'apellido'=>$this->input->post('apellido'),
            'dni'=>$this->input->post('dni'),
            'estado'=>$this->input->post('estado')
            );

        $r=$this->db->insert("empleados",$data);
        if ($r) {
            echo '1';
        }
        else{
            echo '0';
        }
    }

     public function modificar_empleados(){
            $data=array(
                'nombre'=>$this->input->post('nombre'),
                'apellido'=>$this->input->post('apellido'),
                'dni'=>$this->input->post('dni'),
                'estado'=>$this->input->post('estado')

                );

            $this->db->where('id_empleado',$this->input->post('id_empleado'));
             $r=$this->db->update("empleados",$data);
            if ($r) {
                echo '1';
            }
            else{
                echo '0';
            }
        }
}



?>