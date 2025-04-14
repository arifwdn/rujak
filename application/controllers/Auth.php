<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('dashboard');
		}
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run() == false) {
			$data['title'] = "Login";
			$data['content'] = $this->load->view('login', [], true);
			$this->load->view('main', $data);
		} else {
			$this->_login();
		}
	}
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data_login = $this->db->get_where('user', 'username="' . $username . '"')->row_array();
		if (!$data_login) {
			$this->session->set_tempdata('login_message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Login Failed!</strong> Username not found.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>', 3);
			redirect('auth');
		}
		if (!password_verify($password, $data_login['password'])) {
			$this->session->set_tempdata('login_message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Login Failed!</strong> Wrong password.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>', 3);
			redirect('auth');
		}
		$this->session->set_userdata(['username' => $username, 'logged_in' => date('YmdHi')]);
		redirect('dashboard');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_tempdata('login_message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>You are logged out!</strong> Thanks.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>', 3);
		redirect('auth');
	}
}
