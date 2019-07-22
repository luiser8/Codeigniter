<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function Add($user)
    {
        $this->db->insert('users', $user);
    }
    
    public function Exists($user)
    {
        $is_unique;
        $query = $this->db->where('account', $user)->get('users');
        if($query->num_rows() > 0){
            return $is_unique = true;
        }else{
            return $is_unique = false;
        }
        return $is_unique;       
    }

    public function All()
    {
        $query = $this->db->query('SELECT users.*, levels.* 
                                    FROM users
                                        INNER JOIN levels ON users.level = levels.id_level
                                            WHERE users.id_level != 1');
        return $query->result_array();
    }
    
    public function Check($tipo, $user, $pass)
    {
        if($pass === ''){
            $where = array($tipo => $user);
            $query = $this->db->where($where)->get('users');
        }else{
            $where = array($tipo => $user, 'pass' => md5($pass));
            $query = $this->db->where($where)->get('users');
        }
       
        return $query->row_array();
    }

    public function Find($id)
    {
        $query = $this->db->query('SELECT users.*, levels.* 
                                            FROM users
                                                INNER JOIN levels ON users.level = levels.id_level
                                                    WHERE users.id_user ='.$id);
        return $query->row_array();
    }
    
    public function Update($user)
    {
        $id = $user['id_user'];
        $this->db->where('id_user', $id);
        unset($user['id_user']);
        $this->db->update('users', $user);
    }
    
    public function Delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('users');
    }
}