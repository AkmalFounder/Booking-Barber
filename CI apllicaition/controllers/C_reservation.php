<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_reservation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_location');
        $this->load->model('m_barber');
        $this->load->model('m_servicemenu');
        $this->load->model('m_reservation');
        $this->load->library('form_validation');
    }

    public function book($id)
    {
        $data['barber'] = $this->m_barber->getBarberById($id);
        $data['service_list'] = $this->m_servicemenu->getAllServiceFromResId($id);

        $this->form_validation->set_rules('reservation_name', 'Name', 'required');
        $this->form_validation->set_rules('reservation_phone', 'Phone', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header');

            $this->load->view('templates/nav-bar');

            $this->load->view('user/reservation', $data);

            $this->load->view('templates/footer');

            $this->load->view('templates/script');
        } else {

            $this->m_reservation->addBooking(); //manggil model
            // $this->m_reservation->addBookedService(); //manggil model

            redirect('c_user');
        }
    }
}
