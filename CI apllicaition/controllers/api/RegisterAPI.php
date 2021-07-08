<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class RegisterAPI extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_register');
    }

    public function index_post()
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

        if ($this->m_register->tambahDataCustomerApi($data) > 0) {
            $this->response([
                'status' => TRUE,
                'message' => 'Data customer berhasil ditambahkan'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => TRUE,
                'message' => 'Data customer partially ditambahkan'
            ], REST_Controller::HTTP_OK);
        }
    }
}
