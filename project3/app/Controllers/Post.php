<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\CommentModel; // 🔥 TAMBAH INI
use CodeIgniter\Exceptions\PageNotFoundException;

class Post extends BaseController
{
    public function index()
    {
        $post = new PostModel();

        $data['posts'] = $post
            ->select('posts.*, categories.name as category_name')
            ->join('categories', 'categories.id = posts.category_id', 'left')
            ->where('status', 'published')
            ->findAll();

        return view('post', $data);
    }

    //------------------------------------------------------------

    public function viewPost($slug)
    {
        $post = new PostModel();
        $commentModel = new CommentModel(); // 🔥 TAMBAH INI

        $data['post'] = $post
            ->select('posts.*, categories.name as category_name')
            ->join('categories', 'categories.id = posts.category_id', 'left')
            ->where([
                'slug' => $slug,
                'status' => 'published'
            ])
            ->first();

        if (!$data['post']) {
            throw PageNotFoundException::forPageNotFound();
        }

        // 🔥 AMBIL KOMENTAR BERDASARKAN POST
        $data['comments'] = $commentModel
            ->where('post_id', $data['post']['id'])
            ->orderBy('created_at', 'DESC') // biar terbaru di atas
            ->findAll();

        return view('post_detail', $data);
    }

    //------------------------------------------------------------

    // 🔥 FUNCTION SIMPAN KOMENTAR
    public function comment()
    {
        $commentModel = new CommentModel();

        $commentModel->save([
            'post_id' => $this->request->getPost('post_id'),
            'username' => $this->request->getPost('username'),
            'content' => $this->request->getPost('content'),
        ]);

        return redirect()->to('/post/' . $this->request->getPost('slug'));
    }
}