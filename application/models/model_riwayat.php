<?php


class model_riwayat extends CI_Model
{
    public function getRiwayat($keyword = '', $kategori = '', $bulan = '')
    {
        $user_id = $this->session->userdata('id');
        $keyword = $keyword !== null ? (string) $keyword : ''; 
        $kategori = $kategori !== null ? (string) $kategori : ''; 
        $bulan = $bulan !== null ? (string) $bulan : ''; 

        $penarikan = $this->db
            ->where('user_id', $user_id)
            ->get('penarikan_atm')
            ->result_array();

        $pengeluaran = $this->db
            ->where('user_id', $user_id)
            ->get('pengeluaran')
            ->result_array();

        $riwayat = [];

        foreach ($penarikan as $item) {

            $riwayat[] = [
                'tanggal'    => $item['tanggal'],
                'jenis'      => 'Penarikan',
                'kategori'   => '-',
                'keterangan' => $item['keterangan'],
                'nominal'    => $item['nominal']
            ];
        }

        foreach ($pengeluaran as $item) {

            $riwayat[] = [
                'tanggal'    => $item['tanggal'],
                'jenis'      => 'Pengeluaran',
                'kategori'   => $item['kategori'],
                'keterangan' => $item['keterangan'],
                'nominal'    => $item['nominal']
            ];
        }

        if ($keyword !== '' && $keyword !== null) { // GANTI

            $keyword = (string) $keyword; // TAMBAH

            $riwayat = array_filter($riwayat, function ($item) use ($keyword) {
                return stripos((string) $item['keterangan'], $keyword) !== false; // GANTI
            });
        }

        if ($kategori !== '') {

            $riwayat = array_filter($riwayat, function ($item) use ($kategori) {
                return $item['kategori'] === $kategori;
            });
        }

        if ($bulan !== '') {

            $riwayat = array_filter($riwayat, function ($item) use ($bulan) {
                return (int) date('n', strtotime($item['tanggal'])) === (int) $bulan;
            });
        }

        usort($riwayat, function ($a, $b) {
            return strtotime($b['tanggal']) - strtotime($a['tanggal']);
        });

        return array_values($riwayat);
    }
}
