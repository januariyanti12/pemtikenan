<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('website/PersentaseModel');
    }

    public function index()
    {
        $datacontent['url'] = 'Chart';
        $datacontent['title'] = 'Persentase Keluarga Sejahtera Kel.Desa Kapur';
        $datacontent['persentase'] = $this->PersentaseModel->get_all_data()->result_array();
        $data['content'] = $this->load->view('website/chart_pie', $datacontent, TRUE);
        $data['title'] = $datacontent['title'];
        $this->load->view('website/layouts/html', $data);
    }
}
