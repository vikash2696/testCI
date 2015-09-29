<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
        }

        public function index()
        {
                $data['news'] = $this->news_model->get_news();
                $data['title'] = 'News archive';
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
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                $data['news_item'] = $this->news_model->get_news($slug);
                
                if (empty($data['news_item']))
                {
                    show_404(); 
                }
                
                $data['title'] = $data['news_item']['title'];
                
                $this->load->view('templates/header', $data);
                $this->load->view('news/view', $data);
                $this->load->view('templates/footer');
        }
        public function create()
        {
            $this->load->helper('url');
            $ci = &get_instance();
            $header_js  = $ci->config->item('css');
            $this->load->helper('form');
            $this->load->library('form_validation');
        
            $data['title'] = 'Create a news item';
        
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'text', 'required');
            $str = '';
            foreach ($header_js as $key => $val)
            {
                $str .= '<link rel="stylesheet" href="'.base_url().'css/'.$val.'" type="text/css" />'."\n";
            }
            $data['css'] = $str;
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('news/create');
                $this->load->view('templates/footer');
            }
            else
            {
                $this->news_model->set_news();
                $this->load->view('news/success');
            }
        }
}