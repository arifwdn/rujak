<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $data['title'] = "Transaksi";
        $data['navbar'] = $this->load->view('navbar', $data, true);
        $data['content'] = $this->load->view('transaksi', [], true);
        $this->load->view('main', $data);
    }
}
