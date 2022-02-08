<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kuisioner extends CI_Controller
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
        $this->load->model('KuisionerModel', 'Model');
    }

    public function index()
    {

        $datacontent['jawab'] = ['Ya', 'Tidak'];
        $datacontent['url'] = 'admin/Kuisioner';
        $datacontent['title'] = 'Halaman Form Keluarga Sejahtera';
        $datacontent['penduduk'] = $this->Model->get_penduduk()->result_array();
        $datacontent['tanya'] = $this->db->get('pertanyaan')->result_array();
        $data['content'] = $this->load->view('admin/KuisionerView', $datacontent, TRUE);
        $data['title'] = $datacontent['title'];

        $this->load->view('admin/layouts/html', $data);
    }

    public function simpan()
    {

        $idd = $_POST['penduduk'];
        $pertanyaan = $_POST['id_pertanyaan'];
        $jawaban = $_POST['jawaban'];
        $data = array();
        $index = 0;
        // cek validasi
        foreach ($idd as $dataid) {
            array_push($data, array(
                'id_penduduk' => $dataid[$index],
                'id_pertanyaan' => $pertanyaan[$index],
                'jawaban' => $jawaban[$index],
            ));
            $index++;
        }
        $this->db->insert_batch('jawaban', $data);



        redirect('admin/kuisioner');
    }

    public function form_validation()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules("responden", "responden", 'required');
        $this->form_validation->set_rules("p1", "p1", 'required');
        $this->form_validation->set_rules("p2", "p2", 'required');
        $this->form_validation->set_rules("p3", "p3", 'required');
        $this->form_validation->set_rules("p4", "p4", 'required');
        $this->form_validation->set_rules("p6", "p6", 'required');
        $this->form_validation->set_rules("p7", "p7", 'required');
        $this->form_validation->set_rules("p8", "p8", 'required');
        $this->form_validation->set_rules("p9", "p9", 'required');
        $this->form_validation->set_rules("p10", "p10", 'required');
        $this->form_validation->set_rules("p11", "p11", 'required');
        $this->form_validation->set_rules("p12", "p12", 'required');
        $this->form_validation->set_rules("p13", "p13", 'required');
        $this->form_validation->set_rules("p14", "p15", 'required');
        $this->form_validation->set_rules("p16", "p16", 'required');
        $this->form_validation->set_rules("p17", "p17", 'required');
        $this->form_validation->set_rules("p18", "p18", 'required');
        $this->form_validation->set_rules("p19", "p19", 'required');
        $this->form_validation->set_rules("p20", "p20", 'required');
        $this->form_validation->set_rules("p21", "p21", 'required');

        if ($this->form_validation->run()) {
            //  $this->load->model("KuisionerModel");
            $data = array(
                "responden"       => $this->input->post("responden"),
                "p1"              => $this->input->post("p1"),
                "p2"              => $this->input->post("p2"),
                "p3"              => $this->input->post("p3"),
                "p4"              => $this->input->post("p4"),
                "p5"              => $this->input->post("p5"),
                "p6"              => $this->input->post("p6"),
                "p7"              => $this->input->post("p7"),
                "p8"              => $this->input->post("p8"),
                "p9"              => $this->input->post("p9"),
                "p10"              => $this->input->post("p10"),
                "p11"              => $this->input->post("p11"),
                "p12"              => $this->input->post("p12"),
                "p13"              => $this->input->post("p13"),
                "p14"              => $this->input->post("p14"),
                "p15"              => $this->input->post("p15"),
                "p16"              => $this->input->post("p16"),
                "p17"              => $this->input->post("p17"),
                "p18"              => $this->input->post("p18"),
                "p19"              => $this->input->post("p19"),
                "p20"              => $this->input->post("p20"),
                "p21"              => $this->input->post("p21"),

            );
            $this->input_model->insert_data($data);

            redirect(base_url() . 'Input/Berhasil');
        } else {
            $this->index();
        }
    }

    public function inserted()
    {
        $this->index();
    }

    public function Berhasil()
    {
        $this->load->view("berhasil");
    }
}
