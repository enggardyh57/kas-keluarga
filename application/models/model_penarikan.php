<?php
class model_penarikan extends CI_Model
{
    public function getAllPenarikan()
    {
        $user_id = $this->session->userdata('id');
        return $this->db
            ->where('user_id',$user_id)
            ->order_by('tanggal', 'DESC')
            ->order_by('id', 'DESC')
            ->get('penarikan_atm')
            ->result_array();
    }
    public function tambah_penarikan()
    {
        $data = [
            'user_id' => $this->session->userdata('id'),
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
        return $this->db->get_where('penarikan_atm', ['id' => $id])->row_array();
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
