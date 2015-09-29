<?php
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
    }

    public function index()
    {
        $this->load->helper('url');
        $ci = &get_instance();
        $header_js  = $ci->config->item('css');
        $str = '';
        foreach ($header_js as $key => $val)
        {
            $str .= '<link rel="stylesheet" href="'.base_url().'css/'.$val.'" type="text/css" />'."\n";
        }
        $data['css'] = $str;
        $this->load->view('templates/login_header', $data);
        $fetchdata = $this->dashboard_model->getData($data);
//         print_r($fetchdata); die;
        $this->load->view('index', $fetchdata);
    }   


}