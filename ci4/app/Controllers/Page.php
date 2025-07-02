<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Page extends BaseController
{
    public function about()
    {
        return view('about', [
            'title' => 'Halaman About',
            'content' => 'Ini adalah halaman about yang menjelaskan tentang isi halaman ini.'
        ]);
    }

    public function contact()
    {
        $data = [
            'title' => 'Halaman Kontak',
            'email' => 'eka610407@gmail.com',
            'alamat' => 'Sukadami, Cikarang',
            'telepon' => '+62 877-7251-8549'
        ];

        return view('contact', $data);
    }

    public function faqs()
    {
        echo "Ini halaman FAQ";
    }

    public function tos()
    {
        echo "Ini halaman Term of Services";
    }

    // Method untuk menampilkan daftar artikel
    public function artikel()
    {
        $artikelModel = new ArtikelModel();
        $data['artikel'] = $artikelModel
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('artikel/index', $data);
    }


    // Misalnya di Page.php atau Home.php
    public function index()
    {
        $model = new \App\Models\ArtikelModel();
        $data['artikel'] = $model->where('status', 1)->orderBy('id', 'DESC')->findAll();

        return view('artikel/components/artikel_terkini', $data);
    }

}
