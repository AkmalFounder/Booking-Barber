<?php

class m_booking_admin extends CI_Model
{
    public function getAllBookedFromUserById($id)
    {
        $this->db->select('*');
        $this->db->from('booking_details');
        $this->db->where('res_id', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function confirmBooking($id)
    {
        $data = [
            "status" => 1
        ];

        $this->db->where('id', $id);
        $this->db->update('booking_details', $data);
    }

    public function rejectBooking($id)
    {
        $data = [
            "status" => 0
        ];

        $this->db->where('id', $id);
        $this->db->update('booking_details', $data);
    }
}
