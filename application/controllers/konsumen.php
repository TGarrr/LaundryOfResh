<?php
defined('BASEPATH') or exit('No direct script access allowed');


class konsumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Konsumen';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kode_konsumen'] = $this->ModelKonsumen->generate_kode_konsumen();
        $data['data'] = $this->ModelKonsumen->getAllDataKonsumen()->result_array();

        // $this->form_validation->set_rules('kode_konsumen', 'Kode Customer', 'required|min_length[3]', [
        //     'required' => 'Kode Barang harus diisi',
        //     'min_length' => 'Kode Barang terlalu pendek'
        // ]);
        $this->form_validation->set_rules('nama_konsumen', 'Nama Customer', 'required', [
            'required' => 'Nama Customer harus diisi',
        ]);
        $this->form_validation->set_rules('alamat_konsumen', 'Alamat', 'required', [
            'required' => 'Alamat harus diisi',

        ]);
        $this->form_validation->set_rules('no_telp', 'Nomor Telp', 'required', [
            'required' => 'Nomor Telp harus diisi',
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('templates_admin/topbar', $data);
            $this->load->view('konsumen/index', $data);
            $this->load->view('templates_admin/footer');
        } else {
            // menampung inputan yg ada di tambah data di masukan ke variabel data
            $data = array(
                'kode_konsumen'     => $this->input->post('kode_konsumen'),
                'nama_konsumen'     => $this->input->post('nama_konsumen'),
                'alamat_konsumen'   => $this->input->post('alamat_konsumen'),
                'no_telp'           => $this->input->post('no_telp')
            );
            // lalu di masukan ke tabel konsumen
            $query = $this->ModelKonsumen->simpanKonsumen($data);
            // kondisi jika variabel query sama dengan true maka akan muncul alert
            if ($query = true) {
                $this->session->set_flashdata('pesanKsn', '<div class="alert alert-success alert-message" role="alert">Data Customer Berhasil di Tambahkan!!! </div>');
                redirect('konsumen');
            }
        }
    }

    public function hapusKonsumen()
    {
        $where = ['id_konsumen' => $this->uri->segment(3)];
        $this->ModelKonsumen->hapusKonsumen($where);
        $this->session->set_flashdata('pesanKsn', '<div class="alert alert-success alert-message" role="alert">Data Customer Berhasil di Hapus!!! </div>');
        redirect('konsumen');
    }


    public function updateKonsumen()
    {
        $data['judul'] = 'Ubah Data Customer';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kode_konsumen'] = $this->ModelKonsumen->generate_kode_konsumen();
        $data['konsumen'] = $this->ModelKonsumen->KonsumenWhere(['id_konsumen' => $this->uri->segment(3)])->result_array();


        $this->form_validation->set_rules('kode_konsumen', 'Kode Customer', 'required', [
            'required' => 'Kode Customer harus diisi'
        ]);
        $this->form_validation->set_rules('nama_konsumen', 'Nama Customer', 'required', [
            'required' => 'Nama Customer harus diisi'
        ]);
        $this->form_validation->set_rules('alamat_konsumen', 'Alamat', 'required', [
            'required' => 'Alamat harus diisi'

        ]);
        $this->form_validation->set_rules('no_telp', 'Nomor Telp', 'required', [
            'required' => 'Nomor Telp harus diisi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('templates_admin/topbar', $data);
            $this->load->view('konsumen/ubahKonsumen', $data);
            $this->load->view('templates_admin/footer');
        } else {
            // menampung inputan yg ada di tambah data di masukan ke variabel data
            $data = [
                'kode_konsumen'     => $this->input->post('kode_konsumen', true),
                'nama_konsumen'     => $this->input->post('nama_konsumen', true),
                'alamat_konsumen'   => $this->input->post('alamat_konsumen', true),
                'no_telp'           => $this->input->post('no_telp')
            ];
            // lalu di masukan ke tabel konsumen
            $query = $this->ModelKonsumen->updateKonsumen($data, ['id_konsumen' => $this->input->post('id_konsumen')]);
            // kondisi jika variabel query sama dengan true maka akan muncul alert
            if ($query = true) {
                $this->session->set_flashdata('pesanKsn', '<div class="alert alert-success alert-message" role="alert">Data Customer Berhasil di Tambahkan!!! </div>');
                redirect('konsumen');
            }
        }


        // $this->ModelKonsumen->updateKonsumen($data, ['kode_konsumen' => $this->input->post('kode_konsumen')]);
        // redirect('konsumen');
    }
}
