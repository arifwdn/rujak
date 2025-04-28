<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Customer_model', 'customer');
        $this->load->model('Barang_model', 'barang');
        $this->load->model('Transaksi_model', 'transaksi');
    }

    public function index()
    {
        $data['title'] = "Transaksi";
        $data['transaksi'] = $this->transaksi->getTransaksi();
        $data['navbar'] = $this->load->view('navbar', $data, true);
        $data['content'] = $this->load->view('transaksi', $data, true);
        $this->load->view('main', $data);
    }

    public function add_transaksi()
    {
        $data['title'] = "Transaksi";
        $data['customer'] = $this->customer->getCustomer();
        $data['barang'] = $this->barang->getBarang();
        $data['navbar'] = $this->load->view('navbar', $data, true);
        $data['content'] = $this->load->view('form_transaksi', $data, true);
        $data['script'] = $this->load->view('script_transaksi', [], true);
        $this->load->view('main', $data);
    }

    public function proses_add_transaksi()
    {
        $this->transaksi->id_customer = $this->input->post('id_customer');
        $this->transaksi->tanggal = $this->input->post('tanggal');
        $this->transaksi->total_pendapatan = $this->input->post('total_pendapatan');
        for ($i = 0; $i < count($this->input->post('id_barang')); $i++) {
            $this->transaksi->detail_transaksi[$i] = [
                'id_barang' => $this->input->post('id_barang')[$i],
                'qty' => $this->input->post('qty')[$i],
                'total' => $this->input->post('total')[$i],
            ];
        }

        $save = $this->transaksi->insert_transaksi();
        if ($save) {
            $this->session->set_tempdata('transaksi_message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Add Data Success!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>', 3);
            redirect('transaksi');
        }
    }

    public function delete_transaksi($id_transaksi)
    {
        $this->transaksi->id_transaksi = $id_transaksi;
        $delete = $this->transaksi->deleteTransaksi();
        if ($delete) {
            $this->session->set_tempdata('transaksi_message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Delete Data Success!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>', 3);
            redirect('transaksi');
        }
    }
}
