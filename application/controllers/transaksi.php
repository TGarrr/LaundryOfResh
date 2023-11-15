<?php
defined('BASEPATH') or exit('No direct script access allowed');


class transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Form Transaksi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['konsumen'] = $this->db->get('konsumen')->result();
        $data['paket'] = $this->db->get('paket')->result();
        $data['kode_transaksi'] = $this->ModelTransaksi->generateKode();
        // var_dump($data['konsumen']);



        $this->form_validation->set_rules('berat', 'berat', 'required', [
            'required' => 'berat harus diisi',
        ]);
        $this->form_validation->set_rules('status', 'Status Bayar', 'required', [
            'required' => 'Status Bayar harus diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('templates_admin/topbar', $data);
            $this->load->view('transaksi/index', $data);
            $this->load->view('templates_admin/footer');
        } else {
            // menampung inputan yg ada di tambah data di masukan ke variabel data
            $data = array(
                'kode_transaksi'     => $this->input->post('kode_transaksi'),
                'kode_konsumen'      => $this->input->post('kode_konsumen'),
                'kode_paket'         => $this->input->post('kode_paket'),
                'tgl_masuk'          => $this->input->post('tgl_masuk'),
                'tgl_ambil'          => '',
                'berat'              => $this->input->post('berat'),
                'grand_total'        => $this->input->post('grand_total'),
                'bayar'              => $this->input->post('bayar'),
                'status'             => $this->input->post('status')
            );
            // lalu di masukan ke tabel transaksi
            $query = $this->ModelTransaksi->simpanTransaksi($data);
            // kondisi jika variabel query sama dengan true maka akan muncul alert
            if ($query = true) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Transaksi Berhasil di Tambahkan!!! </div>');
                redirect('transaksi');
            }
        }
    }

    public function getHargaPaket()
    {
        $kode_paket = $this->input->post('kode_paket');
        $data = $this->ModelTransaksi->getHargaPaket($kode_paket);
        echo json_encode($data);
    }
}
