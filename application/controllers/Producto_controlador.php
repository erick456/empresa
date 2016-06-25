<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_controlador extends CI_Controller {

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
		$this->load->model('Producto_modelo');
	}

	public function index()
	{
		$data["productos"]=$this->Producto_modelo->traerproductos();
		$this->load->view('producto/index',$data);
	}
	public function guardar_producto()
	{
		if ($_POST['id']==""){
		$resultado=$this->Producto_modelo->guardarproductos();
	} else{
		$resultado=$this->Producto_modelo->modificar_productos();

	}
		$productos = $this->Producto_modelo->traerproductos();
		$html = $resultado."|";
		foreach ($productos as $key => $value) {
                                        $html .=  '<tr>';
                                        $html .=  '  <td>'.$value->id.'</td>';
                                        $html .=  '  <td>'.$value->producto.'</td>';
                                        $html .=  '  <td>'.$value->descripcion.'</td>';
                                        $html .=  '  <td>'.$value->precio.'</td>';
                                        $html .=  '  <td>'.$value->numeroexistente.'</td>';
                                        $html .=  '<td><button onclick="modificar_producto('.$value->id.')" type="button" class="btn btn-primary"
                                        data-placement="top" data-original-title=".btn .btn-primary">
                                        Modificar
                                    </button>
                                </td>';
                                $html .=  '<td> <button  onclick ="eliminar_producto('.$value->id.')" type="button" class="btn btn-danger"
                                data-placement="top" data-original-title=".btn .btn-danger">
                                Eliminar
                            </button>
                        </td>';
                        $html .=  '</tr>';

		}

		echo $html;
	}
	public function eliminar_producto()
	{
		$resultado=$this->Producto_modelo->eliminarproducto();
		$productos = $this->Producto_modelo->traerproductos();
		$html = $resultado."|";
		foreach ($productos as $key => $value) {
                                        $html .=  '<tr>';
                                        $html .=  '  <td>'.$value->id.'</td>';
                                        $html .=  '  <td>'.$value->producto.'</td>';
                                        $html .=  '  <td>'.$value->descripcion.'</td>';
                                        $html .=  '  <td>'.$value->precio.'</td>';
                                        $html .=  '  <td>'.$value->numeroexistente.'</td>';
                                        $html .=  '<td><button onclick="modificar_producto('.$value->id.')" type="button" class="btn btn-primary"
                                        data-placement="top" data-original-title=".btn .btn-primary">
                                        Modificar
                                    </button>
                                </td>';
                                $html .=  '<td> <button  onclick ="eliminar_producto('.$value->id.')" type="button" class="btn btn-danger"
                                data-placement="top" data-original-title=".btn .btn-danger">
                                Eliminar
                            </button>
                        </td>';
                        $html .=  '</tr>';

		}

		echo $html;
	}
	public function traer_producto()
	{
		$r=$this->Producto_modelo->traerproductomodifi();
		echo json_encode($r);
	}

}
