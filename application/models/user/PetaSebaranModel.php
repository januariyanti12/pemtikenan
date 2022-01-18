<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PetaSebaranModel extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        return $this->db->get()->result();
    }

    public function get_peta()
    {
        $sql = $this->db->select('*')
            ->from('penduduk as p')
            ->join('jenis_kb as b', 'p.id_jenis_kb=b.id_jenis_kb')
            ->join('jenis_rt as c', 'p.id_jenis_rt=c.id_jenis_rt')
            ->join('jenis_ks as d', 'p.id_jenis_ks=d.id_jenis_ks')
            ->join('lokasi as l', 'p.id_lokasi=l.id_lokasi')
            ->get();
        return $sql;
    }
}
