<?php

namespace App\Controllers;

use App\Models\MataPelajaranModel;

class MataPelajaran extends BaseController
{
    protected $mapelModel;

    public function __construct()
    {
        $this->mapelModel = new MataPelajaranModel();
    }

    /**
     * Menampilkan daftar semua mata pelajaran
     */
    public function index()
    {
        $data = [
            'title' => 'Data Mata Pelajaran',
            'mapel' => $this->mapelModel->orderBy('nama', 'ASC')->findAll(),
            'flash' => session()->getFlashdata('pesan'),
        ];

        return view('pages/mata-pelajaran/index', $data);
    }

    /**
     * Menampilkan form tambah mata pelajaran
     */
    public function create()
    {
        $data = [
            'title'      => 'Tambah Mata Pelajaran',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
        ];

        return view('pages/mata-pelajaran/create', $data);
    }

    /**
     * Menyimpan data mata pelajaran baru
     */
    public function store()
    {
        if (!$this->validate($this->mapelModel->getValidationRules(), $this->mapelModel->getValidationMessages())) {
            return redirect()->to('/mata-pelajaran/create')
                ->withInput()
                ->with('validation', $this->validator);
        }

        $this->mapelModel->save([
            'kode'      => $this->request->getPost('kode'),
            'nama'      => $this->request->getPost('nama'),
            'kelompok'  => $this->request->getPost('kelompok'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        session()->setFlashdata('pesan', [
            'type'    => 'success',
            'message' => 'Data mata pelajaran berhasil ditambahkan!',
        ]);

        return redirect()->to('/mata-pelajaran');
    }

    /**
     * Menampilkan form edit mata pelajaran
     */
    public function edit($id)
    {
        $mapel = $this->mapelModel->find($id);

        if (!$mapel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data mata pelajaran tidak ditemukan.');
        }

        $data = [
            'title'      => 'Edit Mata Pelajaran',
            'mapel'      => $mapel,
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
        ];

        return view('pages/mata-pelajaran/edit', $data);
    }

    /**
     * Mengupdate data mata pelajaran
     */
    public function update($id)
    {
        $mapel = $this->mapelModel->find($id);

        if (!$mapel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data mata pelajaran tidak ditemukan.');
        }

        if (!$this->validate($this->mapelModel->getValidationRules(), $this->mapelModel->getValidationMessages())) {
            return redirect()->to('/mata-pelajaran/edit/' . $id)
                ->withInput()
                ->with('validation', $this->validator);
        }

        $this->mapelModel->update($id, [
            'kode'      => $this->request->getPost('kode'),
            'nama'      => $this->request->getPost('nama'),
            'kelompok'  => $this->request->getPost('kelompok'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        session()->setFlashdata('pesan', [
            'type'    => 'success',
            'message' => 'Data mata pelajaran berhasil diperbarui!',
        ]);

        return redirect()->to('/mata-pelajaran');
    }

    /**
     * Menghapus data mata pelajaran
     */
    public function delete($id)
    {
        $mapel = $this->mapelModel->find($id);

        if (!$mapel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data mata pelajaran tidak ditemukan.');
        }

        $this->mapelModel->delete($id);

        session()->setFlashdata('pesan', [
            'type'    => 'success',
            'message' => 'Data mata pelajaran berhasil dihapus!',
        ]);

        return redirect()->to('/mata-pelajaran');
    }
}
