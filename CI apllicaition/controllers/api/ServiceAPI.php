<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class ServiceAPI extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_servicemenu');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id == null) {
            $m_servicemenu = $this->m_servicemenu->getAllService();
        } else {
            $m_servicemenu = $this->m_servicemenu->getAllServiceFromResId($id);
        }

        if ($m_servicemenu) {
            $this->response([
                'status' => TRUE,
                'data' => $m_servicemenu
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'service tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
