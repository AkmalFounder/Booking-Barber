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

    public function doneStateBooking($id)
    {
        $data = [
            "done_state" => 1
        ];

        $this->db->where('id', $id);
        $this->db->update('booking_details', $data);
    }

    public function getBarberById($id)
    {
        return $this->db->get_where('users_info', ['id' => $id])->row_array();
    }

    public function editBarberLocation()
    {
        $data = [
            "latitude" => $this->input->post('latitude', true),
            "longitude" => $this->input->post('longitude', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users_info', $data);
    }
}
