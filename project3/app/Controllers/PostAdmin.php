<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PostAdmin extends BaseController
{
    public function index()
    {
        $post = new PostModel();
        $data['posts'] = $post->findAll();
        return view('admin/admin_post_list', $data);
    }

    //--------------------------------------------------------------

    public function preview(int $id)
    {
        $post = new PostModel();
        $data['post'] = $post->where('id', $id)->first();

        if (!$data['post']) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('post_detail', $data);
    }

    //--------------------------------------------------------------

    public function create()
    {
        $categoryModel = new CategoryModel();

        // ambil kategori
        $data['categories'] = $categoryModel->findAll();

        // validasi
        $validation = \Config\Services::validation();
        $validation->setRules(['title' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        // kalau valid → simpan
        if ($isDataValid) {
            $post = new PostModel();
            $post->insert([
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status'),
                "category_id" => $this->request->getPost('category_id'), // 🔥 INI PENTING
                "slug" => url_title($this->request->getPost('title'), '-', TRUE)
            ]);

            return redirect('admin/post');
        }

        // tampilkan form
        return view('admin/admin_post_create', $data);
    }

    //--------------------------------------------------------------

    public function edit(int $id)
    {
        $post = new PostModel();
        $categoryModel = new CategoryModel();

        $data['post'] = $post->where('id', $id)->first();
        $data['categories'] = $categoryModel->findAll(); // 🔥 buat dropdown edit

        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'title' => 'required'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $post->update($id, [
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status'),
                "category_id" => $this->request->getPost('category_id') // 🔥 update juga
            ]);

            return redirect('admin/post');
        }

        return view('admin/admin_post_update', $data);
    }

    //--------------------------------------------------------------

    public function delete(int $id)
    {
        $post = new PostModel();
        $post->delete($id);

        return redirect('admin/post');
    }
}