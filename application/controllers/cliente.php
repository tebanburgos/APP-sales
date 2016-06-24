<?php if ( ! defined('BASEPATH')) exit('Acceso Directo no Permitido');
Class Cliente extends CI_Controller
{
	private $nombre_archivo_adjunto_1;
	private $nombre_archivo_adjunto_2;
	private $nombre_archivo_adjunto_3;
	public $CI;
	
	public function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();	
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));
		$this->load->model(array('cliente_model'));
		$this->load->helper('url');
		$this->load->library('session');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
	}

	public function subir_archivo_adjunto_1()
	{
		$config1['upload_path'] = "./uploads/cotizaciones/";
		$config1['allowed_types'] = 'gif|jpg|png|pdf|docx|doc|rtf|txt|ppt|pptx|xlsx|csv|xls|zip|rar';
		$config1['overwrite'] = false;
		$config1['max_size'] = '6144';
		$config1['remove_spaces'] = true;
		$this->load->library('upload', $config1);
		
		$this->upload->initialize($config1);
				
		$registro = $this->quitaAcentos("ia_archivo_adjunto_1");
					
		if ( ! $this->upload->do_upload($registro))
			{
				$errores = $this->upload->display_errors();
				$this->session->set_flashdata('mensaje', 'Error al subir el archivo N°1: '.$errores);
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
			}
		else
			{
				$archivo = $this->upload->data();
				$this->nombre_archivo_adjunto_1 = $archivo['file_name'];
			}					
	}
	
		public function subir_archivo_adjunto_2()
	{
		$config2['upload_path'] = "./uploads/cotizaciones/";
		$config2['allowed_types'] = 'gif|jpg|png|pdf|docx|doc|rtf|txt|ppt|pptx|xlsx|csv|xls|zip|rar';
		$config2['overwrite'] = false;
		$config2['max_size'] = '6144';
		$config2['remove_spaces'] = true;
		$this->load->library('upload', $config2);
		
		$this->upload->initialize($config2);
				
		$registro = $this->quitaAcentos("ia_archivo_adjunto_2");
					
		if ( ! $this->upload->do_upload($registro))
			{
				$errores = $this->upload->display_errors();
				$this->session->set_flashdata('mensaje', 'Error al subir el archivo N°2: '.$errores);
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
			}
		else
			{
				$archivo = $this->upload->data();
				$this->nombre_archivo_adjunto_2 = $archivo['file_name'];
			}					
	}
	
		public function subir_archivo_adjunto_3()
	{
		$config3['upload_path'] = "./uploads/cotizaciones/";
		$config3['allowed_types'] = 'gif|jpg|png|pdf|docx|doc|rtf|txt|ppt|pptx|xlsx|csv|xls|zip|rar';
		$config3['overwrite'] = false;
		$config3['max_size'] = '6144';
		$config3['remove_spaces'] = true;
		$this->load->library('upload', $config3);
		
		$this->upload->initialize($config3);
				
		$registro = $this->quitaAcentos("ia_archivo_adjunto_3");
					
		if ( ! $this->upload->do_upload($registro))
			{
				$errores = $this->upload->display_errors();
				$this->session->set_flashdata('mensaje', 'Error al subir el archivo N°3: '.$errores);
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
			}
		else
			{
				$archivo = $this->upload->data();
				$this->nombre_archivo_adjunto_3 = $archivo['file_name'];
			}					
	}
	
	public function quitaAcentos($cadena)
	{
		$p = array('á','é','í','ó','ú','Á','É','Í','Ó','Ú','ñ','Ñ',' ');
		$r = array('a','e','i','o','u','A','E','I','O','U','n','N','_');
		return str_replace($p, $r, $cadena);
	}
	
	public function ingresar()
	{
		if ($this->session->userdata('tipo') == "1" or $this->session->userdata('tipo') == "2" or $this->session->userdata('tipo') == "3")
		{
			$this->load->view('header');	
			$this->load->view('cliente/ingresar');	
			$this->load->view('footer');	
		}
		else
		{
			$this->session->set_flashdata('mensaje', 'Usuario sin permiso o su tiempo de sesión dentro del sistema a expirado.<br> Inténtelo de nuevo o contáctese con el administrador del sitio');
			$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
			redirect('usuario/login');
		}
	}

	public function ingresar_cliente()
	{
	//	$this->output->enable_profiler(TRUE);
		if ($this->session->userdata('tipo') == "1" or $this->session->userdata('tipo') == "2" or $this->session->userdata('tipo') == "3")
		{
			if ($_POST)
			{
				$this->subir_archivo_adjunto_1();
				$this->subir_archivo_adjunto_2();
				$this->subir_archivo_adjunto_3();
				$cliente_fecha_creacion = gmdate('Y-m-d H:i:s', time() + (3600*-3));
				$ia_fecha_y_hora = gmdate('Y-m-d H:i:s', time() + (3600*-3));
				$usuario_id = $this->input->post('usuario_id');
				$codigo_usuario = $usuario_id;
				$cliente_nombre = $this->input->post('cliente_nombre');
				$cliente_empresa = $this->input->post('cliente_empresa');
				$cliente_correo_1 = $this->input->post('cliente_correo_1');
				$cliente_correo_2 = $this->input->post('cliente_correo_2');
				$cliente_telefono_1 = $this->input->post('cliente_telefono_1');
				$cliente_telefono_2 = $this->input->post('cliente_telefono_2');
				$ia_archivo_adjunto_1 = $this->nombre_archivo_adjunto_1;
				$ia_archivo_adjunto_2 = $this->nombre_archivo_adjunto_2;
				$ia_archivo_adjunto_3 = $this->nombre_archivo_adjunto_3;
				$ia_monto = $this->input->post('ia_monto');
				$ia_seo = $this->input->post('ia_seo');
				$ia_adwords = $this->input->post('ia_adwords');
				$ia_sm = $this->input->post('ia_sm');
				$ia_mm = $this->input->post('ia_mm');
				$ia_wc = $this->input->post('ia_wc');
				$ia_cc = $this->input->post('ia_cc');
				$ia_cc_wp = $this->input->post('ia_cc_wp');
				$ia_aplicacion = $this->input->post('ia_aplicacion');
				$ia_agencia = $this->input->post('ia_agencia');
				$ia_bc = $this->input->post('ia_bc');
				$ia_audiovisual = $this->input->post('ia_audiovisual');
				$estado_id = $this->input->post('estado_cliente');
				$ia_detalles = $this->input->post('ia_detalles');
				
				$insert_data = $this->cliente_model->insert_informacion_cliente($codigo_usuario, $cliente_nombre, $cliente_empresa, $cliente_correo_1, $cliente_correo_2, $cliente_telefono_1, $cliente_telefono_2, $cliente_fecha_creacion, $usuario_id, $ia_fecha_y_hora, $ia_archivo_adjunto_1, $ia_archivo_adjunto_2, $ia_archivo_adjunto_3, $ia_monto, $ia_seo, $ia_adwords, $ia_sm, $ia_mm, $ia_wc, $ia_cc, $ia_cc_wp, $ia_aplicacion, $ia_agencia, $ia_bc, $ia_audiovisual, $estado_id, $ia_detalles);
				
				if (! $insert_data)
				{
					$this->session->set_flashdata('mensaje', 'El cliente <strong>'.$cliente_nombre.'</strong> de <strong>'.$cliente_empresa.'</strong> ha sido ingresado al sistema satisfactoriamente.');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
				}
				else
				{
					$this->session->set_flashdata('mensaje', 'Ocurrió un error al ingresar el cliente.<br> Por favor, inténtelo nuevamente.');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
				}
				redirect(base_url());
			}
		}
	}
	
	public function editar()
	{
	//	$this->output->enable_profiler(TRUE);
		$usuario_id = $this->uri->segment(3);
		$cliente_id = $this->uri->segment(4);
		if ( is_numeric($usuario_id))
		{
			if($usuario_id == $this->session->userdata('id'))
			{
				if ($this->session->userdata('tipo') == "1" or $this->session->userdata('tipo') == "2" or $this->session->userdata('tipo') == "3")
				{
					if ( is_numeric($cliente_id))
					{
						if ( $this->cliente_model->existe_cliente($cliente_id))
						{
							if ($this->session->userdata('tipo') == "3")
							{
								if ( ! $this->cliente_model->consultar_si_cliente_perteneciente_al_usuario($usuario_id, $cliente_id))
								{
									$this->session->set_flashdata('mensaje', 'Este cliente no pertenece a Ud.');
									$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
									redirect(base_url());
									break;
								}
							}
							$datos_cliente = $this->cliente_model->obtener_datos_cliente($cliente_id);
							$datos_informacion_adicional = $this->cliente_model->obtener_ultima_ia_del_cliente($cliente_id);
							
							$this->load->view('header');
							$this->load->view('cliente/editar', array('datos_cliente' => $datos_cliente, 'datos_informacion_adicional' => $datos_informacion_adicional,));
							$this->load->view('footer');
						}
						else
						{
							$this->session->set_flashdata('mensaje', 'El cliente no exite. <br> Por favor, inténtelo nuevamente. Si el problema persiste contántese con Soporte Técnico');
							$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
							redirect(base_url());
						}
					}
					else
					{
						$this->session->set_flashdata('mensaje', 'Cliente no válido');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
						redirect(base_url());
					}
				}
				else
				{
					$this->session->set_flashdata('mensaje', 'El usuario no tiene los permisos para editar ese cliente o su tiempo de sesión dentro del sistema a expirado. <br> Por favor, inténtelo nuevamente. Si el problema persiste contántese con Soporte Técnico');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
					redirect(base_url());
				}
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'El usuario no está autorizado para editar a este cliente o su tiempo de sesión dentro del sistema a expirado. <br> Por favor, inténtelo nuevamente. Si el problema persiste contántese con Soporte Técnico');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
				redirect(base_url());
			}
		}
		else
		{
			$this->session->set_flashdata('mensaje', 'Usuario no válido');
			$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
			redirect(base_url());
		}
	}
	
	
	public function editar_cliente()
	{
	//	$this->output->enable_profiler(TRUE);
		if ($_POST)
		{
			$usuario_id = $this->uri->segment(3);
			$cliente_id = $this->uri->segment(4);
			
			$datos_informacion_adicional = $this->cliente_model->obtener_ultima_ia_del_cliente($cliente_id);
			
			$cliente_telefono_1 = $this->input->post('cliente_telefono_1');
			$cliente_telefono_2 = $this->input->post('cliente_telefono_2');
			
			$this->subir_archivo_adjunto_1();
			$this->subir_archivo_adjunto_2();
			$this->subir_archivo_adjunto_3();
			$ia_fecha_y_hora = gmdate('Y-m-d H:i:s', time() + (3600*-3));
			
			$ia_archivo_adjunto_1 = $this->nombre_archivo_adjunto_1;
			$ia_archivo_adjunto_2 = $this->nombre_archivo_adjunto_2;
			$ia_archivo_adjunto_3 = $this->nombre_archivo_adjunto_3;
			$ia_monto = $this->input->post('ia_monto');
			$ia_seo = $this->input->post('ia_seo');
			$ia_adwords = $this->input->post('ia_adwords');
			$ia_sm = $this->input->post('ia_sm');
			$ia_mm = $this->input->post('ia_mm');
			$ia_wc = $this->input->post('ia_wc');
			$ia_cc = $this->input->post('ia_cc');
			$ia_cc_wp = $this->input->post('ia_cc_wp');
			$ia_aplicacion = $this->input->post('ia_aplicacion');
			$ia_agencia = $this->input->post('ia_agencia');
			$ia_bc = $this->input->post('ia_bc');
			$ia_audiovisual = $this->input->post('ia_audiovisual');
			$ia_estado_cliente_id = $this->input->post('estado_cliente');
			$ia_detalles = $this->input->post('ia_detalles');
			
			if ($this->session->userdata('tipo') == "1" or $this->session->userdata('tipo') == "2")
			{
				$update_data_cliente = $this->cliente_model->update_telefono_cliente($cliente_id, $cliente_telefono_1, $cliente_telefono_2);
			}
			
			$datos_informacion_adicional = $this->cliente_model->obtener_ultima_ia_del_cliente($cliente_id);
			// Capturas para el historial
			
			$numero_del_ultimo_pivote = $this->cliente_model->consultar_ultimo_pivote_del_historial($cliente_id);
	
			if(is_numeric($numero_del_ultimo_pivote))
			{
				$numero_de_pivote = $numero_del_ultimo_pivote + 1;
			}
			else
			{
				$numero_de_pivote = '1';
			}
			
			if ($datos_informacion_adicional->ia_archivo_adjunto_1 != $ia_archivo_adjunto_1)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'Archivo adjunto 1', $ia_archivo_adjunto_1, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_archivo_adjunto_2 != $ia_archivo_adjunto_2)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'Archivo adjunto 2', $ia_archivo_adjunto_2, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_archivo_adjunto_3 != $ia_archivo_adjunto_3)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'Archivo adjunto 3', $ia_archivo_adjunto_3, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_monto != $ia_monto)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'Monto', $ia_monto, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_seo != $ia_seo)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'servicio SEO', $ia_seo, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_adwords != $ia_adwords)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'servicio adwords', $ia_adwords, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_sm != $ia_sm)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'servicio social media', $ia_sm, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_mm != $ia_mm)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'servicio mail marketing', $ia_mm, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_wc != $ia_wc)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'servicio web contenido', $ia_wc, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_cc != $ia_cc)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'servicio carro de compra', $ia_cc, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_cc_wp != $ia_cc_wp)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'servicio carro de compra con web pay', $ia_cc_wp, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_aplicacion != $ia_aplicacion)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'servicio aplicacion', $ia_aplicacion, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_agencia != $ia_agencia)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'servicio agencia', $ia_agencia, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_bc != $ia_bc)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'servicio branding corporativo', $ia_bc, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_audiovisual != $ia_audiovisual)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'servicio audivisual', $ia_audiovisual, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->estado_cliente_id != $ia_estado_cliente_id)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote, 'ID del estado del cliente', $ia_estado_cliente_id, $ia_fecha_y_hora);
			if ($datos_informacion_adicional->ia_detalles != $ia_detalles)
				$insert_data_historial = $this->cliente_model->insert_historial($usuario_id, $cliente_id, $numero_de_pivote,'Detalles', $ia_detalles, $ia_fecha_y_hora);
			// fin Capturas para el historial
			$insert_data_ia = $this->cliente_model->insert_nueva_ia($cliente_id, $usuario_id, $ia_fecha_y_hora, $ia_archivo_adjunto_1, $ia_archivo_adjunto_2, $ia_archivo_adjunto_3, $ia_monto, $ia_seo, $ia_adwords, $ia_sm, $ia_mm, $ia_wc, $ia_cc, $ia_cc_wp, $ia_aplicacion, $ia_agencia, $ia_bc, $ia_audiovisual, $ia_estado_cliente_id, $ia_detalles);
			$ia_id = $this->cliente_model->consultar_id_de_la_ultima_ia_ingresada();
			$actualizar_escritorio = $this->cliente_model->update_escritorio($usuario_id, $cliente_id, $ia_id, $ia_fecha_y_hora, $cliente_telefono_1, $cliente_telefono_2, $ia_archivo_adjunto_1, $ia_archivo_adjunto_2, $ia_archivo_adjunto_3, $ia_seo, $ia_adwords, $ia_sm, $ia_mm, $ia_wc, $ia_cc, $ia_cc_wp, $ia_aplicacion, $ia_agencia, $ia_bc, $ia_audiovisual, $ia_estado_cliente_id, $ia_monto);
			
			if (! $insert_data_ia)
			{
				$nombre_cliente = $this->cliente_model->obtener_nombre_cliente($cliente_id);
				
				$this->session->set_flashdata('mensaje', 'Información del cliente <strong>'.$nombre_cliente.'</strong> fue editada satisfactoriamente.');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-success');
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'Ocurrió un error al editar el cliente. <br> Por favor, inténtelo nuevamente.');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
			}
			// redirect('/escritorio');
			
		//	 header('location: http://imacomsales2.s2.imacom.cl/');
			redirect(base_url());
		}
	}
	

	public function historial()
	{
	//	$this->output->enable_profiler(TRUE);
		$usuario_id = $this->uri->segment(3);
		$cliente_id = $this->uri->segment(4);
		if ( is_numeric($usuario_id))
		{
			if($usuario_id == $this->session->userdata('id'))
			{
				if ($this->session->userdata('tipo') == "1" or $this->session->userdata('tipo') == "2" or $this->session->userdata('tipo') == "3")
				{
					if ( is_numeric($cliente_id))
					{
						if ( $this->cliente_model->existe_cliente($cliente_id))
						{
							if ($this->session->userdata('tipo') == "3")
							{
								if ( ! $this->cliente_model->consultar_si_cliente_perteneciente_al_usuario($usuario_id, $cliente_id))
								{
									$this->session->set_flashdata('mensaje', 'Este cliente no pertenece a Ud.');
									$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
									redirect(base_url());
									break;
								}
							}
							$datos_cliente = $this->cliente_model->obtener_datos_cliente($cliente_id);
							$datos_ia = $this->cliente_model->obtener_primer_ia_del_cliente($cliente_id);
							
							switch ($datos_ia->estado_cliente_id)
							{
								case 1:
									$primer_estado = "Primer contacto";
								break;
								case 3:
									$primer_estado = "Reunión";
								break;
								case 4:
									$primer_estado = "Cotización";
								break;
								case 6:
									$primer_estado = "Cerrado";
								break;
								case 7:
									$primer_estado = "Negociación";
								break;
								case 8:
									$primer_estado = "Rechaza";
								break;
							}
								
							$this->load->view('header');
							$this->load->view('cliente/historial', array('datos_cliente' => $datos_cliente, 'datos_ia' => $datos_ia, 'primer_estado' => $primer_estado));
						//	$this->load->view('cliente/historial', array('datos_cliente' => $datos_cliente));
							$this->load->view('footer');
						}
						else
						{
							$this->session->set_flashdata('mensaje', 'El cliente no exite <br> Por favor, inténtelo nuevamente. Si el problema persiste contántese con Soporte Técnico');
							$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
							redirect(base_url());
						}
					}
					else
					{
						$this->session->set_flashdata('mensaje', 'Cliente no válido <br> Por favor, inténtelo nuevamente. Si el problema persiste contántese con Soporte Técnico');
						$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
						redirect(base_url());
					}
				}
				else
				{
					$this->session->set_flashdata('mensaje', 'El usuario no tiene los permisos para ver el historial de este cliente o su tiempo de sesión dentro del sistema a expirado <br> Por favor, inténtelo nuevamente. Si el problema persiste contántese con Soporte Técnico');
					$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
					redirect(base_url());
				}
			}
			else
			{
				$this->session->set_flashdata('mensaje', 'El usuario no está autorizado para ver el historial de este cliente o su tiempo de sesión dentro del sistema a expirado. <br> Por favor, inténtelo nuevamente. Si el problema persiste contántese con Soporte Técnico');
				$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
				redirect(base_url());
			}
		}
		else
		{
			$this->session->set_flashdata('mensaje', 'Usuario no válido');
			$this->session->set_flashdata('mensaje_clase', 'alert alert-danger');
			redirect(base_url());
		}
	}
   	
	
	private function _view($view = 'admin/administrar', $data = NULL, $layout = TRUE)
	{
		$data['mensaje'] = $this->session->flashdata('mensaje');
		$data['mensaje_clase'] = $this->session->flashdata('mensaje_clase');
		if ( $layout)
		{
			$this->load->view('header');
			$this->load->view($view, $data);
			$this->load->view('footer');
		}
		else
		{
			$this->load->view($view, $data);
		}		
	}

}

?>