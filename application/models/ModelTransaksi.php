<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTransaksi extends CI_Model
{
    public function getHargaPaket($kode_paket)
    {
        $this->db->where('kode_paket', $kode_paket);
        return $this->db->get('paket')->row_array();
    }

    public function generateKode()
    {
        $this->db->select('RIGHT(transaksi.kode_transaksi,3) as kode');
        $this->db->order_by('kode_transaksi', 'desc');
        $this->db->limit(1);
        // membuat variabel query 
        $query = $this->db->get('transaksi');
        // melakukan pengecekan/kondisi
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "" . $kodemax;
        return $kodejadi;
    }

    public function TransaksiWhere($where)
    {
        return $this->db->get_where('transaksi', $where);
    }

    // memanggil semua data transaksi
    public function getAllDataTransaksi()
    {
        $this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen');
        $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket');
        return $this->db->get('transaksi');
    }

    public function simpanTransaksi($data = null)
    {
        $this->db->insert('transaksi', $data);
    }

    // public function updateStatus($kode_transaksi = null, $status = null)
    // {

    //     $this->db->update('transaksi', $kode_transaksi, $status);
    // }

    // public function updateStatus($kode_transaksi = null, $status = null)
    // {
    //     if ($kode_transaksi !== null && $status !== null) {
    //         $data = array('status' => $status);

    //         try {
    //             $this->db->where('kode_transaksi', $kode_transaksi);
    //             $this->db->update('transaksi', $data);

    //             if ($this->db->affected_rows() > 0) {
    //                 return true;
    //             } else {
    //                 return 'No rows affected'; // Pesan jika tidak ada baris yang terpengaruh oleh update
    //             }
    //         } catch (Exception $e) {
    //             return $e->getMessage(); // Mengembalikan pesan kesalahan dari query jika terjadi kesalahan
    //         }
    //     } else {
    //         return 'Invalid parameters'; // Pesan jika kode_transaksi atau status null
    //     }
    // }

    public function updateTransaksi($data = null, $where = null)
    {
        $this->db->update('transaksi', $data, $where);
    }

    public function updateStatusTransaksi($data = null, $where = null)
    {
        $this->db->update('transaksi', $data, $where);
    }

    public function detailTransaksi($where)
    {
        $this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen');
        $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket');
        return $this->db->get_where('transaksi', $where);
    }
}
