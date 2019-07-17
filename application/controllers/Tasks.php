<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Task');

		if(!$this->verify_admin_level()){
            redirect(base_url('Auth'));
        }
	}

	private function verify_admin_level(){
        return $this->session->userdata("islogin");
    }

	public function index()
	{
		$task = $this->Task->All();
		$this->load->view('Task/index', ['Tasks' => $task]);
	}

	public function create()
    {
        if(!empty($_POST)){
            if($this->Task->Exists($_POST['name'])){
            	$this->Task->Add($_POST);
                //$this->Auditoria->Add($auditoria = array('idusuario'=>$_SESSION['IdUsuario'], 'tabla'=> 'Empresas', 'accion'=>'Crear una empresa', 'ip'=>isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1'));
            }else{
            	$this->load->view('Task/index', ['Error' => 'Registro repetido']);
            }
            redirect(base_url('Task'));
        }
    }

    public function editar()
    {
    	if(!empty($_POST)){
            $this->Task->Update($_POST);
            //$this->Auditoria->Add($auditoria = array('idusuario'=>$_SESSION['IdUsuario'], 'tabla'=> 'Empresas', 'accion'=>'Editar una empresa', 'ip'=>isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1'));
            redirect(base_url('Task'));
        }
    }

    public function eliminar()
    {
    	if(!empty($_POST)){
    		$this->Task->Delete($_POST['id_task']);
            //$this->Auditoria->Add($auditoria = array('idusuario'=>$_SESSION['IdUsuario'], 'tabla'=> 'Empresas', 'accion'=>'Eliminar una empresa', 'ip'=>isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1'));
    	}
    	redirect(base_url('Task'));
    }
}
