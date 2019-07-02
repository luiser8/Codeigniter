<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    function Add($task)
    {
        $this->db->insert('task', $task);
    }
    
    public function All()
    {
        $query = $this->db->get('task');
        return $query->result_array();
    }

    function Exists($task)
    {
        $is_unique;
        $query = $this->db->where('nombre', $task)->get('task');
        if($query->num_rows() > 0){
            return $is_unique = false;
        }else{
            return $is_unique = true;
        }
        return $is_unique;       
    }

    public function Find($id)
    {
        $query = $this->db->where('id_task', $id)->get('task');
        return $query->row_array();
    }
    
    public function Update($task)
    {
        $id = $task['id_task'];
        $this->db->where('id_task', $id);
        unset($task['id_task']);
        $this->db->update('task', $task);
    }
    
    public function Delete($id)
    {
        $this->db->where('id_task', $id);
        $this->db->delete('task');
    }
}
