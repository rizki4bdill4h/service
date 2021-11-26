<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $data = [
            'base' => $this->blogsModel->findAll()
        ];
        return view('index', $data);
    }
    public function about()
    {
        return view('about');
    }
    public function gallery()
    {
        return view('gallery');
    }
}
