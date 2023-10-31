<?php

class Home extends CI_Controller
{

    public function index()
    {
        $this->load->view('frontend/header');
        $this->load->view('frontend/index');
        $this->load->view('frontend/footer');
    }
}
