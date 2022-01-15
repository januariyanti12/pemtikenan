<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kesejahteraan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->logged !== true) {
			redirect('admin/auth');
		}
		if ($this->session->level !== 'Admin') {
			redirect('admin/beranda');
		}
		$this->load->model('KesejahteraanModel', 'Model');
	}

	public function index()
	{
		$datacontent['url'] = 'admin/kesejahteraan';
		$datacontent['title'] = 'Halaman Keluarga Sejahtera';
		$datacontent['datatable'] = $this->Model->get_data();
		$data['content'] = $this->load->view('admin/kesejahteraan/tableView', $datacontent, TRUE);
		$data['title'] = $datacontent['title'];
		$this->load->view('admin/layouts/html', $data);
	}
	public function form($parameter = '', $id = '')
	{
		$datacontent['url'] = 'admin/kesejahteraan';
		$datacontent['parameter'] = $parameter;
		$datacontent['id'] = $id;
		$datacontent['title'] = 'Form Keluarga Sejahtera';
		$datacontent['lokasi'] = $this->db->get('lokasi')->result_array();
		$datacontent['jenis_kb'] = $this->db->get('jenis_kb')->result_array();
		$datacontent['jenis_rt'] = $this->db->get('jenis_rt')->result_array();
		$datacontent['jenis_ks'] = $this->db->get('jenis_ks')->result_array();

		$data['content'] = $this->load->view('admin/kesejahteraan/formView', $datacontent, TRUE);
		$data['title'] = $datacontent['title'];
		$this->load->view('admin/layouts/html', $data);
	}
	public function simpan()
	{
		if ($this->input->post()) {

			// cek validasi
			$validation = null;
			// cek kode apakah sudah ada
			if ($this->input->post('id_penduduk') != "") {
				$this->db->where('id_penduduk !=' . $this->input->post('id_penduduk'));
			}
			$this->db->where('nomor_kk', $this->input->post('nomor_kk'));
			$check = $this->db->get('penduduk');
			if ($check->num_rows() > 0) {
				$validation[] = 'Kode kk Sudah Ada';
			}

			if (count($validation) > 0) {
				$this->session->set_flashdata('error_validation', $validation);
				$this->session->set_flashdata('error_value', $_POST);
				redirect($_SERVER['HTTP_REFERER']);
				return false;
			}
			// cek validasi
			$data = [
				'nomor_kk' => $this->input->post('nomor_kk'),
				'nik' => $this->input->post('nik'),
				'id_lokasi' => $this->input->post('id_lokasi'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'id_jenis_kb' => $this->input->post('id_jenis_kb'),
				'id_jenis_rt' => $this->input->post('id_jenis_rt'),
				'id_jenis_ks' => $this->input->post('id_jenis_ks'),
			];
			// upload

			if ($_POST['parameter'] == "tambah") {
				$this->Model->insert($data);
			} else {
				$this->Model->update($data, ['id_penduduk' => $this->input->post('id_penduduk')]);
			}
		}

		redirect('admin/kesejahteraan');
	}

	public function hapus($id = '')
	{
		// hapus file di dalam folder
		$this->db->where('id_penduduk', $id);
		$get = $this->Model->get()->row();

		// end hapus file di dalam folder
		$this->Model->delete(["id_penduduk" => $id]);
		redirect('admin/kesejahteraan');
	}
}
