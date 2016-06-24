<?php if ( ! defined('BASEPATH')) exit('Acceso directo no permitido');
class Usuario_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function consultar_password($usuario, $contrasena)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('usuario_correo', $usuario);
		$this->db->where('usuario_password', $contrasena); 
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		return false;
	}
	
	public function insert_usuario($usuario_nombre, $usuario_apellido, $usuario_rut, $usuario_correo, $tipo_usuario_id)
	{
		$query = $this->db->insert('usuarios', array('usuario_nombre'=>$usuario_nombre, 'usuario_apellido'=>$usuario_apellido, 'usuario_rut'=>$usuario_rut, 'usuario_correo'=>$usuario_correo, 'usuario_password'=>'81dc9bdb52d04dc20036dbd8313ed055', 'tipo_usuario_id'=>$tipo_usuario_id));
	}
	
	public function mostrar_usuarios()
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$where = '(usuario_id != 1)';
		$this->db->where($where);
		$this->db->order_by('usuario_id', 'asc');
		$usuarios =  $this->db->get();
	
		if ( $usuarios->num_rows() > 0)
		{
			return $usuarios;
		}
		else return false;
	}
	
	public function consultar_tipo_usuario($tipo_usuario_id)
	{
		$this->db->select('tipo_usuario_descripcion');
		$this->db->from('tipos_usuarios');
		$this->db->where('tipo_usuario_id', $tipo_usuario_id); 
		$query =  $this->db->get();
	
		if ( $query->num_rows() > 0)
		{
			return $query->row()->tipo_usuario_descripcion;
		}
		else return false;
	}
	
		public function obtener_id_del_usuario_por_token($token)
	{
		$this->db->select('usuario_id');
		$this->db->from('usuarios');
		$this->db->where('usuario_token_recuperar_clave', $token); 
		
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->row()->usuario_id;
		}
		return false;
	}
	
	public function actualizar_nueva_password($usuario_id, $clave_encriptada)
	{
		$data = array(
               'usuario_password' => $clave_encriptada
            );
		$this->db->where('usuario_id', $usuario_id);
		return $this->db->update('usuarios', $data); 
	}
}