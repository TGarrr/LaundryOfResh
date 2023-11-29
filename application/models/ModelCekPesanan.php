<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelCekPesanan extends CI_Model
{
    public function cekPesanan($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen');
        $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket');
        $this->db->where('transaksi.kode_transaksi', $kode_transaksi);
        return $this->db->get()->result();
    }
}
