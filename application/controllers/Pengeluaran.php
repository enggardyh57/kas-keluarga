<?php

class Pengeluaran extends CI_Controller
{
    public function index()
    {
        $data['pengeluaran'] = $this->model_pengeluaran->getAllpengeluaran();
        $this->load->view('templates/header');
        $this->load->view('user/pengeluaran', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'kategori' => $this->input->post('kategori'),
            'nominal' => $this->input->post('nominal'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        if ($this->form_validation->run() == false) {
            $data['pengeluaran'] = $this->model_pengeluaran->getAllpengeluaran();
            $this->load->view('templates/header');
            $this->load->view('user/pengeluaran', $data);
            $this->load->view('templates/footer');
        } else {
            $this->model_pengeluaran->tambah_pengeluaran();
            $this->session->set_flashdata('pesan', 'pengeluaran berhasil dicatat');
            redirect('pengeluaran');
        }
    }

    public function hapus($id)
    {
        $this->model_pengeluaran->hapus_pengeluaran($id);
        $this->session->set_flashdata('pesan', 'pengeluaran berhasil dihapus');
        redirect('pengeluaran');
    }

    public function edit($id)
    {
        $data['pengeluaran'] = $this->model_pengeluaran->getAllpengeluaran();
        $data['edit'] = $this->model_pengeluaran->getpengeluaranById($id);

        $this->load->view('templates/header');
        $this->load->view('user/pengeluaran', $data);
        $this->load->view('templates/footer');
    }
    public function update($id)
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $data['pengeluaran'] = $this->model_pengeluaran->getAllpengeluaran();
            $data['edit'] = $this->model_pengeluaran->getpengeluaranById($id);

            $this->load->view('templates/header');
            $this->load->view('user/pengeluaran', $data);
            $this->load->view('templates/footer');
        } else {
            $this->model_pengeluaran->update_pengeluaran($id);

            $this->session->set_flashdata(
                'pesan',
                'pengeluaran berhasil diperbarui'
            );

            redirect('pengeluaran');
        }
    }
}
