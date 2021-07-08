<?php

class m_register extends CI_Model
{
    public function tambahDataCustomerApi()
    {
        $data = [
            'users_name' => $this->input->post('users_name'),

            'email' => $this->input->post('email'),

            'phone' => $this->input->post('phone'),

            'address' => $this->input->post('address'),

            'logo' => 'default.png',

            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

            'role' => 2

        ];

        $this->db->insert('users_info', $data);
    }
}
