<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos_controlador extends CI_Controller {

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
		$this->load->model('Permisos_modelo');
	}

	public function index()
	{
		$data["permisos"]=$this->Permisos_modelo->traerpermisos();
		$this->load->view('permisos/index',$data);
	}

	public function guardar_permisos()
	{
		if ($_POST['id_permiso']==""){
			$resultado=$this->Permisos_modelo->guardarpermisos();
		} else{
		$resultado=$this->Permisos_modelo->modificar_permisos();

		}
		$permisos = $this->Permisos_modelo->traerpermisos();
		$html = $resultado."|";
		foreach ($permisos as $key => $value) {
			$html .=  '<tr>';
			$html .=  '  <td>'.$value->id_permiso.'</td>';
			$html .=  '  <td>'.$value->descripcion.'</td>';
			$html .=  '  <td>'.$value->estado.'</td>';


			$html .=  '<td><button onclick="modificar_permisos('.$value->id_permiso.')" type="button" class="btn btn-primary"
			data-placement="top" data-original-title=".btn .btn-primary">
			Modificar
		</button>
	</td>';
	$html .=  '<td> <button  onclick ="eliminar_permisos('.$value->id_permiso.')" type="button" class="btn btn-danger"
	data-placement="top" data-original-title=".btn .btn-danger">
	Eliminar
</button>
</td>';
$html .=  '</tr>';

}

echo $html;
}
public function eliminar_permisos()
{
	$resultado=$this->Permisos_modelo->eliminarpermisos();
	$permisos = $this->Permisos_modelo->traerpermisos();
	$html = $resultado."|";
	foreach ($permisos as $key => $value) {
		$html .=  '<tr>';
		$html .=  '  <td>'.$value->id_permiso.'</td>';
		$html .=  '  <td>'.$value->descripcion.'</td>';
		$html .=  '  <td>'.$value->estado.'</td>';
		$html .=  '<td><button onclick="modificar_permisos('.$value->id_permiso.')" type="button" class="btn btn-primary"
		data-placement="top" data-original-title=".btn .btn-primary">
		Modificar
	</button>
</td>';
$html .=  '<td> <button  onclick ="eliminar_permisos('.$value->id_permiso.')" type="button" class="btn btn-danger"
data-placement="top" data-original-title=".btn .btn-danger">
Eliminar
</button>
</td>';
$html .=  '</tr>';

}

echo $html;
}
public function traer_permiso()
{
	$r=$this->Permisos_modelo->traeruno();
	echo json_encode($r);
}

}
