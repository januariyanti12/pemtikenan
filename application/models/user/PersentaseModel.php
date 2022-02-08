<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersentaseModel extends CI_Model
{
    public function get_all_data()
    {
        $query = $this->db->query("SELECT status, jumlah, t_persentase FROM persentase WHERE status=''");
        return $query;
    }
}
