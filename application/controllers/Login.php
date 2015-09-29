<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('user_model');
    }

    public function registration()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $ci = &get_instance();
        $header_js = $ci->config->item('css');
        $str = '';
        foreach ($header_js as $key => $val) {
            $str .= '<link rel="stylesheet" href="' . base_url() . 'css/' . $val . '" type="text/css" />' . "\n";
        }
        $data['css'] = $str;
        $data['title'] = 'Registration';
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('name', 'Username', 'required|min_length[5]|max_length[15]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('address', 'Address', 'required|min_length[10]|max_length[50]');
        $this->form_validation->set_rules('gender', 'gender', 'required|min_length[4]|max_length[6]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            // $this->load->view('templates/footer');
        } else {
            $savedata = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('mobile'),
                'address' => $this->input->post('address'),
                'gender' => $this->input->post('gender')
            );
            $this->load->view('templates/login_header', $data);
            $this->user_model->saveRegisterData($savedata);
            $this->load->view('news/success', $data);
        }
    }

    public function Login()
    {
        die("heree");
    }
}