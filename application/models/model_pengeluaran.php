<?php
class model_pengeluaran extends CI_Model
{
    public function getAllpengeluaran()
    {
        return $this->db
            ->order_by('tanggal', 'DESC')
            ->order_by('id', 'DESC')
            ->get('pengeluaran')
            ->result_array();
    }
    public function tambah_pengeluaran()
    {
        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'nominal' => $this->input->post('nominal'),
            'kategori' => $this->input->post('kategori'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->insert('pengeluaran', $data);
    }

    public function hapus_pengeluaran($id)
    {
        $this->db->delete('pengeluaran', ['id' => $id]);
    }

    public function getpengeluaranById($id)
    {
        return $this->db->get_where('pengeluaran', ['id' => $id])->row_array();
    }

    public function update_pengeluaran($id)
    {
        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'nominal' => $this->input->post('nominal'),
            'kategori' => $this->input->post('kategori'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('id', $id);
        $this->db->update('pengeluaran', $data);
    }
}
