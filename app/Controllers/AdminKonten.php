<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HalamanDinamisModel;

class AdminKonten extends BaseController
{
    protected $halamanModel;

    public function __construct()
    {
        $this->halamanModel = new HalamanDinamisModel();
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

    // Mengupdate Hero Banner Beranda
    public function update_hero()
    {
        $fileHero = $this->request->getFile('hero');

        if ($fileHero && $fileHero->isValid() && !$fileHero->hasMoved()) {
            $rules = [
                'hero' => 'uploaded[hero]|max_size[hero,5120]|is_image[hero]|mime_in[hero,image/png,image/jpeg,image/jpg,image/webp]'
            ];

            if (!$this->validate($rules)) {
                 session()->setFlashdata('pesan', ['type' => 'error', 'message' => 'Upload gagal! Pastikan file berupa gambar maksimal 5MB.']);
                 return redirect()->to('/');
            }

            $filepath = ROOTPATH . 'public/hero-bg.jpg';
            if(file_exists($filepath)) {
                unlink($filepath); 
            }
            $fileHero->move(ROOTPATH . 'public', 'hero-bg.jpg');

            session()->setFlashdata('pesan', ['type' => 'success', 'message' => 'Gambar Beranda berhasil diperbarui!']);
        } else {
            session()->setFlashdata('pesan', ['type' => 'error', 'message' => 'Harap pilih file gambar terlebih dahulu.']);
        }

        return redirect()->to('/');
    }

    // Form Tambah Item (Identitas/Misi/Tujuan/Nilai dsbg)
    public function create_item($halaman, $kategori)
    {
        $data = [
            'title'    => 'Tambah Data ' . ucfirst(str_replace('_', ' ', $kategori)),
            'kategori' => $kategori,
            'halaman'  => $halaman,
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];
        return view('pages/admin_konten/form_item', $data);
    }

    // Simpan Item
    public function store_item($halaman, $kategori)
    {
        $rules = ['konten' => 'required'];
        if (in_array($kategori, ['identitas', 'nilai', 'fitur', 'statistik', 'prestasi', 'program_unggulan', 'akademik', 'ekstrakurikuler', 'ekstra'])) {
            $rules['judul'] = 'required';
        }

        if (!$this->validate($rules)) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->back()->withInput();
        }

        // Proses gambar icon
        $gambarIcon = $this->request->getPost('gambar_icon'); // Ini untuk fitur, nilai, ekstrakurikuler
        if (in_array($kategori, ['program_unggulan', 'akademik'])) {
            $gambarIcon = $this->request->getPost('gambar_icon_lama') ?: '';
        }

        $file = $this->request->getFile('gambar_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);
            $uploadedUrl = 'uploads/' . $newName;
            
            if ($kategori === 'akademik') {
                $icon = $this->request->getPost('ikon_pendukung') ?: 'book-open';
                $gambarIcon = $uploadedUrl . ';' . $icon;
            } else {
                $gambarIcon = $uploadedUrl;
            }
        } else {
            // Jika tidak ada upload, tapi user ganti icon pendukung (akademik)
            if ($kategori === 'akademik') {
                $oldParts = explode(';', $gambarIcon);
                $oldImg = $oldParts[0] ?? '';
                $icon = $this->request->getPost('ikon_pendukung') ?: 'book-open';
                $gambarIcon = $oldImg . ';' . $icon;
            }
        }

        $this->halamanModel->save([
            'halaman'     => $halaman,
            'kategori'    => $kategori,
            'judul'       => $this->request->getPost('judul'),
            'konten'      => $this->request->getPost('konten'),
            'gambar_icon' => $gambarIcon,
        ]);

        session()->setFlashdata('pesan', ['type' => 'success', 'message' => 'Data berhasil ditambahkan!']);
        return redirect()->to('/' . ($halaman == 'beranda' ? '' : $halaman));
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
            'halaman'  => $item['halaman'],
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];
        return view('pages/admin_konten/form_item', $data);
    }

    // Update Item
    public function update_item($id)
    {
        $item = $this->halamanModel->find($id);
        if (!$item) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data tidak ditemukan.');

        $kategori = $item['kategori'];
        $rules = ['konten' => 'required'];
        if (in_array($kategori, ['identitas', 'nilai', 'fitur', 'statistik', 'prestasi', 'program_unggulan', 'akademik', 'ekstrakurikuler', 'ekstra'])) {
            $rules['judul'] = 'required';
        }

        if (!$this->validate($rules)) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->back()->withInput();
        }

        // Proses gambar icon
        $gambarIcon = $this->request->getPost('gambar_icon'); // Ini untuk fitur, nilai, ekstrakurikuler
        if (in_array($kategori, ['program_unggulan', 'akademik'])) {
            $gambarIcon = $this->request->getPost('gambar_icon_lama') ?: '';
        }

        $file = $this->request->getFile('gambar_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);
            $uploadedUrl = 'uploads/' . $newName;
            
            if ($kategori === 'akademik') {
                $icon = $this->request->getPost('ikon_pendukung') ?: 'book-open';
                $gambarIcon = $uploadedUrl . ';' . $icon;
            } else {
                $gambarIcon = $uploadedUrl;
            }
        } else {
            // Jika tidak ada upload, tapi user ganti icon pendukung (akademik)
            if ($kategori === 'akademik') {
                $oldParts = explode(';', $gambarIcon);
                $oldImg = $oldParts[0] ?? '';
                $icon = $this->request->getPost('ikon_pendukung') ?: 'book-open';
                $gambarIcon = $oldImg . ';' . $icon;
            }
        }

        $this->halamanModel->update($id, [
            'judul'       => $this->request->getPost('judul'),
            'konten'      => $this->request->getPost('konten'),
            'gambar_icon' => $gambarIcon,
        ]);

        session()->setFlashdata('pesan', ['type' => 'success', 'message' => 'Data berhasil diperbarui!']);
        return redirect()->to('/' . ($item['halaman'] == 'beranda' ? '' : $item['halaman']));
    }

    // Hapus Item
    public function delete_item($id)
    {
        $item = $this->halamanModel->find($id);
        if($item) {
            $this->halamanModel->delete($id);
            session()->setFlashdata('pesan', ['type' => 'success', 'message' => 'Data berhasil dihapus!']);
            return redirect()->to('/' . ($item['halaman'] == 'beranda' ? '' : $item['halaman']));
        }
        return redirect()->back();
    }
}
