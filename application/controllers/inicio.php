<?php if ( ! defined('BASEPATH')) exit('Acceso Directo no Permitido');

class Inicio extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();	
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->load->model(array('usuario_model'));
		$this->load->helper('url');
		$this->load->library('session');
		$this->session->keep_flashdata('id');
		$this->session->keep_flashdata('tipo');
	//	$this->session->keep_flashdata('mensaje');
	//	$this->session->keep_flashdata('mensaje_clase');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
	}

	public function index()
	{
		$this->output->enable_profiler(TRUE);
		if ($this->session->userdata('tipo') == "1" or $this->session->userdata('tipo') == "2" or $this->session->userdata('tipo') == "3")
	//	if ($id == "1" or $id == "2" or $id == "3")
		{
		
			
			if ($_POST)
			{
				if(isset($_POST['ordenamiento_estado']))
				{
					$data['ordenar_estado'] = $_POST['ordenamiento_estado'];
				}
				else
				{
					$data['ordenar_estado'] = null;
				}
				
				if(isset($_POST['ordenamiento_monto']))
				{
					$data['ordenar_monto'] = $_POST['ordenamiento_monto'];
				}
				else
				{
					$data['ordenar_monto'] = null;
				}
				
				if(isset($_POST['ordenamiento_fecha']))
				{
					$data['ordenar_fecha'] = $_POST['ordenamiento_fecha'];
				}
				else
				{
					$data['ordenar_fecha'] = null;
				}
				
				if(isset($_POST['usuario']))
				{
					// captura de los check list en un arreglo y separarlos con una coma
					$filtro_usuario = "";
					for($i = 0; $i< count($_POST['usuario']); $i++)
					{
						$filtro_usuario = $filtro_usuario.$_POST['usuario'][$i] . ",";
					}
					// se borra la última coma
					$filtro_usuario = rtrim($filtro_usuario, ',');
					
					$data['filtro_usuario'] = $filtro_usuario;
				}
				else
				{
					$data['filtro_usuario'] = null;
				}
			}
			else
			{
				$data['ordenar_estado'] = null;
				$data['ordenar_monto'] = null;
				$data['ordenar_fecha'] = null;
				$data['filtro_usuario'] = null;
			}
			
			$this->load->view('header');
			$this->load->view('inicio/home', $data);
			$this->load->view('footer');
		}
		else
		{
			$this->session->set_flashdata('mensaje', 'Usuario sin permiso.<br> Inténtelo de nuevo o contáctese con el administrador del sitio');
			$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
			redirect('usuario/login');
		}
	}
}