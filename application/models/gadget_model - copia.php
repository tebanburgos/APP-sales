<?php if ( ! defined('BASEPATH')) exit('Acceso directo no permitido');
class Gadget_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function obtener_usuarios()
	{
		$this->db->select('* FROM usuarios WHERE usuario_id = 2 UNION SELECT * FROM usuarios WHERE tipo_usuario_id = 3', false);
		$query = $this->db->get();
		
        if ($query->num_rows() > 0)
            return $query;
        else
            return false;
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
	
	public function mostrar_clientes_de_los_ejecutivos($ordenamiento)
	{
		$this->output->enable_profiler(TRUE);
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->join('informacion_adicional', 'clientes.cliente_id = informacion_adicional.cliente_id', 'inner');
		// filtros de checkboxs
		$this->db->group_by("clientes.cliente_id"); 
		
		switch ($ordenamiento)
			{
				case 'fecha_ingreso':
					$this->db->order_by('informacion_adicional.ia_fcha_y_hora', 'ASC');
				break;
			
				case 'mayor_valor':
					$this->db->order_by('informacion_adicional.ia_monto', 'DESC');
				break;
				
				case 'menor_valor':
					$this->db->order_by('informacion_adicional.ia_monto', 'ASC');
				break;
				
				case null:
					$this->db->order_by('informacion_adicional.cliente_id', 'ASC');
				break;
			}
			
		$clientes =  $this->db->get();
	
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