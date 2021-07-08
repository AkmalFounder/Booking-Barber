<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class BarberAPI extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barber');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id == null) {
            $m_barber = $this->m_barber->getbarber();
        } else {
            $m_barber = $this->m_barber->getBarberById($id);
        }

        $location = $this->get('location');
        if ($location == null) {
            $m_barber = $this->m_barber->getbarber();
        } else {
            $m_barber = $this->m_barber->getAllBarberFromLocAPI($location);
        }

        if ($m_barber) {
            $this->response([
                'status' => TRUE,
                'data' => $m_barber
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'barber tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
