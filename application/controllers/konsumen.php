<?php
defined('BASEPATH') or exit('No direct script access allowed');


class konsumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelKonsumen');
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Customer';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kode_konsumen'] = $this->ModelKonsumen->generate_kode_konsumen();
        $data['data'] = $this->ModelKonsumen->getAllDataKonsumen()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('templates_admin/topbar', $data);
            $this->load->view('konsumen/index', $data);
            $this->load->view('templates_admin/footer');
        } else {
            // menampung inputan yg ada di tambah data di masukan ke variabel data
            $data = array(
                'kode_konsumen'     => $this->input->post('kode_konsumen', true),
                'nama_konsumen'     => $this->input->post('nama_konsumen', true),
                'alamat_konsumen'   => $this->input->post('alamat_konsumen', true),
                'no_telp'           => $this->input->post('no_telp', true)
            );
            // lalu di masukan ke tabel konsumen
            $query = $this->db->insert('konsumen', $data);
            // kondisi jika variabel query sama dengan true maka akan muncul alert
            if ($query = true) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Customer Berhasil di Tambahkan!!! </div>');
                redirect('konsumen');
            }
        }
    }
}
