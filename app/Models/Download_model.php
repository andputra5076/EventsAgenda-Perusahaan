<?php

namespace App\Models;

use CodeIgniter\Model;

class Download_model extends Model
{

    protected $table = 'download';
    protected $primaryKey = 'id_download';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $builder = $this->db->table('download');
        $builder->select('*');
        $builder->orderBy('id_download', 'DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }


    // total
    public function total()
    {
        $builder = $this->db->table('download');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // detail
    public function detail($id_download)
    {
        $builder = $this->db->table('download');
        $builder->select('*');
        $builder->where('id_download', $id_download);
        $query = $builder->get();
        return $query->getRowArray();
    }


    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('download');
        $builder->insert($data);
    }

    // tambah
    // edit
    public function edit($data)
    {
        $builder = $this->db->table('download');
        $builder->set($data); // Mengatur data yang akan diupdate
        $builder->where('id_download', $data['id_download']);
        $builder->update(); // Menjalankan query untuk update data
    }


    // slider
    public function slider()
    {
        $builder = $this->db->table('download');
        $builder->where('jenis_download', 'Homepage');
        $builder->orderBy('download.id_download', 'DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
