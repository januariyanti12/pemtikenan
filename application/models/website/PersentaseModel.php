<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersentaseModel extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('persentase');
        return $this->db->get()->result();
    }
}
