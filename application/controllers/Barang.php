<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Barang_model', 'barang');
    }

    public function index()
    {
        $data['title'] = "Barang";
        $data['barang'] = $this->barang->getBarang();
        $data['navbar'] = $this->load->view('navbar', $data, true);
        $data['content'] = $this->load->view('barang', $data, true);
        $this->load->view('main', $data);
    }

    public function add_barang()
    {
        $data['title'] = "Barang";
        $data['barang'] = [];
        $data['navbar'] = $this->load->view('navbar', $data, true);
        $data['content'] = $this->load->view('form_barang', $data, true);
        $this->load->view('main', $data);
    }

    public function proses_add_barang()
    {
        $this->barang->nama_barang = $this->input->post('nama_barang');
        $this->barang->harga = $this->input->post('harga');
        $this->barang->stok = $this->input->post('stok');
        $this->barang->satuan = $this->input->post('satuan');
        $save = $this->barang->insert_barang();
        if ($save) {
            $this->session->set_tempdata('barang_message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Add Data Success!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>', 3);
            redirect('barang');
        }
    }

    public function edit_barang($id_barang)
    {
        $data['title'] = "Barang";
        $this->barang->id_barang = $id_barang;
        $data['barang'] = $this->barang->getDetailBarang();
        $data['navbar'] = $this->load->view('navbar', $data, true);
        $data['content'] = $this->load->view('form_barang', $data, true);
        $this->load->view('main', $data);
    }

    public function proses_edit_barang()
    {
        $this->barang->id_barang = $this->input->post('id_barang');
        $this->barang->nama_barang = $this->input->post('nama_barang');
        $this->barang->harga = $this->input->post('harga');
        $this->barang->stok = $this->input->post('stok');
        $this->barang->satuan = $this->input->post('satuan');
        $save = $this->barang->update_barang();
        if ($save) {
            $this->session->set_tempdata('barang_message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Edit Data Success!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>', 3);
            redirect('barang');
        }
    }

    public function delete_barang($id_barang)
    {
        $this->barang->id_barang = $id_barang;
        $delete = $this->barang->deleteBarang();
        if ($delete) {
            $this->session->set_tempdata('barang_message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Delete Data Success!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>', 3);
            redirect('barang');
        }
    }
}
