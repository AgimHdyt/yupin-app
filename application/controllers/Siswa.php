<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->model('Siswa_model');
    }

    public function dataSiswa($kel)
    {
        $data['title'] = 'Data Siswa Kelas ' . $kel;
        $username = $this->session->userdata('username');
        $data['user'] = $this->User_model->getUser($username);

        $keyword = $this->input->post('keyword');

        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');
        $jurusan = $this->input->post('jurusan');

        $data['siswa'] = $this->Siswa_model->getDataSiswaKelas($kel, $keyword);

        $this->form_validation->set_rules('nisn', 'Nisn', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('siswa/data-siswa', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nisn' => test_input($nisn),
                'nama' => test_input($nama),
                'kelas' => test_input($kelas),
                'jurusan' => test_input($jurusan)
            ];

            $this->db->insert('siswa', $data);

            $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Siswa Berhasil Ditambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect('siswa/dataSiswa/' . $kelas);
        }
    }

    public function editSiswa()
    {

        $data['title'] = 'Data Siswa';
        $username = $this->session->userdata('username');
        $data['user'] = $this->User_model->getUser($username);
        $data['siswa'] = $this->Siswa_model->getDataSiswaKelas(10);

        $this->form_validation->set_rules('nisn', 'Id Barang', 'required|trim');
        $this->form_validation->set_rules('nama', 'NISN', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('siswa/data-siswa', $data);
            $this->load->view('templates/footer');
        } else {

            $id = $this->input->post('id');
            $nisn = $this->input->post('nisn');
            $nama = $this->input->post('nama');
            $kelas = $this->input->post('kelas');
            $jurusan = $this->input->post('jurusan');

            $data = [
                'nisn' => test_input($nisn),
                'nama' => test_input($nama),
                'kelas' => test_input($kelas),
                'jurusan' => test_input($jurusan)
            ];
            $this->db->where('id', $id);
            $this->db->update('siswa', $data);


            $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Siswa Berhasil Diubah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('siswa/dataSiswa/' . $kelas);
        }
    }

    public function getSiswa()
    {
        $id = $this->input->post('id');

        echo json_encode($this->Siswa_model->getDataSiswaId($id));
    }

    public function hapusSiswa($id)
    {
        $kelas = $this->input->get('kelas');

        $this->db->delete('siswa', ['id' => $id]);
        $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Siswa Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('siswa/dataSiswa/' . $kelas);
    }
}
