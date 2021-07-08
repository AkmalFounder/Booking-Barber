<?php

class m_location extends CI_Model
{
    public function getreq()
    {
        $query = $this->db->get('locations');
        return $query->result_array();
    }

    public function getLocationToShow()
    {
        $location = $this->input->post('area', true);

        $this->db->select('*');
        $this->db->from('locations');
        $this->db->where('id', $location);
        $query = $this->db->get();

        return $query->result();
    }
}
