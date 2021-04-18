<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_booking_admin');
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
}
