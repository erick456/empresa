<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_controlador extends CI_Controller {

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
		$this->load->model('Perfil_modelo');
	}

	public function index()
	{
		$data["perfil"]=$this->Perfil_modelo->traerperfil();
		$this->load->view('perfil/index',$data);
	}

	public function guardar_perfil()
	{
		if ($_POST['id_perfil']==""){
			$resultado=$this->Perfil_modelo->guardarperfil();
		} else{
		$resultado=$this->Perfil_modelo->modificar_perfil();

		}
		$perfil = $this->Perfil_modelo->traerperfil();
		$html = $resultado."|";
		foreach ($perfil as $key => $value) {
			$html .=  '<tr>';
			$html .=  '  <td>'.$value->id_perfil.'</td>';
			$html .=  '  <td>'.$value->descripcion.'</td>';
			$html .=  '  <td>'.$value->estado.'</td>';


			$html .=  '<td><button onclick="modificar_perfil('.$value->id_perfil.')" type="button" class="btn btn-primary"
			data-placement="top" data-original-title=".btn .btn-primary">
			Modificar
		</button>
	</td>';
	$html .=  '<td> <button  onclick ="eliminar_perfil('.$value->id_perfil.')" type="button" class="btn btn-danger"
	data-placement="top" data-original-title=".btn .btn-danger">
	Eliminar
</button>
</td>';
$html .=  '</tr>';

}

echo $html;
}
public function eliminar_perfil()
{
	$resultado=$this->Perfil_modelo->eliminarperfil();
	$perfil = $this->Perfil_modelo->traerperfil();
	$html = $resultado."|";
	foreach ($perfil as $key => $value) {
		$html .=  '<tr>';
		$html .=  '  <td>'.$value->id_perfil.'</td>';
		$html .=  '  <td>'.$value->descripcion.'</td>';
		$html .=  '  <td>'.$value->estado.'</td>';
		$html .=  '<td><button onclick="modificar_perfil('.$value->id_perfil.')" type="button" class="btn btn-primary"
		data-placement="top" data-original-title=".btn .btn-primary">
		Modificar
	</button>
</td>';
$html .=  '<td> <button  onclick ="eliminar_perfil('.$value->id_perfil.')" type="button" class="btn btn-danger"
data-placement="top" data-original-title=".btn .btn-danger">
Eliminar
</button>
</td>';
$html .=  '</tr>';

}

echo $html;
}
public function traer_perfil()
{
	$r=$this->Perfil_modelo->traeruno();
	echo json_encode($r);
}

}
