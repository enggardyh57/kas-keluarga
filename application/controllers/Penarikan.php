<?php

class Penarikan extends CI_Controller
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
        $data['penarikan'] = $this->model_penarikan->getAllPenarikan();
        $this->load->view('templates/header');
        $this->load->view('user/penarikan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $data['penarikan'] = $this->model_penarikan->getAllPenarikan();
            $this->load->view('templates/header');
            $this->load->view('user/penarikan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->model_penarikan->tambah_penarikan();
            $this->session->set_flashdata('pesan', 'Penarikan berhasil dicatat');
            redirect('penarikan');
        }
    }

    public function hapus($id)
    {
        $this->model_penarikan->hapus_penarikan($id);
        $this->session->set_flashdata('pesan', 'Penarikan berhasil dihapus');
        redirect('penarikan');
    }

    public function edit($id)
    {
        $data['penarikan'] = $this->model_penarikan->getAllPenarikan();
        $data['edit'] = $this->model_penarikan->getPenarikanById($id);

        $this->load->view('templates/header');
        $this->load->view('user/penarikan', $data);
        $this->load->view('templates/footer');
    }
    public function update($id)
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $data['penarikan'] = $this->model_penarikan->getAllPenarikan();
            $data['edit'] = $this->model_penarikan->getPenarikanById($id);

            $this->load->view('templates/header');
            $this->load->view('user/penarikan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->model_penarikan->update_penarikan($id);

            $this->session->set_flashdata(
                'pesan',
                'Penarikan berhasil diperbarui'
            );

            redirect('penarikan');
        }
    }
}
