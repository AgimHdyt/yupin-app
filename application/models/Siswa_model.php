<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function getDataSiswa()
    {
        return $this->db->get('siswa')->result_array();
    }

    public function getDataSiswaKelas($kelas, $keyword)
    {
        if ($keyword) {
            $this->db->like('kelas', $keyword);
            $this->db->or_like('nama', $keyword);
            $this->db->or_like('nisn', $keyword);
            $this->db->or_like('jurusan', $keyword);
        }
        return $this->db->get_where('siswa', ['kelas' => $kelas])->result_array();
    }

    public function getDataSiswaByKelas($kelas)
    {
        // return $this->db->get_where('siswa', ['kelas' => $kelas])->result();
        $query = "SELECT DISTINCT `jurusan` FROM `siswa` WHERE `kelas` = $kelas";

        return $this->db->query($query)->result();
    }

    public function getDataSiswaByJurusan($jurusan)
    {
        return $this->db->get_where('siswa', ['jurusan' => $jurusan])->result();
    }
    public function getDataSiswaJurusan($kelas, $jurusan)
    {
        return $this->db->get_where('siswa', ['kelas' => $kelas, 'jurusan' => $jurusan])->result();
    }

    public function getDataSiswaId($id)
    {
        return $this->db->get_where('siswa', ['id' => $id])->row_array();
    }

    public function search($search)
    {
        $this->db->like('nisn', $search);
        $this->db->or_like('nama', $search);
        $this->db->or_like('kelas', $search);
        $this->db->or_like('jurusan', $search);
        return $this->db->get('siswa')->result_array();
    }
}
