<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LapdataModel extends CI_Model
{
    function get_data()
    {
        $data = $this->db->select('*, lokasi.nama_penduduk as n_nama, jenis_kb.nama_kb as n_nama_kb, jenis_ks.nama_ks as n_nama_ks, jenis_rt.rt_rw as n_rt_rw')
            ->from('penduduk')
            ->join('jenis_kb', 'jenis_kb.id_jenis_kb = penduduk.id_jenis_kb')
            ->join('jenis_ks', 'jenis_ks.id_jenis_ks = penduduk.id_jenis_ks')
            ->join('jenis_rt', 'jenis_rt.id_jenis_rt = penduduk.id_jenis_rt')
            ->join('lokasi', 'lokasi.id_lokasi = penduduk.id_lokasi')
            ->get();
        return $data;
    }
    function get()
    {
        $data = $this->db->get('penduduk');
        return $data;
    }
}
