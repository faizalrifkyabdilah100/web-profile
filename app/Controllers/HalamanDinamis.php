<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HalamanDinamisModel;

class HalamanDinamis extends BaseController
{
    protected $halamanModel;

    public function __construct()
    {
        $this->halamanModel = new HalamanDinamisModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Manajemen Konten Halaman',
            'konten'  => $this->halamanModel->orderBy('halaman', 'ASC')->orderBy('kategori', 'ASC')->findAll(),
            'flash'   => session()->getFlashdata('pesan'),
        ];

        return view('pages/halaman_dinamis/index', $data);
    }

    public function create()
    {
        $data = [
            'title'      => 'Tambah Konten Halaman',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
        ];

        return view('pages/halaman_dinamis/create', $data);
    }

    public function store()
    {
        // Validasi input
        $rules = [
            'halaman'  => 'required',
            'kategori' => 'required',
            'judul'    => 'required',
            'konten'   => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/halaman-dinamis/create')
                ->withInput()
                ->with('validation', $this->validator);
        }

        $this->halamanModel->save([
            'halaman'     => $this->request->getPost('halaman'),
            'kategori'    => $this->request->getPost('kategori'),
            'judul'       => $this->request->getPost('judul'),
            'konten'      => $this->request->getPost('konten'),
            'gambar_icon' => $this->request->getPost('gambar_icon') ?: null,
        ]);

        session()->setFlashdata('pesan', [
            'type'    => 'success',
            'message' => 'Konten berhasil ditambahkan!',
        ]);

        return redirect()->to('/halaman-dinamis');
    }

    public function edit($id)
    {
        $konten = $this->halamanModel->find($id);

        if (!$konten) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data tidak ditemukan.');
        }

        $data = [
            'title'      => 'Edit Konten',
            'konten'     => $konten,
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
        ];

        return view('pages/halaman_dinamis/edit', $data);
    }

    public function update($id)
    {
        $konten = $this->halamanModel->find($id);

        if (!$konten) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data tidak ditemukan.');
        }

        // Validasi input
        $rules = [
            'halaman'  => 'required',
            'kategori' => 'required',
            'judul'    => 'required',
            'konten'   => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/halaman-dinamis/edit/' . $id)
                ->withInput()
                ->with('validation', $this->validator);
        }

        $this->halamanModel->update($id, [
            'halaman'     => $this->request->getPost('halaman'),
            'kategori'    => $this->request->getPost('kategori'),
            'judul'       => $this->request->getPost('judul'),
            'konten'      => $this->request->getPost('konten'),
            'gambar_icon' => $this->request->getPost('gambar_icon') ?: null,
        ]);

        session()->setFlashdata('pesan', [
            'type'    => 'success',
            'message' => 'Konten berhasil diperbarui!',
        ]);

        return redirect()->to('/halaman-dinamis');
    }

    public function delete($id)
    {
        $konten = $this->halamanModel->find($id);

        if (!$konten) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data tidak ditemukan.');
        }

        $this->halamanModel->delete($id);

        session()->setFlashdata('pesan', [
            'type'    => 'success',
            'message' => 'Konten berhasil dihapus!',
        ]);

        return redirect()->to('/halaman-dinamis');
    }
}
