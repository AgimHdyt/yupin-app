<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->model('Siswa_model');
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $username = $this->session->userdata('username');
        $data['user'] = $this->User_model->getUser($username);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kategori()
    {

        $data['title'] = 'Kategori';
        $username = $this->session->userdata('username');
        $data['user'] = $this->User_model->getUser($username);
        $data['kategori'] = $this->User_model->getKategori();

        $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/tambah-kategori', $data);
            $this->load->view('templates/footer');
        } else {

            $kategori = test_input($this->input->post('kategori', true));

            $data = [
                'nama' => $kategori
            ];
            $this->db->insert('kategori', $data);


            $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Kategori berhasil ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('user/tambah_kategori');
        }
    }

    public function getKategori()
    {
        $id = $this->input->post('id');
        echo json_encode($this->User_model->getKategoriById($id));
    }

    public function edit_kategori()
    {

        $data['title'] = 'Kategori';
        $username = $this->session->userdata('username');
        $data['user'] = $this->User_model->getUser($username);
        $data['kategori'] = $this->User_model->getKategori();

        $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/tambah-kategori', $data);
            $this->load->view('templates/footer');
        } else {

            $id = test_input($this->input->post('id', true));
            $kategori = test_input($this->input->post('kategori', true));

            $data = [
                'nama' => $kategori
            ];
            $this->db->where('id', $id);
            $this->db->update('kategori', $data);


            $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Kategori berhasil diubah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('user/tambah_kategori');
        }
    }

    public function hapusKategori($id)
    {
        $this->db->delete('kategori', ['id' => $id]);
        $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Kategori berhasil dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('user/tambah_kategori');
    }

    public function tambah_barang()
    {

        $data['title'] = 'Data Barang';
        $username = $this->session->userdata('username');
        $data['user'] = $this->User_model->getUser($username);

        // load library
        $this->load->library('pagination');

        //ambil data keyword
        // $data['keyword'] = $this->input->post('keyword');

        if ($this->input->post('keyword')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('kategori', $data['keyword']);
        $this->db->or_like('id_barang', $data['keyword']);
        $this->db->from('barang');

        //CONFIG
        $config['base_url'] = 'http://localhost/yupin/user/tambah_barang';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        //initialize
        $this->pagination->initialize($config);


        //PAGINATION
        $data['start'] = $this->uri->segment(3);

        $data['barang'] = $this->User_model->getBarangP($config['per_page'], $data['start'], $data['keyword']);

        $data['kategori'] = $this->User_model->getKategori();
        // if (!$data['keyword']) {
        # code...
        $this->form_validation->set_rules('nama', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
        // }

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/tambah-barang', $data);
            $this->load->view('templates/footer');
        } else {

            $nama = test_input($this->input->post('nama', true));
            $kategori = test_input($this->input->post('kategori', true));
            $id_barang = crypt(rand(22, 999), time());

            $data = [
                'id_barang' => $id_barang,
                'nama' => $nama,
                'kategori' => $kategori,
                'status' => 1,
                'date' => time()
            ];
            $this->db->insert('barang', $data);


            $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Produk berhasil ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('user/tambah_barang');
        }
    }

    public function editBarang()
    {

        // $data['barang'] = $this->User_model->getBarang();
        // $data['kategori'] = $this->User_model->getKategori();
        $data['title'] = 'Data Barang';
        $username = $this->session->userdata('username');
        $data['user'] = $this->User_model->getUser($username);

        // load library
        $this->load->library('pagination');

        //CONFIG
        $config['base_url'] = 'http://localhost/yupin/user/editBarang';
        $config['total_rows'] = $this->User_model->countBarang();
        $config['per_page'] = 10;

        //initialize
        $this->pagination->initialize($config);


        //PAGINATION
        $data['start'] = $this->uri->segment(3);
        $data['barang'] = $this->User_model->getBarangP($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['barang'] = $this->User_model->searchP($config['per_page'], $data['start']);
        }
        $data['kategori'] = $this->User_model->getKategori();

        $this->form_validation->set_rules('nama', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('id_barang', 'Id Barang', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/tambah-barang', $data);
            $this->load->view('templates/footer');
        } else {

            $id = test_input($this->input->post('id'));
            $nama = test_input($this->input->post('nama'));
            $id_barang = test_input($this->input->post('id_barang'));
            $kategori = test_input($this->input->post('kategori'));

            $data = [
                'id_barang' => $id_barang,
                'nama' => $nama,
                'kategori' => $kategori,
                'status' => 1,
                'date' => time()
            ];
            $this->db->where('id', $id);
            $this->db->update('barang', $data);


            $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Barang berhasil diubah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('user/tambah_barang');
        }
    }

    public function hapusBarang($id)
    {
        $this->db->delete('barang', ['id' => $id]);

        $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Barang Berhasil Dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('user/tambah_barang');
    }

    public function getBarang()
    {
        $id = $this->input->post('id');

        echo json_encode($this->User_model->getBarangById($id));
    }

    public function getUserK()
    {
        $kelas = $this->input->post('kelas');
        $jurusan = $this->input->post('jurusan');
        // echo json_encode($this->Siswa_model->getDataSiswaByKelas($kelas));
        $data = $this->Siswa_model->getDataSiswaJurusan($kelas, $jurusan);
        $output = '<option value="">Nama</option>';
        foreach ($data as $d) {
            $output .= '<option value="' . $d->nama . '">' . $d->nama . '</option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function pinjam()
    {

        $data['title'] = 'Pinjam Barang';
        $username = $this->session->userdata('username');
        $data['user'] = $this->User_model->getUser($username);
        $data['siswa'] = $this->Siswa_model->getDataSiswa();
        $data['barang'] = $this->User_model->getBarangS();

        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        $this->form_validation->set_rules('id_barang', 'Id Barang', 'required|trim');

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/pinjam-barang', $data);
            $this->load->view('templates/footer');
        } else {

            $id_barang = $this->input->post('id_barang');
            $nama = $this->input->post('nama_peminjam');
            $jurusan = $this->input->post('jurusan');
            $kelas = $this->input->post('kelas');

            $barang = $this->User_model->getDataPinjamById($id_barang);
            if ($barang) {
                $this->session->set_userdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Barang sedang dipinjam!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('user/pinjam');
            }

            $data = [
                'id_barang' => $id_barang,
                'jurusan' => test_input($jurusan),
                'kelas' => test_input($kelas),
                'nama_peminjam' => test_input($nama),
                'date_pinjam' => time()
            ];
            $this->db->insert('pinjam', $data);

            $Udata = [
                'status' => 2
            ];
            $this->db->where('id_barang', $id_barang);
            $this->db->update('barang', $Udata);


            $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Pinjam Berhasil!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('user/pinjam');
        }
    }

    public function kembalikan()
    {
        $data['title'] = 'Pengembalian';
        $username = $this->session->userdata('username');
        $data['user'] = $this->User_model->getUser($username);
        $id_barang = $this->input->post('id_barang');
        $data['dipinjam'] = $this->User_model->getBarangD();

        $this->form_validation->set_rules('id_barang', 'Id Barang', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/data-pinjam', $data);
            $this->load->view('templates/footer');
        } else {

            $barang = $this->User_model->getDataPinjamById($id_barang);
            if (!$barang) {
                $this->session->set_userdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Barang sedang dalam loker!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('user/datapinjam');
            }

            $data = [
                'status' => 1
            ];

            $this->db->where('id_barang', $id_barang);
            $this->db->update('barang', $data);
            $this->db->delete('pinjam', ['id_barang' => $id_barang]);

            $this->session->set_userdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Pengembalian Berhasil!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('user/datapinjam');
        }
    }

    public function datapinjam()
    {
        $data['title'] = 'Data Pinjam';
        $username = $this->session->userdata('username');
        $data['user'] = $this->User_model->getUser($username);

        // load library
        $this->load->library('pagination');

        //CONFIG
        $config['base_url'] = 'http://localhost/yupin/user/datapinjam';
        $config['total_rows'] = $this->User_model->countDataPinjam();
        $config['per_page'] = 10;

        //initialize
        $this->pagination->initialize($config);


        //PAGINATION
        $data['start'] = $this->uri->segment(3);
        $keyword = $this->input->post('keyword');

        $data['datapinjam'] = $this->User_model->getDataPinjamP($config['per_page'], $data['start'], $keyword);

        $data['dipinjam'] = $this->User_model->getBarangD();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('user/data-pinjam', $data);
        $this->load->view('templates/footer');
    }
}
