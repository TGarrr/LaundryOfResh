<?php
defined('BASEPATH') or exit('No direct script access allowed');


class m_login extends CI_Model
{
    public function proses_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query =  $this->db->get('user');

        // membuat Kondisi
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $sess = array(
                    'id_user' => $row->id_user,
                    'username' => $row->username,
                    'password' => $row->password
                );
                // kita simpan variable $sess kedalam session
                $this->session->set_userdata($sess);
            }
            // jika berhasil kita arahkan ke COntroller Dashboard
            redirect('dashboard');

            // jika Gagal Maka Dia akan Muncul Alert
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Username atau Password salah Silakan Coba Lagi!!</div>');
            redirect('auth');
        }
    }
}
