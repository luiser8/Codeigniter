<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('User');
        $this->load->model('Level');
    }

	private function verify_admin_level(){
        return $this->session->userdata("islogin");
    }

	public function index()
	{
		$this->load->view('Auth/index');
	}

	public function signin()
	{
		$levels = $this->Level->All();
		$this->load->view('Auth/signin', ['Levels'=> $levels]);
	}

	public function create()
    {
		// $this->form_validation->set_rules('password', 'current password', 'max_length[25]|min_length[5]|required');
		// $this->form_validation->set_rules('new_password', 'new password', 'max_length[25]|min_length[5]|required|differs[password]');
		// $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|max_length[25]|min_length[5]|matches[new_password]');
		
		$this->form_validation->set_message('pass', 'Password', 'max_length[25]|min_length[5]|required');
		$this->form_validation->set_message('confirm_pass', 'Confirm Password', 'required|max_length[25]|min_length[5]|matches[pass]');
        
        if(!empty($_POST)){
            if($this->form_validation->run() == TRUE){ //$this->User->Exists($_POST['account'])
                var_dump($this->form_validation->run());
                //$_POST['pass'] = md5($_POST['pass']);
            	//$this->User->Add($_POST);       
            }else{
            	$this->load->view('Auth/signin', ['Error' => 'Ya existe una cuenta con este usuario.']);
            }
            //redirect(base_url('Auth'));
        }
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
