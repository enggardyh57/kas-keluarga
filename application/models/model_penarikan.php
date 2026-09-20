<?php
class model_penarikan extends CI_Model
{
    public function getAllPenarikan()
    {
        return $this->db->get('penarikan_atm')->result_array();
    }
    public function tambah_penarikan()
    {
        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'nominal' => $this->input->post('nominal'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->insert('penarikan_atm', $data);
    }

    public function hapus_penarikan($id)
    {
        $this->db->delete('penarikan_atm', ['id' => $id]);
    }

    public function getPenarikanById($id)
    {
        return $this->db->get_where('penarikan_atm', ['id' => $id])->row_array($id);
    }

    public function update_penarikan($id)
    {
        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'nominal' => $this->input->post('nominal'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('id', $id);
        $this->db->update('penarikan_atm', $data);
    }
}
