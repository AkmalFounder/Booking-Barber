<?php

class m_barber extends CI_Model
{
    public function getbarber()
    {
        $this->db->select('*');
        $this->db->from('users_info');
        $this->db->where('role', 1);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getAllBarberFromLoc()
    {
        $location = $this->input->post('area', true);

        $this->db->select('*');
        $this->db->from('users_info');
        $this->db->where('location', $location);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getBarberById($id)
    {
        return $this->db->get_where('users_info', ['id' => $id])->row_array();
    }
    
    
}
