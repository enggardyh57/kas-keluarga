<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (! $this->session->userdata('email')) {
            $this->session->set_flashdata(
                'pesan-login',
                'Anda harus login!'
            );
            redirect('auth');
        }
    }
    public function index()
    {

        $this->load->view('templates/header');
        $this->load->view('user/dashboard');
        $this->load->view('templates/footer');
    }
}
