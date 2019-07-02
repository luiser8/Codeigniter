<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

		if(!$this->verify_admin_level()){
            redirect(base_url('Auth'));
        }
	}

	private function verify_admin_level(){
        return $this->session->userdata("islogin");
    }

	public function index()
	{
		$this->load->view('Dashboard/index');
	}
}
