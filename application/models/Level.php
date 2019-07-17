<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function All()
    {
        $query = $this->db->get('levels');
        return $query->result_array();
    }
}