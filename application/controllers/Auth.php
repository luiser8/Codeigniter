<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url','form','email');
        $this->load->library('session');
        $this->load->model('User');
        $this->load->model('Level');
    }

	// private function verify_admin_level(){
 //        if($this->session->userdata("islogin") === true){}
 //    }

	public function index()
	{
		if($this->session->userdata("islogin") === true){
            redirect(base_url('Dashboard'));
        }else{
        	$this->load->view('Auth/index');
        }
	}

	public function signin()
	{
		if($this->session->userdata("islogin") === true){
            redirect(base_url('Dashboard'));
        }else{
        	$this->load->view('Auth/signin', ['Levels'=> $levels = $this->Level->All()]);
        }
	}

	public function create()
    {
		// $this->form_validation->set_rules('password', 'current password', 'max_length[25]|min_length[5]|required');
		// $this->form_validation->set_rules('new_password', 'new password', 'max_length[25]|min_length[5]|required|differs[password]');
		// $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|max_length[25]|min_length[5]|matches[new_password]');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_level', 'Level', 'trim|required', array('matches' => 'Debes seleccionar un nivel'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', 
			array('matches' => 'Debes colocar una cuenta de correo', 
					'is_unique' => 'Ya esta registrado este email', 
					'valid_email'=> 'Email invalido'));
		$this->form_validation->set_rules('account', 'Account', 'trim|required|is_unique[users.account]', 
			array('matches' => 'Debes colocar una contraseña'));
		$this->form_validation->set_rules('pass', 'Password', 'max_length[25]|min_length[5]|trim|required', 
			array('matches' => 'Debes colocar la confirmacion de contraseña'));
		$this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'trim|required|max_length[25]|min_length[5]|matches[pass]', 
			array('required' => 'Debes colocar la confirmacion de contraseña', 
					'matches' => 'No coinciden las contraseñas'));
        
		if($this->form_validation->run() == False){
			$this->load->view('Auth/signin', ['Levels'=> $levels = $this->Level->All()]);
		}else{
			if(!empty($_POST)){
	            $_POST['pass'] = md5($_POST['pass']);
	            $_POST['confirm_pass'] = md5($_POST['confirm_pass']);
	            $this->User->Add($_POST);
	            redirect(base_url('Auth'));
	        }
		}
       //$this->load->view('Auth/signin');
    }

	public function login()
	{
		if($this->session->userdata("islogin") === true){
            redirect(base_url('Dashboard'));
        }else{
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
	}

	public function logout()
	{
      $usuario_data = array(
         'islogin' => FALSE
      );
      $this->session->set_userdata($usuario_data);
      $this->session->sess_destroy();
      //$this->Auditoria->Add($auditoria = array('id_user'=>$_SESSION['user'], 'tabla'=> 'Users', 'accion'=>'Cerrar sesion', 'ip'=>isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1'));
      redirect(base_url('Auth'), 'refresh');
   }
}
