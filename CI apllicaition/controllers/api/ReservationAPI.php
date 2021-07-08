<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class ReservationAPI extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_reservation');
    }

    //get semua booking dari id user
    public function index_get()
    {
        $id = $this->get('id');
        if ($id == null) {
            $this->response([
                'status' => FALSE,
                'message' => 'data tidak ditentukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
            $m_reservation = $this->m_reservation->getAllBookedUserById($id);
            $this->response([
                'status' => TRUE,
                'message' => 'data ditemukan',
                'data' => $m_reservation
            ], REST_Controller::HTTP_OK);
        }
    }

    //get salah satu booking dari user id pembooking
    public function reservation_get()
    {
        $id = $this->get('id');
        if ($id == null) {
            $this->response([
                'status' => FALSE,
                'message' => 'data tidak ditentukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
            $m_reservation = $this->m_reservation->getBookedById($id);
            $this->response([
                'status' => TRUE,
                'message' => 'data ditemukan',
                'data' => $m_reservation
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post()
    {
        function generateRandomString($length = 10)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $data = [
            "booking_id" => generateRandomString(),
            "res_id" => $this->post('res_id'),
            "c_id" => $this->post('c_id'),
            "make_date" => date('Y-m-d'),
            "make_time" => date('H:i:s'),
            "name" => $this->post('name'),
            "phone" => $this->post('phone'),
            "booking_date" => $this->post('booking_date'),
            "booking_time" => $this->post('booking_time'),
            "bill" => 0,
            "transactionid" => "0",
            "status" => 0,
            "reject" => 0,
            "booked_service" => $this->post('booked_service'),
            "booked_barber_name" => $this->post('booked_barber_name'),
            "done_state" => 0
        ];

        if ($this->m_reservation->addBookingApi($data)) {
            $this->response([
                'status' => TRUE,
                'message' => 'Reservasi Berhasil!'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Reservasi Gagal!'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'transactionid' => "dummy"
        ];

        if ($this->m_reservation->bayarTransactionApi($data, $id) > 0) {
            $this->response([
                'status' => TRUE,
                'message' => 'Data transaction berhasil masuk'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Data transaction tidak berhasil masuk'
            ], REST_Controller::HTTP_OK);
        }
    }
}
