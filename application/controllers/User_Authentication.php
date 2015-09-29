<?php
// Start session
session_start();

class User_Authentication extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->load->helper('url');
        //For load css from config file
        $ci = &get_instance();
        $header_js  = $ci->config->item('css');
        // Include two files from google-php-client library in controller
        require_once APPPATH . "libraries/google-api-php-client-master/src/Google/autoload.php";
        require_once APPPATH . "libraries/google-api-php-client-master/src/Google/Client.php";
        require_once APPPATH . "libraries/google-api-php-client-master/src/Google/Service/Oauth2.php";
        
        // Store values in variables from project created in Google Developer Console
        $client_id = '180391628117-hf4di0a3l0aaq10c6h933n97p4e1lb2m.apps.googleusercontent.com';
        $client_secret = 'Eg_i_sihLL5E5FMGTnyKSVXK';
        $redirect_uri = 'http://citest.local.com/index.php/login';
        $simple_api_key = 'AIzaSyCSS5nGOzy7OcuSvSMwblVRRPZ9_TFIDnM';
        
        // Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("PHP Google OAuth Login Example");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->setDeveloperKey($simple_api_key);
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");
       
        // Send Client Request
        $objOAuthService = new Google_Service_Oauth2($client);
        
        // Add Access Token to Session
        if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }
        
        // Set Access Token to make Request
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
        }
        // Get User Data from Google and store them in $data
        if ($client->getAccessToken()) {
            $userData = $objOAuthService->userinfo->get();
            //Save google login user data in database
            $saveData = array(
            	'name' => $userData['name'],
                'email' => $userData['email'],
                'gender' => $userData['gender'],
            );
            
            $this->user_model->saveUserData($saveData);
            
            $data['userData'] = $userData;
            $_SESSION['access_token'] = $client->getAccessToken();
        } else {
            $authUrl = $client->createAuthUrl();
            $data['authUrl'] = $authUrl;
        }
       //Load css file added in config file
        $str = '';
        foreach ($header_js as $key => $val)
        {
            $str .= '<link rel="stylesheet" href="'.base_url().'css/'.$val.'" type="text/css" />'."\n";
        }
        $data['css'] = $str;
        // Load view and send values stored in $data
        $this->load->view('google_authentication', $data);
    }
    
    // Unset session and logout
    public function logout()
    {
        $this->load->helper('url');
        unset($_SESSION['access_token']);
        redirect(base_url());
    }
}
?>