<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_anggaran extends CI_Model
{
    private $kategori = [
        'Belanja Rumah',
        'Saku Bintang',
        'Saku Keysia'
    ];

    public function get_saldo_awal($user_id)
    {
        return $this->db
            ->select('saldo_awal_atm, saldo_awal_tunai')
            ->where('user_id', $user_id)
            ->get('settings')
            ->row();
    }

    public function get_target_anggaran($user_id, $kategori, $bulan, $tahun)
    {
        $result = $this->db
            ->select('target_nominal')
            ->where('user_id', $user_id)
            ->where('kategori', $kategori)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->order_by('tahun', 'DESC')
            ->order_by('bulan', 'DESC')
            ->get('anggaran_bulanan')
            ->row();

        return $result ? (float) $result->target_nominal : 0;
    }

    public function get_realisasi($user_id, $kategori, $bulan, $tahun)
    {
        $result = $this->db
            ->select_sum('nominal', 'total')
            ->where('user_id', $user_id)
            ->where('kategori', $kategori)
            ->where('MONTH(tanggal)', $bulan) // TAMBAH
            ->where('YEAR(tanggal)', $tahun)
            ->get('pengeluaran')
            ->row();

        return $result && $result->total !== null
            ? (float) $result->total
            : 0;
    }

    public function get_data_anggaran($user_id, $bulan, $tahun)
    {
        $data = [];

        foreach ($this->kategori as $kategori) {

            $target = $this->get_target_anggaran(
                $user_id,
                $kategori,
                $bulan,
                $tahun
            );

            $realisasi = $this->get_realisasi(
                $user_id,
                $kategori,
                $bulan,
                $tahun
            );

            $persentase = $target > 0
                ? ($realisasi / $target) * 100
                : 0;

            $sisa = $target - $realisasi;

            $data[] = [
                'kategori'   => $kategori,
                'target'     => $target,
                'realisasi'  => $realisasi,
                'persentase' => $persentase,
                'sisa'       => $sisa
            ];
        }

        return $data;
    }
    public function simpan_anggaran($user_id, $kategori, $target, $bulan, $tahun)
    {

        $cek = $this->db
            ->where('user_id', $user_id)
            ->where('kategori', $kategori)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->get('anggaran_bulanan')
            ->row();

        $data = [
            'target_nominal' => $target
        ];

        if ($cek) {

            return $this->db
                ->where('id', $cek->id)
                ->update('anggaran_bulanan', $data);
        } else {

            $data['user_id'] = $user_id;
            $data['kategori'] = $kategori;
            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;

            return $this->db
                ->insert('anggaran_bulanan', $data);
        }
    }
}
