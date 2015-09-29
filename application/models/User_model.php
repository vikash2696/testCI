<?php
class User_model extends CI_Model
{
    public function __construct()
    {
       $this->load->database();
    }
    
    public function saveUserData($data)
    {
       $this->db->insert('user_details', $data);
    }
    public function saveRegisterData($data)
    {
        $this->db->insert('registration', $data);
    }
}