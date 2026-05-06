<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    // 🔥 INI YANG PALING PENTING (SUDAH DITAMBAH category_id)
    protected $allowedFields = [
        'title',
        'content',
        'status',
        'author',
        'slug',
        'category_id' // 🔥 WAJIB ADA
    ];
}