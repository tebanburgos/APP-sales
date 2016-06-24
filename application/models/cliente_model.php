<?php if ( ! defined('BASEPATH')) exit('Acceso directo no permitido');
class Cliente_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
		public function obtener_estados()
	{
		$this->db->select('*');
		$this->db->from('estados_clientes');
		$this->db->order_by('estado_cliente_id', 'ASC');
		$estados =  $this->db->get();
	
		if ( $estados->num_rows() > 0)
		{
			return $estados;
		}
	
		else return false;
	}
	
	public function insert_informacion_cliente($codigo_usuario, $cliente_nombre, $cliente_empresa, $cliente_correo_1, $cliente_correo_2, $cliente_telefono_1, $cliente_telefono_2, $cliente_fecha_creacion, $usuario_id, $ia_fecha_y_hora, $ia_archivo_adjunto_1, $ia_archivo_adjunto_2, $ia_archivo_adjunto_3, $ia_monto, $ia_seo, $ia_adwords, $ia_sm, $ia_mm, $ia_wc, $ia_cc, $ia_cc_wp, $ia_aplicacion, $ia_bc, $ia_audiovisual, $ia_agencia, $estado_id, $ia_detalles)
	{
		$query = $this->db->insert('clientes', array('usuario_id'=>$codigo_usuario, 'cliente_nombre'=>$cliente_nombre, 'cliente_empresa'=>$cliente_empresa, 'cliente_correo_1'=>$cliente_correo_1, 'cliente_correo_2'=>$cliente_correo_2, 'cliente_telefono_1'=>$cliente_telefono_1, 'cliente_telefono_2'=>$cliente_telefono_2, 'cliente_fecha_creacion'=>$cliente_fecha_creacion));
	
		$cliente_id = $this->consultar_id_del_ultimo_cliente_ingresado();
	
		$query = $this->db->insert('informacion_adicional', array('cliente_id'=>$cliente_id, 'usuario_id'=>$usuario_id, 'estado_cliente_id'=>$estado_id, 'ia_fecha_y_hora'=>$ia_fecha_y_hora, 'ia_archivo_adjunto_1'=>$ia_archivo_adjunto_1, 'ia_archivo_adjunto_2'=>$ia_archivo_adjunto_2, 'ia_archivo_adjunto_3'=>$ia_archivo_adjunto_3, 'ia_monto'=>$ia_monto, 'ia_seo'=>$ia_seo, 'ia_adwords'=>$ia_adwords, 'ia_sm'=>$ia_sm, 'ia_mm'=>$ia_mm, 'ia_wc'=>$ia_wc, 'ia_cc'=>$ia_cc, 'ia_cc_wp'=>$ia_cc_wp, 'ia_aplicacion'=>$ia_aplicacion, 'ia_bc'=>$ia_bc, 'ia_audiovisual'=>$ia_audiovisual, 'ia_agencia'=>$ia_agencia, 'ia_detalles'=>$ia_detalles));
		
		$ia_id = $this->consultar_id_de_la_ultima_ia_ingresada();
		
		// los siguientes if son para guardar los datos en la tabla Escritorio
		
		// para capturar los 2 correos en un sólo resgistro
		
		if($cliente_correo_2 != null)
		{
			$correo_2 = ', <br> '.$cliente_correo_2;
		}
		else
		{
			$correo_2 = "";
		}
		
		// para capturar todos los teléfonos en un sólo registro
		
		if($cliente_telefono_2 != null)
		{
			$telefono_2 = ', '.$cliente_telefono_2;
		}
		else
		{
			$telefono_2 = "";
		}
		
		// para capturar todos los archivos adjuntos en un sólo registro
		
		if ($ia_archivo_adjunto_1 == null and $ia_archivo_adjunto_2 == null and $ia_archivo_adjunto_3 == null)
		{
			$todas_las_cotizaciones = 'Sin archivo adjunto aún';
		}
		else
		{
			if ($ia_archivo_adjunto_1 != null)
			{
				$cotizacion_1 =  '<a href="'.base_url("/uploads/cotizaciones/".$ia_archivo_adjunto_1).'"; target="_blank"> Coti 1</a>';
			}
			else
			{
				$cotizacion_1 = '';
			}
			if ($ia_archivo_adjunto_2 != null)
			{
				$cotizacion_2 =  '<a href="'.base_url("/uploads/cotizaciones/".$ia_archivo_adjunto_2).'"; target="_blank"> Coti 2</a>';
			}
			else
			{
				$cotizacion_2 = "";
			}
			if($ia_archivo_adjunto_3 != null)
			{
				$cotizacion_3 =  '<a href="'.base_url("/uploads/cotizaciones/".$ia_archivo_adjunto_3).'"; target="_blank"> Coti 3</a>';
			}
			else
			{
				$cotizacion_3 = "";
			}
			$todas_las_cotizaciones = $cotizacion_1.$cotizacion_2.$cotizacion_3;
		}
		
		// para capturar todos los servicios en una sólo registro
		
		if($ia_seo == "1") 
		{
			$servicio_seo = "SEO, ";
		}
		else
		{
			$servicio_seo = "";
		}
		
		if($ia_adwords == "1") 
		{
			$servicio_adwords = "Adwords, ";
		}
		else
		{
			$servicio_adwords = "";
		}
		
		if($ia_sm == "1") 
		{
			$servicio_sm = "Social Media, ";
		}
		else
		{
			$servicio_sm = "";
		}
		
		if($ia_mm == "1") 
		{
			$servicio_mm = "Mail Marketing, ";
		}
		else
		{
			$servicio_mm = "";
		}
		
		if($ia_wc == "1") 
		{
			$servicio_wc = "Web contenido, ";
		}
		else
		{
			$servicio_wc = "";
		}
		
		if($ia_cc == "1") 
		{
			$servicio_cc = "Carro de compra, ";
		}
		else
		{
			$servicio_cc = "";
		}
		
		if($ia_cc_wp == "1") 
		{
			$servicio_cc_wp = "Carro de compra +Web Pay, ";
		}
		else
		{
			$servicio_cc_wp = "";
		}
		
		if($ia_aplicacion == "1") 
		{
			$servicio_aplicacion = "Aplicación, ";
		}
		else
		{
			$servicio_aplicacion = "";
		}
		
		if($ia_agencia == "1") 
		{
			$servicio_agencia = "Agencia, ";
		}
		else
		{
			$servicio_agencia = "";
		}
		
		if($ia_bc == "1") 
		{
			$servicio_branding = "Branding corporativo, ";
		}
		else
		{
			$servicio_branding = "";
		}
		
		if($ia_audiovisual == "1") 
		{
			$servicio_audiovisual = "Audiovisual";
		}
		else
		{
			$servicio_audiovisual = "";
		}
		
		$todos_los_servicios = $servicio_seo.$servicio_adwords.$servicio_sm.$servicio_mm.$servicio_wc.$servicio_cc.$servicio_cc_wp.$servicio_aplicacion.$servicio_agencia.$servicio_branding.$servicio_audiovisual; 
		$todos_los_servicios = rtrim($todos_los_servicios, ' ,');
		
		// capturar el estado
		
		$estado = $this->obtener_nombre_del_estado($estado_id);
		
		// capturar monto
		
		if(is_numeric($ia_monto))
		{
			$escritorio_monto = $ia_monto;
		}
		else
		{
			$escritorio_monto = "Sin monto aún";
		}
		
		
		$query = $this->db->insert('escritorio', array('usuario_id_creador' => $usuario_id, 'usuario_id_editor' => $usuario_id, 'cliente_id' => $cliente_id, 'ia_id' => $ia_id, 'escritorio_fyh_creacion' => $cliente_fecha_creacion, 'escritorio_fyh_actualizado' => $cliente_fecha_creacion, 'escritorio_nombre' => $cliente_nombre, 'escritorio_empresa' => $cliente_empresa, 'escritorio_correos' => $cliente_correo_1.$correo_2, 'escritorio_telefonos'=> $cliente_telefono_1.$telefono_2, 'escritorio_archivos_adjuntos' => $todas_las_cotizaciones, 'escritorio_servicios' => $todos_los_servicios, 'escritorio_estado' => $estado, 'escritorio_monto' => $escritorio_monto));
	}
	
	public function obtener_nombre_del_estado($estado_id)
	{
		$this->db->select('estado_cliente_nombre');
		$this->db->from('estados_clientes');
		$this->db->where('estado_cliente_id', $estado_id); 
		$query =  $this->db->get();
	
		if ( $query->num_rows() > 0)
		{
			return $query->row()->estado_cliente_nombre;
		}
		else return false;
	}
	
	public function update_escritorio($usuario_id, $cliente_id, $ia_id, $ia_fecha_y_hora, $cliente_telefono_1, $cliente_telefono_2, $ia_archivo_adjunto_1, $ia_archivo_adjunto_2, $ia_archivo_adjunto_3, $ia_seo, $ia_adwords, $ia_sm, $ia_mm, $ia_wc, $ia_cc, $ia_cc_wp, $ia_aplicacion, $ia_agencia, $ia_bc, $ia_audiovisual, $ia_estado_cliente_id, $ia_monto)
	{
		
		// para capturar todos los teléfonos en un sólo registro
		if($cliente_telefono_2 != null)
		{
			$telefono_2 = ', '.$cliente_telefono_2;
		}
		else
		{
			$telefono_2 = "";
		}
		$telefonos = $cliente_telefono_1.$telefono_2;
		
		// para capturar todos los archivos adjuntos en un sólo registro
		
		if ($ia_archivo_adjunto_1 == null and $ia_archivo_adjunto_2 == null and $ia_archivo_adjunto_3 == null)
		{
			$todas_las_cotizaciones = 'Sin archivo adjunto aún';
		}
		else
		{
			if ($ia_archivo_adjunto_1 != null)
			{
				$cotizacion_1 =  '<a href="'.base_url("/uploads/cotizaciones/".$ia_archivo_adjunto_1).'"; target="_blank"> Coti 1</a>';
			}
			else
			{
				$cotizacion_1 = '';
			}
			if ($ia_archivo_adjunto_2 != null)
			{
				$cotizacion_2 =  '<a href="'.base_url("/uploads/cotizaciones/".$ia_archivo_adjunto_2).'"; target="_blank"> Coti 2</a>';
			}
			else
			{
				$cotizacion_2 = "";
			}
			if($ia_archivo_adjunto_3 != null)
			{
				$cotizacion_3 =  '<a href="'.base_url("/uploads/cotizaciones/".$ia_archivo_adjunto_3).'"; target="_blank"> Coti 3</a>';
			}
			else
			{
				$cotizacion_3 = "";
			}
			$todas_las_cotizaciones = $cotizacion_1.$cotizacion_2.$cotizacion_3;
		}
		
		// para capturar todos los servicios en una sólo registro
		
		if($ia_seo == "1") 
		{
			$servicio_seo = "SEO, ";
		}
		else
		{
			$servicio_seo = "";
		}
		
		if($ia_adwords == "1") 
		{
			$servicio_adwords = "Adwords, ";
		}
		else
		{
			$servicio_adwords = "";
		}
		
		if($ia_sm == "1") 
		{
			$servicio_sm = "Social Media, ";
		}
		else
		{
			$servicio_sm = "";
		}
		
		if($ia_mm == "1") 
		{
			$servicio_mm = "Mail Marketing, ";
		}
		else
		{
			$servicio_mm = "";
		}
		
		if($ia_wc == "1") 
		{
			$servicio_wc = "Web contenido, ";
		}
		else
		{
			$servicio_wc = "";
		}
		
		if($ia_cc == "1") 
		{
			$servicio_cc = "Carro de compra, ";
		}
		else
		{
			$servicio_cc = "";
		}
		
		if($ia_cc_wp == "1") 
		{
			$servicio_cc_wp = "Carro de compra +Web Pay, ";
		}
		else
		{
			$servicio_cc_wp = "";
		}
		
		if($ia_aplicacion == "1") 
		{
			$servicio_aplicacion = "Aplicación, ";
		}
		else
		{
			$servicio_aplicacion = "";
		}
		
		if($ia_agencia == "1") 
		{
			$servicio_agencia = "Agencia, ";
		}
		else
		{
			$servicio_agencia = "";
		}
		
		if($ia_bc == "1") 
		{
			$servicio_branding = "Branding corporativo, ";
		}
		else
		{
			$servicio_branding = "";
		}
		
		if($ia_audiovisual == "1") 
		{
			$servicio_audiovisual = "Audiovisual";
		}
		else
		{
			$servicio_audiovisual = "";
		}
		
		$todos_los_servicios = $servicio_seo.$servicio_adwords.$servicio_sm.$servicio_mm.$servicio_wc.$servicio_cc.$servicio_cc_wp.$servicio_aplicacion.$servicio_agencia.$servicio_branding.$servicio_audiovisual; 
		$todos_los_servicios = rtrim($todos_los_servicios, ' ,');
		
		// capturar el estado
		
		$estado = $this->obtener_nombre_del_estado($ia_estado_cliente_id);
		
		// capturar monto
		
		if(is_numeric($ia_monto))
		{
			$escritorio_monto = $ia_monto;
		}
		else
		{
			$escritorio_monto = "Sin monto aún";
		}
		
		$data = array(
				'usuario_id_editor'=> $usuario_id,
				'ia_id'=> $ia_id,
				'escritorio_fyh_actualizado'=> $ia_fecha_y_hora,
				'escritorio_telefonos'=> $telefonos,
				'escritorio_archivos_adjuntos'=> $todas_las_cotizaciones,
				'escritorio_servicios'=> $todos_los_servicios,
				'escritorio_estado'=> $estado,
				'escritorio_monto'=> $escritorio_monto
				);
		$this->db->where('cliente_id', $cliente_id);
		$this->db->update('escritorio', $data); 
		
		return $this->db->affected_rows();
	}
	
	

	public function consultar_id_del_ultimo_cliente_ingresado()
	{
		$ultimo_cliente = $this->db->order_by('cliente_id', 'desc')->get('clientes');
		if ( $ultimo_cliente->num_rows() > 0)
		{
			$cliente = $ultimo_cliente->row();
			return $cliente->cliente_id;
		}
		else return NULL;
	}
	
	public function consultar_id_de_la_ultima_ia_ingresada()
	{
		$ultima_ia = $this->db->order_by('ia_id', 'desc')->get('informacion_adicional');
		if ( $ultima_ia->num_rows() > 0)
		{
			$ia = $ultima_ia->row();
			return $ia->ia_id;
		}
		else return NULL;
	}
	
	public function existe_cliente($cliente_id = NULL)
	{
		if ( ! is_null($cliente_id))
		{
			$proyecto = $this->db->get_where('clientes', array('cliente_id' => $cliente_id));
			if ( $proyecto->num_rows() > 0) return true;
			else return false;
		}
		return false;			
	}
	
	public function obtener_datos_cliente($cliente_id)
	{
		return $this->db->get_where('clientes', array('cliente_id' => $cliente_id))->row();
	}
	
	public function obtener_ia_del_cliente($cliente_id)
	{
		$this->db->select('*');
		$this->db->from('informacion_adicional');
		$this->db->where('cliente_id', $cliente_id);
		$this->db->order_by('ia_id', 'desc');
		
		$query = $this->db->get();
		if ( $query->num_rows() > 0)
		{
			return $query;
		}
		else return NULL;
	}
	
	public function obtener_historial_del_cliente($cliente_id, $pivote)
	{
		$this->db->select('*');
		$this->db->from('historial');
		$this->db->where('cliente_id', $cliente_id);
		$this->db->where('historial_pivote', $pivote);
		$this->db->order_by('historial_id', 'asc');
		
		$query = $this->db->get();
		if ( $query->num_rows() > 0)
		{
			return $query;
		}
		else return NULL;
	}
	
	public function total_historial_cliente($cliente_id)
	{
		$this->db->select('historial_pivote');
		$this->db->from('historial');
		$this->db->where('cliente_id', $cliente_id);
		$this->db->order_by('historial_pivote', 'desc');
		
		$query =  $this->db->get();
	
		if ( $query->num_rows() > 0)
		{
			return $query->row()->historial_pivote;
		}
		else return false;
	}
	
	
	public function consultar_nombre_estado($estado_cliente_id)
	{
		$this->db->select('estado_cliente_nombre');
		$this->db->from('estados_clientes');
		$this->db->where('estado_cliente_id', $estado_cliente_id); 
		$query =  $this->db->get();
	
		if ( $query->num_rows() > 0)
		{
			return $query->row()->estado_cliente_nombre;
		}
		else return false;
	}
	
	public function fecha_y_hora_del_historial($cliente_id, $pivote)
	{
		$this->db->select('historial_fecha_y_hora');
		$this->db->from('historial');
		$this->db->where('cliente_id', $cliente_id); 
		$this->db->where('historial_pivote', $pivote); 
		$this->db->group_by("historial_fecha_y_hora"); 
		$query =  $this->db->get();
	
		if ( $query->num_rows() > 0)
		{
			return $query->row()->historial_fecha_y_hora;
		}
		else return false;
	}
	
	public function obtener_ultima_ia_del_cliente($cliente_id)
	{
		$this->db->select('*');
		$this->db->from('informacion_adicional');
		$this->db->where('cliente_id', $cliente_id);
		$this->db->order_by('ia_id', 'desc');
		$this->db->limit(1);
		
		$query = $this->db->get();
		if ( $query->num_rows() > 0)
		{
			return $query->row();
		}
		else return NULL;
	}
	
	public function obtener_primer_ia_del_cliente($cliente_id)
	{
		$this->db->select('*');
		$this->db->from('informacion_adicional');
		$this->db->where('cliente_id', $cliente_id);
		$this->db->order_by('ia_id', 'asc');
		$this->db->limit(1);
		
		$query = $this->db->get();
		if ( $query->num_rows() > 0)
		{
			return $query->row();
		}
		else return NULL;
	}
	
	public function consultar_si_cliente_perteneciente_al_usuario($usuario_id, $cliente_id)
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('usuario_id', $usuario_id);
		$this->db->where('cliente_id', $cliente_id);
		
		$query =  $this->db->get();
		if ( $query->num_rows() > 0)
		{
			return true;
		}
		else return false;
	}
	
	public function update_telefono_cliente($cliente_id, $cliente_telefono_1, $cliente_telefono_2)
	{
		$data = array(
				'cliente_telefono_1'=> $cliente_telefono_1,
				'cliente_telefono_2'=> $cliente_telefono_2
				);
		$this->db->where('cliente_id', $cliente_id);
		$this->db->update('clientes', $data); 
		
		return $this->db->affected_rows();
	}
	
	public function insert_historial($usuario_id, $cliente_id, $historial_pivote, $historial_campo , $historial_dato, $historial_fecha_y_hora)
	{	
		$query = $this->db->insert('historial', array('usuario_id'=>$usuario_id, 'cliente_id'=>$cliente_id, 'historial_pivote'=>$historial_pivote, 'historial_campo'=>$historial_campo, 'historial_dato'=>$historial_dato, 'historial_fecha_y_hora'=>$historial_fecha_y_hora));
	}
	
	public function consultar_ultimo_pivote_del_historial($cliente_id)
	{
		$this->db->select('historial_pivote');
		$this->db->from('historial');
		$this->db->where('cliente_id', $cliente_id);
		$this->db->order_by('historial_id', 'desc');
		$this->db->limit(1);
		
		$ultimo_historial = $this->db->get();
		
		if ( $ultimo_historial->num_rows() > 0)
		{
			return $ultimo_historial->row()->historial_pivote;
		}
		else return NULL;
	}
	
	
	public function insert_nueva_ia($cliente_id, $usuario_id, $ia_fecha_y_hora, $ia_archivo_adjunto_1, $ia_archivo_adjunto_2, $ia_archivo_adjunto_3, $ia_monto, $ia_seo, $ia_adwords, $ia_sm, $ia_mm, $ia_wc, $ia_cc, $ia_cc_wp, $ia_aplicacion, $ia_agencia, $ia_bc, $ia_audiovisual, $ia_estado_cliente_id, $ia_detalles)
	{	
		$query = $this->db->insert('informacion_adicional', array('cliente_id'=>$cliente_id, 'usuario_id'=>$usuario_id, 'estado_cliente_id'=>$ia_estado_cliente_id, 'ia_fecha_y_hora'=>$ia_fecha_y_hora, 'ia_archivo_adjunto_1'=>$ia_archivo_adjunto_1, 'ia_archivo_adjunto_2'=>$ia_archivo_adjunto_2, 'ia_archivo_adjunto_3'=>$ia_archivo_adjunto_3, 'ia_monto'=>$ia_monto, 'ia_seo'=>$ia_seo, 'ia_adwords'=>$ia_adwords, 'ia_sm'=>$ia_sm, 'ia_mm'=>$ia_mm, 'ia_wc'=>$ia_wc, 'ia_cc'=>$ia_cc, 'ia_cc_wp'=>$ia_cc_wp, 'ia_aplicacion'=>$ia_aplicacion, 'ia_agencia'=>$ia_agencia, 'ia_bc'=>$ia_bc, 'ia_audiovisual'=>$ia_audiovisual, 'ia_detalles'=>$ia_detalles));
	}
	
	public function obtener_nombre_cliente($cliente_id)
	{
		$this->db->select('cliente_nombre');
		$this->db->from('clientes');
		$this->db->where('cliente_id', $cliente_id); 
		$query =  $this->db->get();
	
		if ( $query->num_rows() > 0)
		{
			return $query->row()->cliente_nombre;
		}
		else return false;
	}
}