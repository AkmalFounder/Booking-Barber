<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_reg_barber extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_location');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users_info.email]');

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

        $data['location'] = $this->m_location->getreq();

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header');

            $this->load->view('templates/nav-bar');

            $this->load->view('user/register_barber', $data);

            $this->load->view('templates/footer');

            $this->load->view('templates/script');
        } else {
            $data = [
                'users_name' => htmlspecialchars($this->input->post('fullname', true)),

                'email' => htmlspecialchars($this->input->post('email', true)),

                'phone' => $this->input->post('phone'),

                'address' => $this->input->post('address'),

                'location' => $this->input->post('area'),

                'logo' => $this->input->post('image', true),

                'password' => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                ),
                'role' => 1

            ];

            $this->db->insert('users_info', $data);
            redirect('auth');
        }
    }
}
