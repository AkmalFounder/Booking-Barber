<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class AuthAPI extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index_post()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $customer = $this->db->get_where('users_info', ['email' => $email])->row_array();
        if ($customer) {
            if ($customer['role'] == 2) {
                if (password_verify($pass, $customer['password'])) {
                    $this->response([
                        'status' => TRUE,
                        'data' => $customer
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'Maaf, password salah'
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Maaf, harus customer yang bisa login di mobile'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Maaf, email tersebut belum terdaftar'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
