<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barber');
    }

    public function index()
    {
        $data['barber_location'] = $this->m_barber->getbarber();

        $this->load->view('templates/header');

        $this->load->view('templates/nav-bar');

        $this->load->view('user/index', $data);

        $this->load->view('templates/font-menu', $data);

        $this->load->view('templates/footer');

        $this->load->view('templates/script');
    }
}
