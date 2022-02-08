<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{

    public function __construct()
    {
        //Presen
        parent::__construct();
        $this->load->model('website/PersentaseModel');
        if ($this->session->logged !== true) {
            redirect('admin/auth');
        }
        if ($this->session->level !== 'Admin') {
            redirect('admin/beranda');
        }
    }

    public function index()
    {
        $datacontent['url'] = 'user/Chart';
        $datacontent['title'] = 'Persentase Keluarga Sejahtera Kel.Desa Kapur';
        $datacontent['persentase'] = $this->PersentaseModel->get_all_data()->result_array();
        $data['content'] = $this->load->view('admin/persentase/chart_pie', $datacontent, TRUE);
        $data['title'] = $datacontent['title'];
        $this->load->view('admin/layouts/html', $data);
    }
}
