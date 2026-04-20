<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HalamanDinamisModel;

class TentangAdmin extends BaseController
{
    protected $halamanModel;

    public function __construct()
    {
        $this->halamanModel = new HalamanDinamisModel();
    }

    public function index()
    {
        // 1. Dapatkan Profil dan Visi (selalu ada, kalau kosong dibikin placeholder)
        $profil = $this->halamanModel->where('halaman', 'tentang')->where('kategori', 'profil')->first();
        if (!$profil) {
            $this->halamanModel->save(['halaman' => 'tentang', 'kategori' => 'profil', 'judul' => 'Profil Singkat', 'konten' => 'Isi profil sekolah otomatis di sini...']);
            $profil = $this->halamanModel->where('halaman', 'tentang')->where('kategori', 'profil')->first();
        }

        $visi = $this->halamanModel->where('halaman', 'tentang')->where('kategori', 'visi')->first();
        if (!$visi) {
            $this->halamanModel->save(['halaman' => 'tentang', 'kategori' => 'visi', 'judul' => 'Visi Sekolah', 'konten' => 'Visi belum diatur.']);
            $visi = $this->halamanModel->where('halaman', 'tentang')->where('kategori', 'visi')->first();
        }

        $data = [
            'title'     => 'Manajemen Halaman Tentang',
            'profil'    => $profil,
            'visi'      => $visi,
            'identitas' => $this->halamanModel->where('halaman', 'tentang')->where('kategori', 'identitas')->findAll(),
            'misi'      => $this->halamanModel->where('halaman', 'tentang')->where('kategori', 'misi')->findAll(),
            'tujuan'    => $this->halamanModel->where('halaman', 'tentang')->where('kategori', 'tujuan')->findAll(),
            'nilai'     => $this->halamanModel->where('halaman', 'tentang')->where('kategori', 'nilai')->findAll(),
            'flash'     => session()->getFlashdata('pesan')
        ];

        return view('pages/tentang_admin/index', $data);
    }

    // Mengupdate Profil & Visi langsung
    public function update_utama()
    {
        $idProfil = $this->request->getPost('id_profil');
        $profilKonten = $this->request->getPost('profil_konten');
        $idVisi = $this->request->getPost('id_visi');
        $visiKonten = $this->request->getPost('visi_konten');

        $this->halamanModel->update($idProfil, ['konten' => $profilKonten]);
        $this->halamanModel->update($idVisi, ['konten' => $visiKonten]);

        session()->setFlashdata('pesan', ['type' => 'success', 'message' => 'Profil & Visi berhasil diperbarui!']);
        return redirect()->to('/tentang');
    }

    // Mengupdate Logo Sekolah
    public function update_logo()
    {
        $fileLogo = $this->request->getFile('logo');

        if ($fileLogo && $fileLogo->isValid() && !$fileLogo->hasMoved()) {
            // Validasi file (harus gambar, maksimal 2MB)
            $rules = [
                'logo' => 'uploaded[logo]|max_size[logo,2048]|is_image[logo]|mime_in[logo,image/png,image/jpeg,image/jpg]'
            ];

            if (!$this->validate($rules)) {
                 session()->setFlashdata('pesan', ['type' => 'error', 'message' => 'Upload gagal! Pastikan file berupa gambar (PNG/JPG) maksimal 2MB.']);
                 return redirect()->to('/tentang');
            }

            // Pindahkan dan timpa file logo-sekolah.png di folder public
            $filepath = ROOTPATH . 'public/logo-sekolah.png';
            if(file_exists($filepath)) {
                unlink($filepath); // hapus yang lama
            }
            $fileLogo->move(ROOTPATH . 'public', 'logo-sekolah.png');

            session()->setFlashdata('pesan', ['type' => 'success', 'message' => 'Logo sekolah berhasil diperbarui!']);
        } else {
            session()->setFlashdata('pesan', ['type' => 'error', 'message' => 'Harap pilih file gambar logo terlebih dahulu.']);
        }

        return redirect()->to('/tentang');
    }

    // Form Tambah Item (Identitas/Misi/Tujuan/Nilai)
    public function create_item($kategori)
    {
        $data = [
            'title'    => 'Tambah Data ' . ucfirst(str_replace('_', ' ', $kategori)),
            'kategori' => $kategori,
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];
        return view('pages/tentang_admin/form_item', $data);
    }

    // Simpan Item
    public function store_item($kategori)
    {
        $rules = ['konten' => 'required'];
        if ($kategori === 'identitas' || $kategori === 'nilai') {
            $rules['judul'] = 'required';
        }

        if (!$this->validate($rules)) {
            return redirect()->to('/tentang-admin/create-item/' . $kategori)->withInput()->with('validation', $this->validator);
        }

        $this->halamanModel->save([
            'halaman'     => 'tentang',
            'kategori'    => $kategori,
            'judul'       => $this->request->getPost('judul'),
            'konten'      => $this->request->getPost('konten'),
            'gambar_icon' => $this->request->getPost('gambar_icon') ?: null,
        ]);

        session()->setFlashdata('pesan', ['type' => 'success', 'message' => 'Data berhasil ditambahkan!']);
        return redirect()->to('/tentang');
    }

    // Form Edit Item
    public function edit_item($id)
    {
        $item = $this->halamanModel->find($id);
        if (!$item) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data tidak ditemukan.');

        $data = [
            'title'    => 'Edit Data ' . ucfirst(str_replace('_', ' ', $item['kategori'])),
            'item'     => $item,
            'kategori' => $item['kategori'],
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];
        return view('pages/tentang_admin/form_item', $data);
    }

    // Update Item
    public function update_item($id)
    {
        $item = $this->halamanModel->find($id);
        if (!$item) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data tidak ditemukan.');

        $kategori = $item['kategori'];
        $rules = ['konten' => 'required'];
        if ($kategori === 'identitas' || $kategori === 'nilai') {
            $rules['judul'] = 'required';
        }

        if (!$this->validate($rules)) {
            return redirect()->to('/tentang-admin/edit-item/' . $id)->withInput()->with('validation', $this->validator);
        }

        $this->halamanModel->update($id, [
            'judul'       => $this->request->getPost('judul'),
            'konten'      => $this->request->getPost('konten'),
            'gambar_icon' => $this->request->getPost('gambar_icon') ?: null,
        ]);

        session()->setFlashdata('pesan', ['type' => 'success', 'message' => 'Data berhasil diperbarui!']);
        return redirect()->to('/tentang');
    }

    // Hapus Item
    public function delete_item($id)
    {
        $this->halamanModel->delete($id);
        session()->setFlashdata('pesan', ['type' => 'success', 'message' => 'Data berhasil dihapus!']);
        return redirect()->to('/tentang-admin');
    }
}
