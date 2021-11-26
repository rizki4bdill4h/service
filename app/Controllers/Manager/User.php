<?php

namespace App\Controllers\Manager;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        $authModel = new \App\Models\AuthModel();
        $auth = $authModel->authAll();
        $data = [
            'blogs' => $auth
        ];
        return view('user/index', $data);
    }
    public function managerblogs()
    {
        $currentPage =  $this->request->getVar('page_blogs_user') ? $this->request->getVar('page_blogs_user') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $cari =  $this->blogsModel->search($keyword);
        } else {
            $cari = $this->blogsModel;
        }
        $data = [
            'pager_blogs' => $cari->paginate(5, 'blogs_user'),
            'pager' => $this->blogsModel->pager,
            'currentPage' => $currentPage
        ];
        return view('user/managerblogs', $data);
    }

    // ======auth_user
    public function akun()
    {
        $authModel = new \App\Models\AuthModel();
        $auth = $authModel->findAll();
        $data = [
            'user' => $auth
        ];
        // dd($auth);
        return view('user/akun', $data);
    }
}
