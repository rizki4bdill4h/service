<?php

namespace App\Controllers\Manager;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $AuthModel;
    public function __construct()
    {
        $this->authModel = new AuthModel();
    }
    public function index()
    {
        return redirect()->to(site_url('auth/login'));
    }
    public function login()
    {
        if (session('id')) {
            return redirect()->to(site_url('/auth/login'));
        }
        $data = [
            'web' => 'hello word'
        ];
        return
            view('/auth/login', $data);
    }
    public function process_login()
    {
        $name = $this->request->getVar('name');
        $password = $this->request->getVar('password');
        $user = $this->authModel->getWhere(['name' => $name])->getRowArray();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                session()->set('id',  $user['id']);
                return redirect()->to(site_url('/user'));
            } else {
                return redirect()->back()->with('error', 'password salah');
            }
        } else
            return redirect()->back()->with('error', 'username tidak di temukan');
    }
    public function logout()
    {
        session()->destroy();
        session()->remove('id');
        return redirect()->to(site_url('/auth/login'));
    }

    public function register()
    {
        $data = [
            'title' => 'Form Tambah data komik',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/register', $data);
    }
    public function save_register()
    {

        //validasi iput form insert auth
        if (!$this->validate(
            [
                'name' => [
                    'rules' => 'required|min_length[5]|is_unique[auth_user.name]',
                    'errors' => [
                        'required' => 'username harus di isi',
                        'is_unique' => '{field} sudah ada',
                        'min_length' => '{field} kurang panjnag'

                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[auth_user.email]',
                    'errors' => [
                        'required' => 'email harus di isi',
                        'is_unique' => '{field} sudah ada',
                        'valid_email' => 'email tidak terdaftar'
                    ]
                ],
                'password_satu' => [
                    'rules' => 'required|min_length[4]|matches[password_dua]',
                    'errors' => [
                        'required' => 'password harus di isi',
                        'min_length' => 'password kurang',
                        'matches' => 'password tidak sama'
                    ]
                ],
                'password_dua' => [
                    'rules' => 'required|matches[password_satu]',
                    'errors' => [
                        'required' => 'password harus di isi',
                        'min_length' => 'password kurang',
                        'matches' => 'password tidak sama'
                    ]
                ]
            ]
        )) {
            // ambil pesa kesalahanya
            $validation = \Config\Services::validation();
            return redirect()->to('/auth/register')->withInput()->with('validation', $validation);
        }
        $this->authModel->save([
            'name' => htmlspecialchars($this->request->getVar('name')),
            'email' => htmlspecialchars($this->request->getVar('email')),
            'password' => password_hash($this->request->getVar('password_satu'), PASSWORD_DEFAULT),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan silahkan login');
        return redirect()->to(site_url('/auth/login'));
    }
}
