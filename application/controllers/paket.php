<?php
defined('BASEPATH') or exit('No direct script access allowed');


class paket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Form Tambah Paket';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kode_paket'] = $this->ModelPaket->generate_kode_paket();
        $data['data'] = $this->ModelPaket->getAllDataPaket()->result_array();

        $this->form_validation->set_rules('kode_paket', 'Kode Paket', 'required', [
            'required' => 'Kode Paket harus diisi',
        ]);
        $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required', [
            'required' => 'Nama Paket harus diisi',
        ]);
        $this->form_validation->set_rules('harga_paket', 'Harga', 'required', [
            'required' => 'Harga harus diisi',

        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('templates_admin/topbar', $data);
            $this->load->view('paket/index', $data);
            $this->load->view('templates_admin/footer');
        } else {
            // menampung inputan yg ada di tambah data di masukan ke variabel data
            $data = array(
                'kode_paket'     => $this->input->post('kode_paket'),
                'nama_paket'     => $this->input->post('nama_paket'),
                'harga_paket'   => $this->input->post('harga_paket')
            );
            // lalu di masukan ke tabel Paket
            $query = $this->ModelPaket->simpanPaket($data);
            // kondisi jika variabel query sama dengan true maka akan muncul alert
            if ($query = true) {
                $this->session->set_flashdata('pesanPkt', '<div class="alert alert-success alert-message" role="alert">Data Paket Berhasil di Tambahkan!!! </div>');
                redirect('paket');
            }
        }
    }

    public function hapusPaket()
    {
        $where = ['kode_paket' => $this->uri->segment(3)];
        $this->ModelPaket->hapusPaket($where);
        $this->session->set_flashdata('pesanPkt', '<div class="alert alert-success alert-message" role="alert">Data Paket Berhasil di Hapus!!! </div>');
        redirect('paket');
    }


    public function updatePaket()
    {
        $data['judul'] = 'Ubah Data Paket';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kode_paket'] = $this->ModelPaket->generate_kode_paket();
        $data['paket'] = $this->ModelPaket->PaketWhere(['kode_Paket' => $this->uri->segment(3)])->result_array();


        $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required', [
            'required' => 'Nama Paket harus diisi',
        ]);
        $this->form_validation->set_rules('harga_paket', 'Harga', 'required', [
            'required' => 'Harga harus diisi',

        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('templates_admin/topbar', $data);
            $this->load->view('paket/ubahPaket', $data);
            $this->load->view('templates_admin/footer');
        } else {
            // menampung inputan yg ada di tambah data di masukan ke variabel data
            $data = [
                'kode_paket'     => $this->input->post('kode_paket'),
                'nama_paket'     => $this->input->post('nama_paket'),
                'harga_paket'   => $this->input->post('harga_paket')
            ];
            // lalu di masukan ke tabel Paket
            $query = $this->ModelPaket->updatePaket($data, ['kode_paket' => $this->input->post('kode_paket')]);
            // kondisi jika variabel query sama dengan true maka akan muncul alert
            if ($query = true) {
                $this->session->set_flashdata('pesanPkt', '<div class="alert alert-success alert-message" role="alert">Data Paket Berhasil di Update!!! </div>');
                redirect('Paket');
            }
        }
    }
}
