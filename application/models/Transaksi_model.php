<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public $id_transaksi;
    public $id_customer;
    public $tanggal;
    public $total_pendapatan;
    public $sudah_diambil;
    public $pengambil;
    public $detail_transaksi = [];

    public function insert_transaksi()
    {
        $this->db->trans_start();
        $this->db->insert('transaksi', [
            'id_customer' => $this->id_customer,
            'tanggal' => $this->tanggal,
            'total_pendapatan' => $this->total_pendapatan
        ]);
        $id_transaksi = $this->db->insert_id();

        for ($i = 0; $i < count($this->detail_transaksi); $i++) {
            $this->db->insert('detail_transaksi', [
                'id_transaksi' => $id_transaksi,
                'id_barang' => $this->detail_transaksi[$i]['id_barang'],
                'quantity' => $this->detail_transaksi[$i]['qty'],
                'total' => $this->detail_transaksi[$i]['total']
            ]);
            $data = $this->db->get_where('barang', 'id_barang=' . $this->detail_transaksi[$i]['id_barang'])->row_array();

            $this->db->update('barang', ['stok' => (int)$data['stok'] - (int)$this->detail_transaksi[$i]['qty']], 'id_barang=' . $data['id_barang']);
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function getTransaksi()
    {
        $query = 'SELECT id_transaksi, tanggal, customer.nama as nama, customer.lokasi as lokasi, sudah_diambil  FROM transaksi, customer WHERE transaksi.id_customer = customer.id_customer ORDER BY tanggal DESC';
        $data = $this->db->query($query)->result_array();
        return $data;
    }

    public function getDetailTransaksi()
    {
        $query = 'SELECT *, customer.nama as nama, customer.no_hp as no_hp, customer.lokasi as lokasi, 
        barang.nama_barang as nama_barang, barang.harga as harga,
        detail_transaksi.quantity as quantity, detail_transaksi.jumlah_terjual as terjual, 
        detail_transaksi.sisa as sisa, detail_transaksi.total as total
        FROM transaksi, detail_transaksi, customer, barang
        WHERE transaksi.id_transaksi = detail_transaksi.id_transaksi 
        AND transaksi.id_customer = customer.id_customer 
        AND detail_transaksi.id_barang = barang.id_barang
        AND transaksi.id_transaksi = ' . $this->id_transaksi;
        $transaksi_detail = $this->db->query($query)->result_array();
        return $transaksi_detail;
    }

    public function confirmTransaksi()
    {
        $this->db->trans_start();
        $this->db->update('transaksi', [
            'total_pendapatan' => $this->total_pendapatan,
            'sudah_diambil' => date('Y-m-d\TH:i:s'),
            'pengambil' => $this->pengambil
        ], 'id_transaksi=' . $this->id_transaksi);

        for ($i = 0; $i < count($this->detail_transaksi); $i++) {
            $this->db->update('detail_transaksi', [
                'total' => $this->detail_transaksi[$i]['total'],
                'jumlah_terjual' => $this->detail_transaksi[$i]['terjual'],
                'sisa' => $this->detail_transaksi[$i]['sisa']
            ], 'id_detail_transaksi=' . $this->detail_transaksi[$i]['id_detail_transaksi']);
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function deleteTransaksi()
    {
        $this->db->delete('transaksi', 'id_transaksi=' . $this->id_transaksi);
        return true;
    }

    public function buatDashboard()
    {
        $query = 'SELECT id_transaksi, tanggal, customer.nama as nama, customer.lokasi as lokasi, sudah_diambil  FROM transaksi, customer WHERE transaksi.id_customer = customer.id_customer AND tanggal="' . date('Y-m-d') . '" ORDER BY tanggal DESC';
        $data_hari_ini = $this->db->query($query)->result_array();
        $total_transaksi = $this->db->count_all('transaksi');
        $total_sudah = count($this->db->get_where('transaksi', 'tanggal="' . date('Y-m-d') . '" AND sudah_diambil IS NOT null')->result_array());
        $total_belum = count($this->db->get_where('transaksi', 'tanggal="' . date('Y-m-d') . '" AND sudah_diambil IS null')->result_array());

        return [
            'transaksi' => $data_hari_ini,
            'total_transaksi' => $total_transaksi,
            'total_sudah_diambil' => $total_sudah,
            'total_belum_diambil' => $total_belum
        ];
    }
}
