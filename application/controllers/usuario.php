<?php if ( ! defined('BASEPATH')) exit('Acceso Directo no Permitido');
Class Usuario extends CI_Controller
{
	public $CI;
	
	public function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();	
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->load->model(array('usuario_model'));
		$this->load->helper('url');
		$this->load->library('session');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
	}

	public function quitaAcentos($cadena)
	{
		$p = array('á','é','í','ó','ú','Á','É','Í','Ó','Ú','ñ','Ñ',' ');
		$r = array('a','e','i','o','u','A','E','I','O','U','n','N','_');
		return str_replace($p, $r, $cadena);
	}
	
	public function login()
	{
		$this->load->view('usuario/login');	
	}
	
	public function entrar()
	{
		$session_set_value = $this->session->all_userdata();
		
		$usuario = $this->input->post('usuario');
		$contrasena = md5($this->input->post('password'));
		$validacion = $this->usuario_model->consultar_password($usuario, $contrasena);
		
		if($validacion)
		{
			$datos_session = array(
				'id'		=>	$validacion->usuario_id,
				'email'		=>	$validacion->usuario_correo,
				'nombre'	=> 	$validacion->usuario_nombre,
				'apellido'	=> 	$validacion->usuario_apellido,
				'rut'		=>	$validacion->usuario_rut,
				'tipo'		=>	$validacion->tipo_usuario_id
			);

			$this->session->set_userdata($datos_session);
			redirect(base_url());
		}
		else
		{
			$this->session->set_flashdata('mensaje', 'Usuario y/o contraseña inválida.<br> Inténtelo de nuevo o contáctese con el administrador del sitio');
			$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
			redirect('usuario/login');
		}
	}
	
	public function ingresar()
	{
		if ($this->session->userdata('tipo') == "1")
		{
			$this->load->view('header');	
			$this->load->view('usuario/ingresar');	
			$this->load->view('footer');	
		}
		else
		{
			$this->session->set_flashdata('mensaje', 'Usuario sin permiso o su tiempo de sesión dentro del sistema a expirado.<br> Inténtelo de nuevo o contáctese con el administrador del sitio');
			$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
			redirect(base_url());
		}
	}
	
	public function ingresar_usuario()
	{
		if ($this->session->userdata('tipo') == "1")
		{
			if ($_POST)
			{
				$usuario_nombre = $this->input->post('usuario_nombre');
				$usuario_apellido = $this->input->post('usuario_apellido');
				$usuario_rut = $this->input->post('usuario_rut');
				$usuario_correo = $this->input->post('usuario_correo');
				$tipo_usuario_id = $this->input->post('tipo_usuario_id');
				
				$insert_data = $this->usuario_model->insert_usuario($usuario_nombre, $usuario_apellido, $usuario_rut, $usuario_correo, $tipo_usuario_id);
				
				if (! $insert_data)
				{
					$this->session->set_flashdata('mensaje', 'El usuario <strong>'.$usuario_nombre.' '.$usuario_apellido.'</strong> ha sido ingresado al sistema satisfactoriamente.<br> Su contraseña por defecto es <strong>"1234"</strong>. Para cambiarla debe ir al apartado "Cambiar contraseña" del menú desplegable ');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
				}
				else
				{
					$this->session->set_flashdata('mensaje', 'Ocurrió un error al ingresar el usuario.<br> Por favor, inténtelo nuevamente.');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
				}
				redirect(base_url());
			}
		}
	}
	
	public function administrar()
	{
		if ($this->session->userdata('tipo') == "1")
		{
			$this->load->view('header');	
			$this->load->view('usuario/administrar');
			$this->load->view('footer');	
		}
		else
		{
			$this->session->set_flashdata('mensaje', 'Usuario sin permiso o su tiempo de sesión dentro del sistema a expirado.<br> Inténtelo de nuevo o contáctese con el administrador del sitio');
			$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
			redirect(base_url());
		}
	}
	
	public function cambiar_clave()
	{
		$this->load->library('email');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ( $this->form_validation->run('cambiar_clave') == false )
		{			
			$this->load->view('header');
			$this->load->view('usuario/cambiar_clave');
			$this->load->view('footer');			
		}
		else
		{
			if ( $this->auth->recuperar_clave($this->input->post('email')) )
			{
				$this->session->set_flashdata('mensaje', 'Hemos enviado un correo electrónico con las instruciones para recuperar su contraseña');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-info');
				redirect(base_url());
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Este email no se encuentra registrado');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-info');
			}
		}		
	}
	
	function actualizar_clave()
	{
		$usuario_token_recuperar_clave = $this->uri->segment(3);
		$usuario_id = $this->usuario_model->obtener_id_del_usuario_por_token($usuario_token_recuperar_clave);
		if ($_POST)
			{
				if($_POST['clave'] == $_POST['clave_confirmar'])
				{
					$clave_encriptada = md5($_POST['clave']);
					$insert_data = $this->usuario_model->actualizar_nueva_password($usuario_id, $clave_encriptada);
					$this->session->set_flashdata('mensaje', 'Contraseña cambiada exitosamente');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
					redirect(base_url());
					break;
				}
				else
				{
					$this->session->set_flashdata('mensaje', 'Las contraseñas no coinciden. Inténtelo nuevamente.');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
					redirect('usuario/actualizar_clave');
					break;
				}
			}
		$this->load->view('header');	
		$this->load->view('usuario/actualizar_clave');
		$this->load->view('footer');
	}
	
	public function salir()
	{
		$this->session->sess_destroy();
		redirect('usuario/login');
	}
}
?>