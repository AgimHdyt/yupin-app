<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUser($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }

    public function getBarangP($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->or_like('id_barang', $keyword);
        }
        return $this->db->get('barang', $limit, $start)->result_array();
    }

    public function getBarang()
    {
        return $this->db->get('barang')->result_array();
    }

    public function getBarangS()
    {
        return $this->db->get_where('barang', ['status' => 1])->result_array();
    }

    public function getBarangD()
    {
        return $this->db->get_where('barang', ['status' => 2])->result_array();
    }

    public function countBarang()
    {
        return $this->db->get('barang')->num_rows();
    }

    public function getBarangDipinjam()
    {
        return $this->db->get_where('barang', ['status' => 2])->num_rows();
    }
    public function getBarangSisa()
    {
        return $this->db->get_where('barang', ['status' => 1])->num_rows();
    }
    public function getBarangById($id)
    {
        return $this->db->get_where('barang', ['id' => $id])->row_array();
    }

    public function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function getKategoriById($id)
    {
        return $this->db->get_where('kategori', ['id' => $id])->row_array();
    }

    public function getDataPinjam()
    {
        return $this->db->get('pinjam')->result_array();
    }

    public function getDataPinjamP($limit, $start, $keyword)
    {
        if ($keyword) {
            $this->db->like('nama_peminjam', $keyword);
            $this->db->or_like('id_barang', $keyword);
        }
        return $this->db->get('pinjam', $limit, $start)->result_array();
    }

    public function countDataPinjam()
    {
        return $this->db->get('pinjam')->num_rows();
    }

    public function getDataPinjamById($id_barang)
    {
        return $this->db->get_where('pinjam', ['id_barang' => $id_barang])->row_array();
    }

    public function peminjam()
    {
        $query = "SELECT DISTINCT `nama_peminjam` FROM `pinjam`";

        return $this->db->query($query)->num_rows();
    }
}
