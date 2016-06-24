<?php if ( ! defined('BASEPATH')) exit('Acceso directo no permitido');
class Gadget_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function obtener_usuarios()
	{
	//	$this->db->select('* FROM usuarios WHERE usuario_id = 2 UNION SELECT * FROM usuarios WHERE tipo_usuario_id = 3', false);
	//	$this->db->select('* FROM usuarios WHERE tipo_usuario_id = 3', false);
		$this->db->select('*');
		$this->db->from('usuarios');
		$where = '(tipo_usuario_id IN (2,3))';
		$this->db->order_by('tipo_usuario_id', 'ASC');
		$this->db->order_by('usuario_nombre', 'ASC');
		$this->db->where($where);
		$query = $this->db->get();
		
        if ($query->num_rows() > 0)
            return $query;
        else
            return false;
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
	
	public function consultar_clientes_del_usuario($usuario_id)
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('usuario_id', $usuario_id); 
		$this->db->order_by('cliente_id', 'desc');
		$clientes = $this->db->get();
	
		if ( $clientes->num_rows() > 0)
		{
			return $clientes;
		}
		else return false;
	}
	
	public function mostrar_clientes_de_los_ejecutivos()
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->order_by('cliente_id', 'desc');
		$clientes =  $this->db->get();
	
		if ( $clientes->num_rows() > 0)
		{
			return $clientes;
		}
		else return false;
	}
	
	public function mostrar_clientes_de_los_ejecutivos_filtrado($filtro_usuario = null)
	{
		if($filtro_usuario == true)
		{
			$this->db->select('*');
			$this->db->from('clientes');
			$where = '(usuario_id IN ('.$filtro_usuario.'))';
			$this->db->where($where);
			$this->db->order_by('usuario_id', 'asc');
		}
		else
		{
			return false;
			break;
		}
	
		$query =  $this->db->get();
	
		if ( $query->num_rows() > 0)
		{
			return $query;
		}
		else return false;
	}
	
	public function mostrar_escritorio_gerencial($ordenamiento_monto = null, $ordenamiento_fecha = null, $ordenamiento_estado = null)
	{
		
		$this->db->select('*');
		$this->db->from('escritorio');
		
		if($ordenamiento_monto == null and $ordenamiento_fecha == null and $ordenamiento_estado == null)
		{
			$this->db->order_by('escritorio_fyh_creacion', 'DESC');
		}
		else
		{
			if($ordenamiento_estado == true)
			{
				switch ($ordenamiento_estado)
				{
					case 'Primer contacto':
						$this->db->where('escritorio_estado', "Primer contacto");
					break;
					
					case 'Reunión':
						$this->db->where('escritorio_estado', "Reunión");
					break;
					
					case 'Cotización':
						$this->db->where('escritorio_estado', "Cotización");
					break;
					
					case 'Cerrado':
						$this->db->where('escritorio_estado', "Cerrado");
					break;
					
					case 'Negociación':
						$this->db->where('escritorio_estado', "Negociación");
					break;
					
					case 'Rechaza':
						$this->db->where('escritorio_estado', "Rechaza");
					break;
			
					case null:
						false;
					break;
				}
				
			/*	switch ($ordenamiento_estado)
				{
					$estados = $this->obtener_estados();
					foreach ( $estados->result() as $e)
					{
						case '$e->estado_cliente_nombre;':
							$this->db->where('escritorio_estado', echo $e->estado_cliente_nombre); 
						break;
					}
					case null:
						false;
					break;
				} */
			}
			
			if($ordenamiento_monto == true)
			{
				switch ($ordenamiento_monto)
				{
					case 'mayor_monto':
						$this->db->order_by('escritorio_monto', 'DESC');
					break;
					
					case 'menor_monto':
						$this->db->order_by('escritorio_monto', 'ASC');
					break;
			
					case null:
						$this->db->order_by('escritorio_monto', 'ASC');
					break;
				}
			}
			
			if($ordenamiento_fecha == true)
			{
				switch ($ordenamiento_fecha)
				{
					case 'fecha_asc':
						$this->db->order_by('escritorio_fyh_creacion', 'DESC');
					break;
					
					case 'fecha_desc':
						$this->db->order_by('escritorio_fyh_creacion', 'ASC');
					break;
			
					case null:
						$this->db->order_by('escritorio_fyh_creacion', 'DESC');
					break;
				}
			}
		}	
		
			
		$clientes =  $this->db->get();
	
		if ( $clientes->num_rows() > 0)
		{
			return $clientes;
		}
		else return false;
	}
	
	public function mostrar_escritorio_gerencial_filtrado($filtro_usuario = null, $ordenamiento_monto = null, $ordenamiento_fecha = null, $ordenamiento_estado = null)
	{
		if($filtro_usuario == true)
		{
			$this->db->select('*');
			$this->db->from('escritorio');
			$where = '(usuario_id_creador IN ('.$filtro_usuario.'))';
			$this->db->where($where);
			
			if($ordenamiento_monto == null and $ordenamiento_fecha == null and $ordenamiento_estado == null)
			{
				$this->db->order_by('escritorio_fyh_creacion', 'DESC');
			}
			else
			{
				if($ordenamiento_estado == true)
				{
					switch ($ordenamiento_estado)
					{
						case 'Primer contacto':
							$this->db->where('escritorio_estado', "Primer contacto");
						break;
						
						case 'Reunión':
							$this->db->where('escritorio_estado', "Reunión");
						break;
						
						case 'Cotización':
							$this->db->where('escritorio_estado', "Cotización");
						break;
						
						case 'Cerrado':
							$this->db->where('escritorio_estado', "Cerrado");
						break;
						
						case 'Negociación':
							$this->db->where('escritorio_estado', "Negociación");
						break;
						
						case 'Rechaza':
							$this->db->where('escritorio_estado', "Rechaza");
						break;
				
						case null:
							false;
						break;
					}
					
				/*	switch ($ordenamiento_estado)
					{
						$estados = $this->obtener_estados();
						foreach ( $estados->result() as $e)
						{
							case '$e->estado_cliente_nombre;':
								$this->db->where('escritorio_estado', echo $e->estado_cliente_nombre); 
							break;
						}
						case null:
							false;
						break;
					} */
				}
				
				if($ordenamiento_monto == true)
				{
					switch ($ordenamiento_monto)
					{
						case 'mayor_monto':
							$this->db->order_by('escritorio_monto', 'ASC');
						break;
						
						case 'menor_monto':
							$this->db->order_by('escritorio_monto', 'DESC');
						break;
				
						case null:
							$this->db->order_by('escritorio_monto', 'ASC');
						break;
					}
				}
				
				if($ordenamiento_fecha == true)
				{
					switch ($ordenamiento_fecha)
					{
						case 'fecha_asc':
							$this->db->order_by('escritorio_fyh_creacion', 'ASC');
						break;
						
						case 'fecha_desc':
							$this->db->order_by('escritorio_fyh_creacion', 'DESC');
						break;
				
						case null:
							$this->db->order_by('escritorio_fyh_creacion', 'DESC');
						break;
					}
				}
			}
		}
		else
		{
			return false;
			break;
		}
	
		$query =  $this->db->get();
	
		if ( $query->num_rows() > 0)
		{
			return $query;
		}
		else return false;
	}
	
	public function consultar_escritorio($usuario_id)
	{
		$this->db->select('*');
		$this->db->from('escritorio');
		$this->db->where('usuario_id_creador', $usuario_id); 
		$this->db->order_by('escritorio_fyh_actualizado', 'desc');
		$clientes = $this->db->get();
	
		if ( $clientes->num_rows() > 0)
		{
			return $clientes;
		}
		else return false;
	}
	
	public function consultar_nombre_ejecutivo($usuario_id)
	{
		$this->db->select('usuario_nombre');
		$this->db->from('usuarios');
		$this->db->where('usuario_id', $usuario_id); 
		$query =  $this->db->get();
	
		if ( $query->num_rows() > 0)
		{
			return $query->row()->usuario_nombre;
		}
		else return false;
	}
	
	public function consultar_ia_del_cliente($cliente_id)
	{
		$this->db->select('*');
		$this->db->from('informacion_adicional');
		$this->db->where('cliente_id', $cliente_id); 
		$ia =  $this->db->get();
	
		if ( $ia->num_rows() > 0)
		{
			return $ia;
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
		
		$query =  $this->db->get();
		if ( $query->num_rows() > 0)
		{
			return $query;
		}
		else return false;
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
}