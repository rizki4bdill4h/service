<?php

namespace App\Controllers;

class Blogs extends BaseController
{
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $cari =  $this->blogsModel->search($keyword);
        } else {
            $cari = $this->blogsModel;
        }
        $data = [
            'pager_blogs' => $cari->paginate(6, 'blogs_user'),
            'pager' => $this->blogsModel->pager,
        ];
        return view('blogs/index', $data);
    }
    public function createblogs()
    {
        $data = [
            'title' => 'form tambah data blogs',
            'validation' => \Config\Services::validation(),
        ];
        return view('blogs/createblogs', $data);
    }

    public function saveblogs()
    {
        // validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[blogs.judul]',
                'errors' => [
                    'required' => '{field} blog harus di isi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'gambar_judul' => [
                'rules' => 'uploaded[gambar_judul]|max_size[gambar_judul,2048]|is_image[gambar_judul]|mime_in[gambar_judul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'gambar judul tidak boleh kosong.',
                    'max_size' => 'Ukuran gambar judul terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'gambar_satu' => [
                'rules' => 'uploaded[gambar_satu]|max_size[gambar_satu,2048]|is_image[gambar_satu]|mime_in[gambar_satu,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar judul terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'gambar_dua' => [
                'rules' => 'uploaded[gambar_dua]|max_size[gambar_dua,2048]|is_image[gambar_dua]|mime_in[gambar_dua,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar judul terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to(site_url('/blogs/createBlogs'))->withInput()->with('validation', $validation);
            return redirect()->to(site_url('/blogs/createblogs'))->withInput();
        }
        //  ambil gambar di sini 
        $gambarJudul = $this->request->getFile('gambar_judul');
        $gambarJudul_satu = $this->request->getFile('gambar_satu');
        $gambarJudul_dua = $this->request->getFile('gambar_dua');
        // generate nama sampul random
        $namaGambar_judul = $gambarJudul->getRandomName();
        $namaGambar_satu = $gambarJudul_satu->getRandomName();
        $namaGambar_dua = $gambarJudul_dua->getRandomName();
        //  pindahkan gambar ke folder seharusnya
        $gambarJudul->move('asset/gambar/blogs/sampul', $namaGambar_judul);
        $gambarJudul_satu->move('asset/gambar/blogs/gambar_satu', $namaGambar_satu);
        $gambarJudul_dua->move('asset/gambar/blogs/gambar_dua', $namaGambar_dua);
        // ambil nama filenya gambar judul
        // $namaGambar_judul = $gambarJudul->getName();


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->blogsModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'text_satu' => $this->request->getVar('text_satu'),
            'text_dua' => $this->request->getVar('text_dua'),
            'gambar_judul' => $namaGambar_judul,
            'gambar_satu' => $namaGambar_satu,
            'gambar_dua' =>  $namaGambar_dua,
        ]);
        session()->setFlashdata('pesan', 'data berhasil di tambahkan');
        return redirect()->to(site_url('/user/managerblogs'));
    }

    public function detailblogs($slug)
    {
        $data = [
            'title' => ' detail blog',
            'blogs' => $this->blogsModel->getBlogs($slug)
        ];
        // jika blok tidak ada di web tampilkan halaman error dengan exeption
        if (empty($data['blogs'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('judul blogs ' . $slug . ' tidak di temukan.');
        }
        return view('blogs/detailblogs', $data);
    }

    public function deleteblogs($id)
    {
        // cari gambar berdasarkan id
        $blogs = $this->blogsModel->find($id);
        // hapus gambar
        unlink('asset/gambar/blogs/sampul/' . $blogs['gambar_judul']);
        unlink('asset/gambar/blogs/gambar_satu/' . $blogs['gambar_satu']);
        unlink('asset/gambar/blogs/gambar_dua/' . $blogs['gambar_dua']);
        $this->blogsModel->delete($id);
        session()->setFlashdata('pesan', 'data berhasil di hapus');
        return redirect()->to(site_url('/user/managerblogs'));
    }

    public function editblogs($slug)
    {
        $data = [
            'title' => 'form ubah data blogs',
            'validation' => \Config\Services::validation(),
            'blogs' => $this->blogsModel->getBlogs($slug)
        ];
        return view('blogs/editblogs', $data);
    }
    public function updateblogs($id)
    {
        // cek judulnya
        $blogsLama = $this->blogsModel->getBlogs($this->request->getVar('slug'));
        if ($blogsLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[blogs.judul]';
        }
        // validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} blog harus di isi',
                    'is_unique' => '{field} sudah ada'
                ],
                'gambar_judul' => [
                    'rules' => 'uploaded[gambar_judul]|max_size[gambar_judul,2048]|is_image[gambar_judul]|mime_in[gambar_judul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'gambar judul tidak boleh kosong.',
                        'max_size' => 'Ukuran gambar judul terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ],
                'gambar_satu' => [
                    'rules' => 'uploaded[gambar_satu]|max_size[gambar_satu,2048]|is_image[gambar_satu]|mime_in[gambar_satu,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'gambar judul tidak boleh kosong.',
                        'max_size' => 'Ukuran gambar judul terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ],
                'gambar_dua' => [
                    'rules' => 'uploaded[gambar_dua]|max_size[gambar_dua,2048]|is_image[gambar_dua]|mime_in[gambar_dua,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'gambar judul tidak boleh kosong.',
                        'max_size' => 'Ukuran gambar judul terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to(site_url('/blogs/editBlogs/' . $this->request->getVar('slug')))->withInput()->with('validation', $validation);
            return redirect()->to(site_url('/blogs/editblogs/' . $this->request->getVar('slug')))->withInput();
        }
        $fileGambar = $this->request->getFile('gambar_judul');
        // cek gambar apakah tetap gambar judul lama?
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            // generate nama file random
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan gambar ke folder seharusnya
            $fileGambar->move('asset/gambar/blogs/sampul',  $namaGambar);
            // hapus file yang lama 
            unlink('asset/gambar/blogs/sampul/' . $this->request->getVar('gambarLama'));
        }
        $fileGambar_satu = $this->request->getFile('gambar_satu');
        // cek gambar apakah tetap gambar1 lama?
        if ($fileGambar_satu->getError() == 4) {
            $namaGambar_satu = $this->request->getVar('gambarLama_satu');
        } else {
            // generate nama file random
            $namaGambar_satu = $fileGambar_satu->getRandomName();
            // pindahkan gambar ke folder seharusnya
            $fileGambar_satu->move('asset/gambar/blogs/gambar_satu',  $namaGambar_satu);
            // hapus file yang lama 
            unlink('asset/gambar/blogs/gambar_satu/' . $this->request->getVar('gambarLama_satu'));
        }
        $fileGambar_dua = $this->request->getFile('gambar_dua');
        // cek gambar apakah tetap gambar2 lama?
        if ($fileGambar_dua->getError() == 4) {
            $namaGambar_dua = $this->request->getVar('gambarLama2');
        } else {
            // generate nama file random
            $namaGambar_dua = $fileGambar_dua->getRandomName();
            // pindahkan gambar ke folder seharusnya
            $fileGambar_dua->move('asset/gambar/blogs/gambar_dua',  $namaGambar_dua);
            // hapus file yang lama 
            unlink('asset/gambar/blogs/gambar_dua/' . $this->request->getVar('gambarLama_dua'));
        }
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->blogsModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'text_satu' => $this->request->getVar('text_satu'),
            'text_dua' => $this->request->getVar('text_dua'),
            'gambar_judul' => $namaGambar,
            'gambar_satu' => $namaGambar_satu,
            'gambar_dua' =>  $namaGambar_dua
        ]);
        session()->setFlashdata('pesan', 'data berhasil di ubah');
        return redirect()->to(site_url('/user/managerblogs'));
    }
}
