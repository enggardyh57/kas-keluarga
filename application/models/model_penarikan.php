<?php
class model_penarikan extends CI_Model
{
    public function tambah_penarikan()
    {
        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'nominal' => $this->input->post('nominal'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->insert('penarikan_atm', $data);
    }
}
