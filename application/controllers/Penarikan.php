<?php

class Penarikan extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('user/penarikan');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('user/penarikan');
            $this->load->view('templates/footer');
        } else {
            $this->model_penarikan->tambah_penarikan();
            $this->session->set_flashdata('pesan', 'Penarikan berhasil dicatat');
            redirect('penarikan');
        }
    }
}
