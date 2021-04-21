<?php

class m_servicemenu extends CI_Model
{
    public function getAllService()
    {
        $query = $this->db->get('menu_item');
        return $query->result_array();
    }

    public function getAllServiceFromResId($id)
    {
        $this->db->select('*');
        $this->db->from('menu_item');
        $this->db->where('res_id', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getAllServiceType()
    {
        $query = $this->db->get('servis_type_table');
        return $query->result_array();
    }

    // public function getServiceByResId($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('booking_details');
    //     $this->db->where('c_id', $id);
    //     $query = $this->db->get();

    //     return $query->result_array();
    // }

    public function getServiceById($id)
    {
        return $this->db->get_where('menu_item', ['id' => $id])->row_array();
    }

    public function addService()
    {
        $data = [
            "res_id" => $this->input->post('res_id', true),
            "item_name" => $this->input->post('item_name', true),
            "servis_type" => $this->input->post('service_type', true),
            "price" => $this->input->post('price', true),
            "image" => $this->input->post('image', true)
        ];

        $this->db->insert('menu_item', $data);
    }

    public function deleteService($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('menu_item');
    }

    public function editService()
    {
        $data = [
            "res_id" => $this->input->post('res_id', true),
            "item_name" => $this->input->post('item_name', true),
            "servis_type" => $this->input->post('service_type', true),
            "price" => $this->input->post('price', true),
            "image" => $this->input->post('image', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('menu_item', $data);
    }
}
