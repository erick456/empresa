<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_controlador extends CI_Controller {

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
		$this->load->model('Cliente_modelo');
	}

	public function index()
	{
		$data["clientes"]=$this->Cliente_modelo->traercliente();
		$this->load->view('cliente/index',$data);
	}

	public function guardar_cliente()
	{
		if ($_POST['id_cliente']==""){
		$resultado=$this->Cliente_modelo->guardarcliente();
	} else{
		//$resultado=$this->Producto_modelo->modificar_productos();

	}
		$productos = $this->Cliente_modelo->traercliente();
		$html = $resultado."|";
		foreach ($productos as $key => $value) {
                                        $html .=  '<tr>';
                                        $html .=  '  <td>'.$value->id_cliente.'</td>';
                                        $html .=  '  <td>'.$value->nombre.'</td>';
                                        $html .=  '  <td>'.$value->apellido.'</td>';
                                        $html .=  '  <td>'.$value->telefono.'</td>';

                                        $html .=  '<td><button onclick="modificar_cliente('.$value->id_cliente.')" type="button" class="btn btn-primary"
                                        data-placement="top" data-original-title=".btn .btn-primary">
                                        Modificar
                                    </button>
                                </td>';
                                $html .=  '<td> <button  onclick ="eliminar_cliente('.$value->id_cliente.')" type="button" class="btn btn-danger"
                                data-placement="top" data-original-title=".btn .btn-danger">
                                Eliminar
                            </button>
                        </td>';
                        $html .=  '</tr>';

		}

		echo $html;
	}
	public function eliminar_cliente()
	{
		$resultado=$this->Cliente_modelo->eliminarcliente();
		$cliente = $this->Cliente_modelo->traercliente();
		$html = $resultado."|";
		foreach ($cliente as $key => $value) {
                                        $html .=  '<tr>';
                                        $html .=  '  <td>'.$value->id_cliente.'</td>';
                                        $html .=  '  <td>'.$value->nombre.'</td>';
                                        $html .=  '  <td>'.$value->apellido.'</td>';
                                        $html .=  '  <td>'.$value->telefono.'</td>';
                                        $html .=  '<td><button onclick="modificar_cliente('.$value->id_cliente.')" type="button" class="btn btn-primary"
                                        data-placement="top" data-original-title=".btn .btn-primary">
                                        Modificar
                                    </button>
                                </td>';
                                $html .=  '<td> <button  onclick ="eliminar_cliente('.$value->id_cliente.')" type="button" class="btn btn-danger"
                                data-placement="top" data-original-title=".btn .btn-danger">
                                Eliminar
                            </button>
                        </td>';
                        $html .=  '</tr>';

		}

		echo $html;
	}
	public function traer_cliente()
	{
		$r=$this->Cliente_modelo->traerclientemodifi();
		echo json_encode($r);
	}

}
