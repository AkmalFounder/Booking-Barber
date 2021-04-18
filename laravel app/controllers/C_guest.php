<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_guest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barber');
        $this->load->model('m_location');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['barber_location'] = $this->m_barber->getbarber();

        $data['barber_location_searched'] =  $this->m_barber->getAllBarberFromLoc();

        $data['location'] = $this->m_location->getreq();

        $this->form_validation->set_rules('area','Lokasi','required');

        if( $this->form_validation->run() == FALSE){

            $this->load->view('templates_guest/header');

            $this->load->view('templates_guest/nav-bar');
    
            $this->load->view('guest/index', $data);
    
            $this->load->view('templates/font-menu', $data);
    
            $this->load->view('templates_guest/footer');
    
            $this->load->view('templates_guest/script');

        } else {

            //manggil model

            $this->load->view('templates_guest/header');

            $this->load->view('templates_guest/nav-bar');
    
            $this->load->view('guest/index', $data);
    
            $this->load->view('templates/barbershop-list', $data);
    
            $this->load->view('templates_guest/footer');
    
            $this->load->view('templates_guest/script');

        }

       
    }
}
