<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        admin();
        $this->load->model('Admin_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $username = $this->session->userdata('username');

        $data['user'] = $this->User_model->getUser($username);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function getUser()
    {
        $id = $this->input->post('id');

        echo json_encode($this->Admin_model->getUsersById($id));
    }

    public function hapusUser($id)
    {
        $this->db->delete('users', ['id' => $id]);
        $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            User berhasil dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/register');
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password don\'t match',
            'min_length' => 'Password too short'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            # code...
            $data['title'] = 'Tambah User';
            $username = $this->session->userdata('username');
            $data['user'] = $this->User_model->getUser($username);
            $data['users'] = $this->Admin_model->getUsers();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/register', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $username = $this->input->post('username', true);
            $level = $this->input->post('level', true);
            $password = $this->input->post('password1', true);
            $data = [
                'nama' => test_input($nama),
                'username' => test_input($username),
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => $level,
                'date' => time()
            ];

            $this->db->insert('users', $data);

            $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                User berhasil daftar. Silahkan login!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/register');
        }
    }
}
