<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_location');
        $this->load->model('m_barber');
        $this->load->model('m_reservation');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['barber_location'] = $this->m_barber->getbarber();

        $data['user'] = $this->db->get_where('users_info', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['barber_location_searched'] = $this->m_barber->getAllBarberFromLoc();

        $data['location'] = $this->m_location->getreq();

        $this->form_validation->set_rules('area', 'Lokasi', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header');

            $this->load->view('templates/nav-bar', $data);

            $this->load->view('user/index', $data);

            $this->load->view('templates/font-menu');

            $this->load->view('templates/footer');

            $this->load->view('templates/script');
        } else {

            $this->load->view('templates/header');

            $this->load->view('templates/nav-bar', $data);

            $this->load->view('user/index', $data);

            $this->load->view('templates/barbershop-list-user', $data);

            $this->load->view('templates/footer');

            $this->load->view('templates/script');
        }
    }

    public function waitinglist($id)
    {
        $data['booked_barber'] = $this->m_reservation->getAllBookedUserById($id);

        $this->load->view('templates/header');

        $this->load->view('templates/nav-bar');

        $this->load->view('user/waiting-list', $data);

        $this->load->view('templates/footer');

        $this->load->view('templates/script');
    }

    public function waitinglist_bayar($id)
    {
        $data['booked_barber'] = $this->m_reservation->getBookedById($id);

        $this->form_validation->set_rules('reservation_transaction_id', 'Nomor Struk', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header');

            $this->load->view('templates/nav-bar');

            $this->load->view('user/waiting-list-bayar', $data);

            $this->load->view('templates/footer');

            $this->load->view('templates/script');
        } else {

            $this->m_reservation->bayarTransaction(); //manggil model
            redirect('c_user/waitinglist/' . $this->session->userdata('id'));
        }
    }

    public function waitinglist_detail($id)
    {
        $data['booked_barber'] = $this->m_reservation->getBookedById($id);

        $this->load->view('templates/header');

        $this->load->view('templates/nav-bar');

        $this->load->view('user/waiting-list-detail', $data);

        $this->load->view('templates/footer');

        $this->load->view('templates/script');
    }
}
