<?php 
namespace App\Models;

use CodeIgniter\Model;

class Dasbor_model extends Model
{

    // berita
    public function berita()
    {
        $builder = $this->db->table('berita');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // user
    public function user()
    {
        $builder = $this->db->table('users');
        $query = $builder->get();
        return $query->getNumRows();
    }


    // galeri
    public function galeri()
    {
        $builder = $this->db->table('galeri');
        $query = $builder->get();
        return $query->getNumRows();
    }


    // download
    public function download()
    {
        $builder = $this->db->table('download');
        $query = $builder->get();
        return $query->getNumRows();
    }


    // kategori_download
    public function kategori_download()
    {
        $builder = $this->db->table('kategori_download');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // kategori
    public function kategori()
    {
        $builder = $this->db->table('kategori');
        $query = $builder->get();
        return $query->getNumRows();
    }


}