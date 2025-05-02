<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $this->load->model('Transaksi_model', 'transaksi');
        $data['title'] = "Dashboard";
        $data['transaksi'] = $this->transaksi->buatDashboard();
        $data['navbar'] = $this->load->view('navbar', $data, true);
        $data['content'] = $this->load->view('dashboard', [], true);
        $this->load->view('main', $data);
    }
}
