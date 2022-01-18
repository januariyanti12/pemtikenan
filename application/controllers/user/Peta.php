<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PetaSebaranModel', 'Model');
    }

    public function index()
    {
        $datacontent['url'] = 'peta';
        $datacontent['title'] = 'Keluarga Sejahtera Kel.Desa Kapur';
        // $datacontent['datatable'] = $this->Model->get_all_data();
        $datacontent['peta'] = $this->Model->get_peta()->result_array();
        $data['content'] = $this->load->view('user/peta_sebaran/petasebaranView', $datacontent, TRUE);
        $data['js'] = $this->load->view('admin/leafletstandar/js/mapJs', $datacontent, TRUE);
        $data['title'] = $datacontent['title'];
        $this->load->view('admin/layouts/html', $data);
    }
}
