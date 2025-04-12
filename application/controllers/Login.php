<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Login";
		$data['content'] = $this->load->view('login', [], true);
		$this->load->view('main', $data);
	}
}
