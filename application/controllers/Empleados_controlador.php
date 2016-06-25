<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados_controlador extends CI_Controller {

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
		$this->load->model('Empleados_modelo');
	}

	public function index()
	{
		$data["empleados"]=$this->Empleados_modelo->traerempleados();
		$this->load->view('empleados/index',$data);
	}

	public function guardar_empleados()
	{
		if ($_POST['id_empleado']==""){
			$resultado=$this->Empleados_modelo->guardarempleados();
		} else{
		$resultado=$this->Empleados_modelo->modificar_empleados();

		}
		$empleados = $this->Empleados_modelo->traerempleados();
		$html = $resultado."|";
		foreach ($empleados as $key => $value) {
			$html .=  '<tr>';
			$html .=  '  <td>'.$value->id_empleado.'</td>';
			$html .=  '  <td>'.$value->nombre.'</td>';
			$html .=  '  <td>'.$value->apellido.'</td>';
			$html .=  '  <td>'.$value->dni.'</td>';
			$html .=  '  <td>'.$value->estado.'</td>';


			$html .=  '<td><button onclick="modificar_empleados('.$value->id_empleado.')" type="button" class="btn btn-primary"
			data-placement="top" data-original-title=".btn .btn-primary">
			Modificar
		</button>
	</td>';
	$html .=  '<td> <button  onclick ="eliminar_empleados('.$value->id_empleado.')" type="button" class="btn btn-danger"
	data-placement="top" data-original-title=".btn .btn-danger">
	Eliminar
</button>
</td>';
$html .=  '</tr>';

}

echo $html;
}
public function eliminar_empleados()
{
	$resultado=$this->Empleados_modelo->eliminarempleados();
	$empleados = $this->Empleados_modelo->traerempleados();
	$html = $resultado."|";
	foreach ($empleados as $key => $value) {
		$html .=  '<tr>';
		$html .=  '  <td>'.$value->id_empleado.'</td>';
		$html .=  '  <td>'.$value->nombre.'</td>';
		$html .=  '  <td>'.$value->apellido.'</td>';
		$html .=  '  <td>'.$value->dni.'</td>';
		$html .=  '  <td>'.$value->estado.'</td>';

		$html .=  '<td><button onclick="modificar_empleados('.$value->id_empleado.')" type="button" class="btn btn-primary"
		data-placement="top" data-original-title=".btn .btn-primary">
		Modificar
	</button>
</td>';
$html .=  '<td> <button  onclick ="eliminar_empleados('.$value->id_empleado.')" type="button" class="btn btn-danger"
data-placement="top" data-original-title=".btn .btn-danger">
Eliminar
</button>
</td>';
$html .=  '</tr>';

}

echo $html;
}
public function traer_empleado()
{
	$r=$this->Empleados_modelo->traeruno();
	echo json_encode($r);
}

}
