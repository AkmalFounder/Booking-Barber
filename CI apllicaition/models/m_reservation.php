<?php

class m_reservation extends CI_Model
{
    public function getAllBookedUserById($id)
    {
        $this->db->select('*');
        $this->db->from('booking_details');
        $this->db->where('c_id', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getBookedById($id)
    {
        return $this->db->get_where('booking_details', ['id' => $id])->row_array();
    }

    public function addBooking()
    {
        $data = [
            "booking_id" => $this->input->post('reservation_booking_id', true),
            "res_id" => $this->input->post('reservation_res_id', true),
            "c_id" => $this->input->post('reservation_c_id', true),
            "make_date" => $this->input->post('reservation_make_date', true),
            "make_time" => $this->input->post('reservation_make_time', true),
            "name" => $this->input->post('reservation_name', true),
            "phone" => $this->input->post('reservation_phone', true),
            "booking_date" => $this->input->post('reservation_date', true),
            "booking_time" => $this->input->post('reservation_time', true),
            "bill" => $this->input->post('reservation_bill', true),
            "transactionid" => $this->input->post('reservation_transaction_id', true),
            "status" => $this->input->post('reservation_status', true),
            "reject" => $this->input->post('reservation_reject', true),
            "booked_service" => $this->input->post('reservation_selected_service', true),
            "booked_barber_name" => $this->input->post('reservation_booked_barber', true),
            "done_state" => $this->input->post('reservation_done_state', true)

        ];

        $this->db->insert('booking_details', $data);
    }

    public function addBookedService()
    {
        $data = [
            "booking_id" => $this->input->post('reservation_booking_id', true),
            "item_id" => $this->input->post('reservation_selected_service', true),
            "qty" => $this->input->post('reservation_qty', true)
        ];

        $this->db->insert('booking_menus', $data);
    }

    public function bayarTransaction()
    {
        $data = [
            "transactionid" => $this->input->post('reservation_transaction_id', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('booking_details', $data);
    }

    //------------------rest-------------------

    public function bayarTransactionApi($data, $id)
    {
        $this->db->update('booking_details', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function addBookingApi($data)
    {
        $this->db->insert('booking_details', $data);
        return $this->db->affected_rows();
    }
}
