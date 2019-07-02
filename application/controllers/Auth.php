<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('User');
    }

	private function verify_admin_level(){
        return $this->session->userdata("islogin");
    }

	public function index()
	{
		$this->load->view('Auth/index');
	}

	public function login()
	{
		if($_POST)
		{
			$usuario = $this->User->Check($_POST);
			if($usuario){
				$usuario_data = array(
					'user'=>$usuario['user'],
					'account'=>$usuario['account'],
					'pass'=>$usuario['pass'],
					'first_name'=>$usuario['first_name'],
					'last_name'=>$usuario['last_name'],
					'email'=>$usuario['email'],
					'id_level'=>$usuario['id_level'],
					'islogin' => TRUE
				);
				$this->session->set_userdata($usuario_data);
				//$this->Auditoria->Add($auditoria = array('idusuario'=>$_SESSION['IdUsuario'], 'tabla'=> 'Usuarios', 'accion'=>'Iniciar sesion', 'ip'=>isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1'));
            	redirect(base_url('Dashboard'));
			}else{
				$this->load->view('Auth/index', ['Error'=>'Error! usuario o contraseña invalido. Vuelve a intentar']);
			}				
        }
	}

	public function logout() 
	{
      $usuario_data = array(
         'islogin' => FALSE
      );
      $this->session->set_userdata($usuario_data);
      $this->session->sess_destroy();
      //$this->Auditoria->Add($auditoria = array('id_user'=>$_SESSION['user'], 'tabla'=> 'Users', 'accion'=>'Cerrar sesion', 'ip'=>isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1'));
      redirect(base_url('Auth'));
   }
}
