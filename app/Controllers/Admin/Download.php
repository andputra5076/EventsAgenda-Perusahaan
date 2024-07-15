<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Download_model;
use App\Models\Kategori_download_model;

class Download extends BaseController
{

	// index
	public function index()
	{
		checklogin();
		$m_download 			= new Download_model();
		$m_kategori_download 	= new Kategori_download_model();
		$download 				= $m_download->listing();
		$total 					= $m_download->total();

		$data = [
			'title'			=> 'Data Jadwal Kegiatan (' . $total . ')',
			'download'		=> $download,
			'content'		=> 'admin/download/index'
		];
		echo view('admin/layout/wrapper', $data);
	}

	// Tambah
	public function tambah()
	{
		checklogin();
		$m_download             = new Download_model();
		$m_kategori_download    = new Kategori_download_model();
		$kategori_download      = $m_kategori_download->listing();

		// Start validasi
		if ($this->request->getMethod() === 'post') {
			// Image upload
			$avatar  	= $this->request->getFile('gambar');
			$namabaru 	= str_replace(' ', '-', $avatar->getName());
			$avatar->move(WRITEPATH . '../assets/upload/file/', $namabaru);
			// masuk database

			// Data yang akan disimpan
			$data = [
				'nama_kegiatan'         => $this->request->getVar('nama_kegiatan'),
				'tempat'                => $this->request->getVar('tempat'),
				'file' 				=> $namabaru,
				'pelaksana'             => $this->request->getVar('pelaksana'),
				'tanggal'               => $this->request->getVar('tanggal'),
			];

			// Menyimpan data ke database
			$m_download->tambah($data);

			// Redirect ke halaman download dengan pesan sukses
			return redirect()->to(base_url('admin/download'))->with('sukses', 'Data Berhasil di Simpan');
		}

		// Jika validasi tidak terpenuhi, tampilkan halaman tambah download
		$data = [
			'title'                 => 'Tambah Jadwal Kegiatan',
			'kategori_download'     => $kategori_download,
			'content'               => 'admin/download/tambah'
		];
		echo view('admin/layout/wrapper', $data);
	}



	// edit
	public function edit($id_download)
	{
		checklogin();
		$m_kategori_download = new Kategori_download_model();
		$m_download = new Download_model();
		$kategori_download = $m_kategori_download->listing();
		$download = $m_download->detail($id_download);

		// Start validasi
		if ($this->request->getMethod() === 'post') {
			// Image upload
			$avatar = $this->request->getFile('gambar');
			// Check if a new file is uploaded
			if ($avatar->isValid() && !$avatar->hasMoved()) {
				$namabaru = str_replace(' ', '-', $avatar->getName());
				$avatar->move(WRITEPATH . '../assets/upload/file/', $namabaru);
				// Jika file baru diunggah, gunakan nama file baru
				$file = $namabaru;
			} else {
				// Jika tidak ada file baru yang diunggah, gunakan nama file yang sudah ada
				$file = $download['file'];
			}

			// Data yang akan disimpan
			$data = [
				'id_download'   => $id_download,
				'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
				'tempat'        => $this->request->getVar('tempat'),
				'pelaksana'     => $this->request->getVar('pelaksana'),
				'tanggal'       => $this->request->getVar('tanggal'),
				'file'          => $file,
			];

			// Menyimpan data ke database
			$m_download->edit($data);

			// Redirect ke halaman download dengan pesan sukses
			return redirect()->to(base_url('admin/download'))->with('sukses', 'Data Berhasil di Simpan');
		}

		// Jika validasi tidak terpenuhi, tampilkan halaman edit download
		$data = [
			'title'             => 'Edit Jadwal Kegiatan ',
			'kategori_download' => $kategori_download,
			'download'          => $download,
			'content'           => 'admin/download/edit'
		];
		echo view('admin/layout/wrapper', $data);
	}





	// unduh
	public function unduh($id_download)
	{
		checklogin();
		$m_kategori_download 	= new Kategori_download_model();
		$m_download 			= new Download_model();
		$kategori_download 		= $m_kategori_download->listing();
		$download 				= $m_download->detail($id_download);
		return $this->response->download('../assets/upload/file/' . $download['gambar'], null);
	}

	// Delete
	public function delete($id_download)
	{
		checklogin();
		$m_download = new Download_model();
		$data = ['id_download'	=> $id_download];
		$m_download->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses', 'Data telah dihapus');
		return redirect()->to(base_url('admin/download'));
	}
}
