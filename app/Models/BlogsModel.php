<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogsModel extends Model
{
    protected $table      = 'blogs';
    protected $allowedFields = ['judul', 'slug', 'text_satu', 'text_dua', 'gambar_judul', 'gambar_satu', 'gambar_dua'];
    protected $useTimestamps = true;

    public function getBlogs($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    public function search($keyword)
    {
        // $builder = $this->table('blogs_user');
        // $builder->like('judul', $keyword);
        // return $builder;
        return $this->table('blogs')->like('judul', $keyword);
    }
}
