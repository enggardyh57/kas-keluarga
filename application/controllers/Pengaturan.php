<?php

class Pengaturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata(
                'pesan-login',
                'Anda harus login!'
            );
            redirect('auth');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'saldo_atm',
            'Saldo ATM Awal',
            'required'
        );

        $this->form_validation->set_rules(
            'saldo_tunai',
            'Saldo Tunai Awal',
            'required'
        );

        $data['pengaturan'] = $this->model_pengaturan->getPengaturan();

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header');
            $this->load->view('user/pengaturan', $data);
            $this->load->view('templates/footer');
        } else {

            $this->model_pengaturan->tambah_pengaturan();

            $this->session->set_flashdata(
                'pesan',
                'Pengaturan berhasil disimpan'
            );

            redirect('pengaturan');
        }
    }
}
