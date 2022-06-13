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
        if ($this->session->userdata('username')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login';
            $this->load->view('auth/index', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = test_input($this->input->post('username'));
        $password = test_input($this->input->post('password'));
        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        //juka user ada
        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role' => $user['role']
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 1) {
                    'admin';
                    redirect('admin');
                } else {
                    'user';
                    redirect('user');
                }
            } else {
                $this->session->set_userdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_userdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username tidak terdaftar!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('auth');
        }
    }

    public function goToDefaultPage()
    {
        $this->load->view('auth/goToDefault');
    }

    public function edit()
    {
        if (!$this->session->userdata('username')) {
            redirect('admin');
        }
        $this->load->model('User_model');


        $data['title'] = 'Edit';
        $username = $this->session->userdata('username');
        $data['user'] = $this->User_model->getUser($username);


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('auth/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');

            $data = [
                'username' => test_input($username),
                'nama' => test_input($nama)
            ];
            $this->db->where('id', $id);
            $this->db->update('users', $data);

            $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    You has been changed!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect('auth/edit');
        }
    }


    public function editPassword()
    {
        if (!$this->session->userdata('username')) {
            redirect('admin');
        }
        $this->load->model('User_model');

        $username = $this->session->userdata('username');
        $data['user'] = $this->User_model->getUser($username);

        $this->form_validation->set_rules('current_password', 'Current Paasword', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]', [
            'matches' => 'Password don\'t match'
        ]);
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('auth/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = test_input($this->input->post('current_password'));
            $new_password = test_input($this->input->post('new_password1'));
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_userdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Wrong current password!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                redirect('auth/edit');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_userdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    New password can\'t be the same as current password!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('auth/edit');
                } else {
                    //password sudah ok
                    $password_has = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_has);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('users');
                    $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Password changed!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('auth/edit');
                }
            }
        }
    }



    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Kamu berhasil logout!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('auth');
    }
}
