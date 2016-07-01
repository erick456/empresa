<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controlador extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_modelo');
	}

	public function index()
	{
		$this->load->view('login/index');
	}

	public function ingresar()
	{
		$resultado=$this->Login_modelo->ingresar_usuario();
		if(count($resultado)>0) //si mi registro es mayo que 0 signifca que tiene un registro :3
		{
			echo 1;
		}else{
			echo 0;
		}
	}

	public function cerrar_session()
	{
		session_destroy();
		redirect('Login_controlador','refresh');
	}


}
