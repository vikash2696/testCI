<?php

class Dashboard_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getData($data)
    {
        $newsdata = $this->db->get('news')->result_array();
        $userdata = $this->db->get('registration')->result_array();
        $googleUser = $this->db->get('user_details')->result_array();
        $DashboardData = array(
            'NewsData' => $newsdata,
            'Userdata' => $userdata,
            'GoogleUser' => $googleUser,
        );
        return $DashboardData;
    }
}