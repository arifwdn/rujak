<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{

    public $id_barang;
    public $nama_barang;
    public $harga;
    public $stock;
    public $satuan;

    public function insert_barang()
    {
        $barang = [
            'nama_barang' => $this->nama_barang,
            'harga' => $this->harga,
            'stok' => $this->stok,
            'satuan' => $this->satuan
        ];
        $query = $this->db->insert('barang', $barang, true);
        return $query;
    }

    public function getBarang()
    {
        $data = $this->db->get('barang')->result_array();
        return $data;
    }
}
