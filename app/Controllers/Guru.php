<?php

namespace App\Controllers;

use App\Models\GuruModel;

class Guru extends BaseController
{
    protected $guruModel;

    public function __construct()
    {
        $this->guruModel = new GuruModel();
    }

    /**
     * Menampilkan daftar semua guru
     */
    public function index()
    {
        $data = [
            'title' => 'Data Guru',
            'guru'  => $this->guruModel->orderBy('nama', 'ASC')->findAll(),
            'flash' => session()->getFlashdata('pesan'),
        ];

        return view('pages/guru/index', $data);
    }

    /**
     * Menampilkan form tambah guru
     */
    public function create()
    {
        $data = [
            'title'      => 'Tambah Data Guru',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
        ];

        return view('pages/guru/create', $data);
    }

    /**
     * Menyimpan data guru baru
     */
    public function store()
    {
        // Validasi input
        if (!$this->validate($this->guruModel->getValidationRules(), $this->guruModel->getValidationMessages())) {
            return redirect()->to('/guru/create')
                ->withInput()
                ->with('validation', $this->validator);
        }

        // Handle upload foto
        $foto = $this->request->getFile('foto');
        $namaFoto = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/guru', $namaFoto);
        }

        // Simpan data
        $this->guruModel->save([
            'nip'            => $this->request->getPost('nip'),
            'nama'           => $this->request->getPost('nama'),
            'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
            'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'  => $this->request->getPost('tanggal_lahir') ?: null,
            'jabatan'        => $this->request->getPost('jabatan'),
            'mata_pelajaran' => $this->request->getPost('mata_pelajaran'),
            'no_telepon'     => $this->request->getPost('no_telepon'),
            'alamat'         => $this->request->getPost('alamat'),
            'foto'           => $namaFoto,
        ]);

        session()->setFlashdata('pesan', [
            'type'    => 'success',
            'message' => 'Data guru berhasil ditambahkan!',
        ]);

        return redirect()->to('/guru');
    }

    /**
     * Menampilkan form edit guru
     */
    public function edit($id)
    {
        $guru = $this->guruModel->find($id);

        if (!$guru) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data guru tidak ditemukan.');
        }

        $data = [
            'title'      => 'Edit Data Guru',
            'guru'       => $guru,
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
        ];

        return view('pages/guru/edit', $data);
    }

    /**
     * Mengupdate data guru
     */
    public function update($id)
    {
        $guru = $this->guruModel->find($id);

        if (!$guru) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data guru tidak ditemukan.');
        }

        // Validasi input
        if (!$this->validate($this->guruModel->getValidationRules(), $this->guruModel->getValidationMessages())) {
            return redirect()->to('/guru/edit/' . $id)
                ->withInput()
                ->with('validation', $this->validator);
        }

        // Handle upload foto
        $foto = $this->request->getFile('foto');
        $namaFoto = $guru['foto']; // Tetap pakai foto lama jika tidak upload baru

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/guru', $namaFoto);

            // Hapus foto lama jika ada
            if ($guru['foto'] && file_exists('uploads/guru/' . $guru['foto'])) {
                unlink('uploads/guru/' . $guru['foto']);
            }
        }

        // Update data
        $this->guruModel->update($id, [
            'nip'            => $this->request->getPost('nip'),
            'nama'           => $this->request->getPost('nama'),
            'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
            'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'  => $this->request->getPost('tanggal_lahir') ?: null,
            'jabatan'        => $this->request->getPost('jabatan'),
            'mata_pelajaran' => $this->request->getPost('mata_pelajaran'),
            'no_telepon'     => $this->request->getPost('no_telepon'),
            'alamat'         => $this->request->getPost('alamat'),
            'foto'           => $namaFoto,
        ]);

        session()->setFlashdata('pesan', [
            'type'    => 'success',
            'message' => 'Data guru berhasil diperbarui!',
        ]);

        return redirect()->to('/guru');
    }

    /**
     * Menghapus data guru
     */
    public function delete($id)
    {
        $guru = $this->guruModel->find($id);

        if (!$guru) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data guru tidak ditemukan.');
        }

        // Hapus foto jika ada
        if ($guru['foto'] && file_exists('uploads/guru/' . $guru['foto'])) {
            unlink('uploads/guru/' . $guru['foto']);
        }

        $this->guruModel->delete($id);

        session()->setFlashdata('pesan', [
            'type'    => 'success',
            'message' => 'Data guru berhasil dihapus!',
        ]);

        return redirect()->to('/guru');
    }
}
