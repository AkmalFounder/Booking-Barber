<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_servis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_servicemenu');
        $this->load->library('form_validation');
    }

    public function main($id)
    {
        $data['title'] = 'Service/Menu';
        $data['service'] = $this->m_servicemenu->getAllServiceFromResId($id);

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/servicemenu', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add()
    {
        $data['title'] = 'Add Page';
        $data['servicetype'] = $this->m_servicemenu->getAllServiceType();
        $data['user'] = $this->db->get_where('users_info', ['id' =>
        $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('templates_admin/topbar', $data);
            $this->load->view('admin/servicemenu_add', $data);
            $this->load->view('templates_admin/footer');
        } else {
            $this->m_servicemenu->addService(); //manggil model
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('c_servis/main/' . $this->session->userdata('id'));
        }
    }

    public function delete($id)
    {
        $this->m_servicemenu->deleteService($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('c_servis/main/' . $this->session->userdata('id'));
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Service/Menu Page';
        $data['service'] = $this->m_servicemenu->getServiceById($id);
        // $data['servicetype'] = $this->m_servicemenu->getAllServiceType();
        $data['servicetype'] = ['Paket', 'Tambahan'];


        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('templates_admin/topbar', $data);
            $this->load->view('admin/servicemenu_edit', $data);
            $this->load->view('templates_admin/footer');
        } else {
            $this->m_servicemenu->editService(); //manggil model
            $this->session->set_flashdata('flash', 'diperbarui');
            redirect('c_servis/main/' . $this->session->userdata('id'));
        }
    }
}
