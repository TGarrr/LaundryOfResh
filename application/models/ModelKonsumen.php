<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKonsumen extends CI_Model
{
    public function generate_kode_konsumen()
    {
        // Memilih 3 digit terakhir dari field 'kode_konsumen' sebagai 'kode'
        $this->db->select('RIGHT(konsumen.kode_konsumen,3) as kode');
        // Mengurutkan berdasarkan 'kode_konsumen' secara descending (tertinggi ke terendah)
        $this->db->order_by('kode_konsumen', 'desc');
        // Mengambil hanya satu baris hasil query
        $this->db->limit(1);
        // membuat variabel query 
        $query = $this->db->get('konsumen');
        // melakukan pengecekan/kondisi apakah hasilnya lebih dri 0
        if ($query->num_rows() > 0) {
            $data = $query->row();
            // Ambil nilai 'kode' dari data dan tambahkan 1
            $kode = intval($data->kode) + 1;
        } else {
            // Jika tidak ada hasil, set kode menjadi 1
            $kode = 1;
        }

        // Menghasilkan string 3 digit dengan padding '0' di depan jika kurang dari 3 digit
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        // Menggabungkan string "K" dengan kode yang sudah di-generate
        $kodejadi = "K" . $kodemax;

        return $kodejadi;
    }

    // memanggil semua data Customer
    public function getAllDatakonsumen()
    {
        return $this->db->get('konsumen');
    }

    public function KonsumenWhere($where)
    {
        return $this->db->get_where('konsumen', $where);
    }

    public function simpanKonsumen($data = null)
    {
        $this->db->insert('konsumen', $data);
    }

    public function updateKonsumen($data = null, $where = null)
    {
        $this->db->update('konsumen', $data, $where);
    }

    public function hapusKonsumen($where = null)
    {
        $this->db->delete('konsumen', $where);
    }
}
