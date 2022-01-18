<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_kb extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->logged !== true) {
            redirect('admin/auth');
        }
        if ($this->session->level !== 'User') {
            redirect('admin/beranda');
        }
        $this->load->model('DataKBModel', 'Model');
    }

    public function index()
    {
        $datacontent['url'] = 'user/pengguna_kb';
        $datacontent['title'] = 'Halaman Data Pengguna KB';
        $datacontent['datatable'] = $this->Model->get_data();
        $data['content'] = $this->load->view('user/pengguna_kb/tableView', $datacontent, TRUE);
        $data['title'] = $datacontent['title'];
        $this->load->view('admin/layouts/html', $data);
    }
    public function form($parameter = '', $id = '')
    {
        $datacontent['url'] = 'user/pengguna_kb';
        $datacontent['parameter'] = $parameter;
        $datacontent['id'] = $id;
        $datacontent['title'] = 'Form Data Pengguna KB';
        $datacontent['lokasi'] = $this->db->get('lokasi')->result_array();
        $datacontent['jenis_kb'] = $this->db->get('jenis_kb')->result_array();
        $datacontent['jenis_rt'] = $this->db->get('jenis_rt')->result_array();

        $data['content'] = $this->load->view('user/pengguna_kb/formView', $datacontent, TRUE);
        $data['title'] = $datacontent['title'];
        $this->load->view('admin/layouts/html', $data);
    }
}
