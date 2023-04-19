<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('address');
		$this->load->library('restclient');
		$this->load->library('pagination');
		// $this->load->helper(array('form', 'validation'));
	}

	public function index()	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			//sukses
			$this->_login();
		}
	}

	private function _login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Request Body: dari fungsi service BackEnd
		$login = array (
						"userName" => $username,
						"password" => $password
						);
					//  print_r($login); die();
		$postData = stream_context_create(array(
		'http' => array (
						'method' => 'POST',
						'header' => "accept: application/json\r\n"."Content-Type: application/json\r\n",
						'content' => json_encode($login)
						)));

		$link = $this->restclient->getUser();
        $response = file_get_contents($link, FALSE, $postData);
        $userweb = json_decode($response);
		
		if (!empty($userweb->idUserWeb)) {
			//punya akun
					$data = [
							'username' => $userweb->userName['username']
							];

			$this->session->set_userdata($data);
			redirect('user');
			
		} else {
			$this->session->set_flashdata('message', '<div class="alert 
			alert-danger" role="alert"> username / password salah! </div>');
			redirect('auth');
		}
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">logout sukses!
		</div>');
		redirect('auth');
	}
}
