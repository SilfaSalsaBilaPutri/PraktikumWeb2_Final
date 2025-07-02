<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul', 'isi', 'status', 'slug', 'gambar', 'id_kategori'];

    // ✅ Ambil semua artikel untuk user (hanya yang status = 1)
    public function getArtikelDenganKategori()
    {
        return $this->db->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori')
            ->where('artikel.status', 1) // ← Tambahkan ini
            ->get()
            ->getResultArray();
    }

    // ✅ Ambil artikel berdasarkan kategori (hanya yang status = 1)
    public function getArtikelByKategori($slug_kategori)
    {
        return $this->db->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori')
            ->where('kategori.slug_kategori', $slug_kategori)
            ->where('artikel.status', 1) // ← Tambahkan ini juga
            ->get()
            ->getResultArray();
    }
}
