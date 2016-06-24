<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

Class Auth {

	private $id;
	private $auth = FALSE;
	public $CI;

 	 function __construct()
	{
		$this->CI =& get_instance();	
		if ( $this->CI->session->userdata('auth') )
		{
			$this->id				= $this->CI->session->userdata('usuario_id');
	}
	}
	
/* 	  public function __construct()
    {
        if (!isset($this->CI))
        {
            $this->CI =& get_instance();
        }
        $this->CI->load->database();
    } */
	
	function recuperar_clave( $email = null )
	{
		$usuario = $this->CI->db->get_where('usuarios', array('usuario_correo' => $email))->row();
		if ( count($usuario) > 0 )
		{
			$usuario_token_recuperar_clave = sha1(uniqid(mt_rand(), true));
			$this->CI->db
				->where(array('usuario_correo' => $email))
				->update('usuarios', array('usuario_token_recuperar_clave' => $usuario_token_recuperar_clave));
			$datos = array(
				'usuario_nombre' => $usuario->usuario_nombre,
				'usuario_apellido' => $usuario->usuario_apellido,
				'usuario_rut' => $usuario->usuario_rut,
				'usuario_token_recuperar_clave' => $usuario_token_recuperar_clave
			);
			$this->CI->email->from('soporte@imacomsales.s2.imacom.cl', 'Administración Imacom SALES');
			$this->CI->email->to($usuario->usuario_correo);
			$this->CI->email->subject('Recuperar Contraseña en imacomsales.s2.imacom.cl');
			$plantilla = $this->CI->load->view('mail/recuperar_clave', $datos, true);
			$this->CI->email->message($plantilla);
			$this->CI->email->send();
			return true;			
		}
		else return false;
	}
	
	public function get_id()
	{
		return $this->id;
	}
	
}