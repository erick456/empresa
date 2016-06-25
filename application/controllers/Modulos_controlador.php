<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulos_controlador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modulos_modelo');
	}

	public function index()
	{
		$data["padres"]=$this->Modulos_modelo->traer_padres();
		$data["modulos"]=$this->Modulos_modelo->traer_modulos();
		$this->load->view('modulos/index',$data);
	}

	public function dibujar_tabla()
	{
		$html = "";
		$modulos = $this->Modulos_modelo->traer_modulos();

		foreach ($modulos as $key => $value) {
			$html .=  '<tr>';
			$html .=  '  <td>'.$value->idhijo.'</td>';
			$html .=  '  <td>'.$value->hijo.'</td>';
			$html .=  '  <td>'.$value->url.'</td>';
			$html .=  '  <td>'.$value->icono.'</td>';
			$html .=  '  <td>'.$value->padre.'</td>';
			$html .=  '<td><button onclick="modificar_modulos('.$value->idhijo.')" type="button" class="btn btn-primary"
						data-placement="top" data-original-title=".btn .btn-primary">
						Modificar
					</button>
				</td>';
			$html .=  '<td> <button  onclick ="eliminar_modulos('.$value->idhijo.')" type="button" class="btn btn-danger"
				data-placement="top" data-original-title=".btn .btn-danger">
				Eliminar
			</button>
			</td>';
			$html .=  '</tr>';

			}
		return $html;
	}

	public function guardar_modulo()
	{
		if ($_POST['id_modulo']==""){
			$resultado=$this->Modulos_modelo->guardar_modulo();
		} else{
			$resultado=$this->Modulos_modelo->modificar_modulos();

		}

		$tabla = $this->dibujar_tabla();
		echo  $resultado."|".$tabla;
	}


	public function eliminar_modulos()
	{
		$resultado=$this->Modulos_modelo->eliminarmodulos();
		$modulos = $this->Modulos_modelo->traer_modulos();

		$tabla = $this->dibujar_tabla();
		echo  $resultado."|".$tabla;
	}

	public function traer_modulos()
	{
		$r=$this->Modulos_modelo->traeruno();
		echo json_encode($r);
	}

}
