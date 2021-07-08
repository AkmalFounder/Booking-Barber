<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_booking_admin');
        $this->load->model('m_barber');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Administrator';
        $data['user'] = $this->db->get_where('users_info', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates_admin/footer');
    }

    public function bookinglist($id)
    {
        $data['title'] = 'Booking List';
        $data['booked_list'] = $this->m_booking_admin->getAllBookedFromUserById($id);
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/bookingmenu', $data);
        $this->load->view('templates_admin/footer');
    }

    public function approveBooking($id)
    {
        $this->m_booking_admin->confirmBooking($id);
        $this->session->set_flashdata('flash', 'Confirmed');
        redirect('c_admin/bookinglist/' . $this->session->userdata('id'));
    }

    public function rejectBooking($id)
    {
        $this->m_booking_admin->rejectBooking($id);
        $this->session->set_flashdata('flash', 'Confirmed');
        redirect('c_admin/bookinglist/' . $this->session->userdata('id'));
    }

    public function doneBooking($id)
    {
        $this->m_booking_admin->doneStateBooking($id);
        $this->session->set_flashdata('flash', 'Booking Done');
        redirect('c_admin/bookinglist/' . $this->session->userdata('id'));
    }

    public function locationEdit($id)
    {
        $data['title'] = 'Edit Lokasi';
        $data['barber_from'] = $this->m_booking_admin->getBarberById($id);

        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('templates_admin/topbar', $data);
            $this->load->view('admin/location_edit', $data);
            $this->load->view('templates_admin/footer');
        } else {
            $this->m_booking_admin->editBarberLocation(); //manggil model
            $this->session->set_flashdata('flash', 'diperbarui');
            redirect('c_admin/bookinglist/' . $this->session->userdata('id'));
        }
    }
}
