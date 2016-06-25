<?php
	class Login_modelo extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function ingresar_usuario()
        {
          return $this->db->get_where("usuarios",array("estado"=>"1","usuario"=>$this->input->post("usuario"),"contraseña"=>$this->input->post("contraseña")))->result_array();
        }

}



 ?>