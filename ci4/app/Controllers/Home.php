<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('layout/main');
    }

    public function admin()
    {
        return view('admin/home'); // ← Sesuaikan view ini dengan nama file yang ada
    }
}
