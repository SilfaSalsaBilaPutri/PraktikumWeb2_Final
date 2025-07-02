<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'artikel'; // Pastikan tabel di database bernama 'artikel'
    protected $primaryKey = 'id';

    protected $allowedFields = ['judul', 'isi', 'status'];

    protected $useTimestamps = true; // opsional, kalau kamu punya kolom created_at / updated_at
}
