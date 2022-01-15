<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KesejahteraanModel extends CI_Model
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
	function insert($data = array())
	{
		$this->db->insert('penduduk', $data);
		$info = '<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses Ditambah </div>';
		$this->session->set_flashdata('info', $info);
	}
	function update($data = array(), $where = array())
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->update('penduduk', $data);
		$info = '<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses diubah </div>';
		$this->session->set_flashdata('info', $info);
	}
	function delete($where = array())
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->delete('penduduk');
		$info = '<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses dihapus </div>';
		$this->session->set_flashdata('info', $info);
	}
}
