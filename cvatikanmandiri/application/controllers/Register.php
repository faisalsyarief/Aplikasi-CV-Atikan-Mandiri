<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('muser');
		$this->load->helper('form','url');
	}

	public function index()
	{
		$this->form_validation->set_rules('name','Nama Lengkap','required');
		$this->form_validation->set_rules('email','Email','required|is_unique[user.email]');
		$this->form_validation->set_rules('username','Username','required|alpha_numeric|min_length[5]|max_length[20]|is_unique[user.username]');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric|min_length[8]|max_length[24]');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('login/form_register');
		}else{
			$user_data = array (
				'userid' => $this->muser->getKode(),
				'name' => set_value('name'),
				'email' => set_value('email'),
				'username' => set_value('username'),
				'password' => set_value('password'),
				'alamat' => set_value('alamat'),
				'group' => '2',
				'lastlogin' => date('Y-m-d')
			);
			$this->muser->register($user_data);
			$valid_user = $this->muser->check_credential();
			$this->session->set_userdata('userid',$valid_user->userid);
			$this->session->set_userdata('username',$valid_user->username);
			$this->session->set_userdata('alamat',$valid_user->alamat);
			$this->session->set_userdata('group',$valid_user->group);
			
			switch($valid_user->group){
				case 1 :
				redirect('home'); 
				break;
				case 2 :
				redirect(base_url()); 
				break;
				case 3 :
				redirect('Home/kurir');
				break;
				default: 
				break;
			}
		}
	}

	public function authentication()
	{
		include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
		include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
		
		// Google Project API Credentials
		$clientId = '1093905424350-7l86v9kp2do47tt1af8q4kb0k3tehmp6.apps.googleusercontent.com';
        $clientSecret = 'maD75ZdeEtRnSyEQgsIB_a9N';
        $redirectUrl = 'http://localhost/cvatikanmandiri/index.php/register/authentication';
		
		// Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('cvatikanmandiri');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
            $userData = array (
            	'name' => $userProfile['given_name'] . ' ' . $userProfile['family_name'],
            	'email' => $userProfile['email']
            	);
            $check_user = $this->muser->check_user($userData);
            if($check_user == FALSE){
	            $data['userData'] = $userData;
	            $this->session->set_userdata('userData',$userData);
	            $this->load->view('login/form_register', $data);
	        }else{
            	$this->session->set_userdata('userid',$check_user->userid);
				$this->session->set_userdata('username',$check_user->username);
				$this->session->set_userdata('group',$check_user->group);
				
				switch($check_user->group){
					case 1 :
					redirect('home'); 
					break;
					case 2 :
					redirect('Home/agen'); 
					break;
					default: 
					break;
				}
	        }
        } else {
            $this->load->view('login/form_login');
        }
	}
}