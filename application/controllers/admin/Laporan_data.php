<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_data extends CI_Controller
{

    public function __construct()
    {
        // Laporan
        parent::__construct();
        if ($this->session->logged !== true) {
            redirect('admin/auth');
        }
        if ($this->session->level !== 'Admin') {
            redirect('admin/beranda');
        }
        $this->load->model('LapdataModel', 'Model');
    }

    public function index()
    {
        $datacontent['url'] = 'admin/laporan_data';
        $datacontent['title'] = 'Laporan Data Keseluruhan Keluarga Sejahtera';
        $datacontent['datatable'] = $this->Model->get_data();
        $data['content'] = $this->load->view('admin/laporan_data/tableView', $datacontent, TRUE);
        $data['title'] = $datacontent['title'];
        $this->load->view('admin/layouts/html', $data);
    }
    public function form($parameter = '', $id = '')
    {
        $datacontent['url'] = 'admin/laporan_data';
        $datacontent['parameter'] = $parameter;
        $datacontent['id'] = $id;
        $datacontent['title'] = 'Laporan Data Keluarga Sejahtera';
        $datacontent['lokasi'] = $this->db->get('lokasi')->result_array();
        $datacontent['jenis_kb'] = $this->db->get('jenis_kb')->result_array();
        $datacontent['jenis_rt'] = $this->db->get('jenis_rt')->result_array();
        $datacontent['jenis_ks'] = $this->db->get('jenis_ks')->result_array();

        $data['content'] = $this->load->view('admin/laporan_data/formView', $datacontent, TRUE);
        $data['title'] = $datacontent['title'];
        $this->load->view('admin/layouts/html', $data);
    }
    public function export($jenis = 'pdf')
    {
        if ($jenis == 'pdf') {
            $this->load->library('dompdf_gen');
            $datacontent['title'] = 'Keluarga Sejahtera Report';
            $datacontent['datatable'] = $this->Model->get();
            $html = $this->load->view('admin/laporan_data/pdfView', $datacontent, TRUE);
            generatePdf($html, 'Data Keluarga Sejahtera', 'A4', 'landscape');
        }
    }
}
