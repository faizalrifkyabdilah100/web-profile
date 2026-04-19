<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Menampilkan halaman login
     */
    public function login()
    {
        // Jika sudah login, redirect ke home
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }

        return view('pages/auth/login', [
            'title' => 'Login',
        ]);
    }

    /**
     * Proses autentikasi login
     */
    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            session()->setFlashdata('error', 'Username atau password salah.');
            return redirect()->to('/auth/login')->withInput();
        }

        // Set session data
        session()->set([
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'nama'      => $user['nama'],
            'role'      => $user['role'],
            'logged_in' => true,
        ]);

        session()->setFlashdata('pesan', [
            'type'    => 'success',
            'message' => 'Selamat datang, ' . $user['nama'] . '!',
        ]);

        return redirect()->to('/');
    }

    /**
     * Logout dan hapus session
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
