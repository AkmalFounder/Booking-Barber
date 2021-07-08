<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates_guest/header');

            $this->load->view('templates_guest/nav-bar');

            $this->load->view('user/login');

            $this->load->view('templates/footer');

            $this->load->view('templates/script');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users_info', ['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id' => $user['id'],
                    'users_name' => $user['users_name'],
                    'email' => $user['email'],
                    'phone' => $user['phone'],
                    'logo' => $user['image'],
                    'role' => $user['role'],
                    'latitude' => $user['latitude'],
                    'longitude' => $user['longitude']
                ];
                if ($user['role'] == 1) {
                    $this->session->set_userdata($data);
                    redirect('c_admin/bookinglist/' . $this->session->userdata('id'));
                } elseif ($user['role'] != 1) {
                    $this->session->set_userdata($data);
                    redirect('C_user');
                }
            } else {
                $this->session->set_flashdata('message', '<h1>Password salah!</h1>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<script>alert("Email tidak terdaftar!")</script>');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users_info.email]');

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');


        if ($this->form_validation->run() == false) {

            $this->load->view('templates_guest/header');

            $this->load->view('templates_guest/nav-bar');

            $this->load->view('user/register');

            $this->load->view('templates/footer');

            $this->load->view('templates/script');
        } else {
            $data = [
                'users_name' => htmlspecialchars($this->input->post('fullname', true)),

                'email' => htmlspecialchars($this->input->post('email', true)),

                'phone' => $this->input->post('phone'),

                'address' => $this->input->post('address'),

                'logo' => 'default.png',

                'password' => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                ),
                'role' => 2

            ];

            $this->db->insert('users_info', $data);
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<script>alert("logout")</script>');
        redirect('c_guest');
    }
}
