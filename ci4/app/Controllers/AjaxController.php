<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ArtikelModel;

class AjaxController extends Controller
{
    public function index()
    {
        // Menampilkan view ajax/index.php
        return view('ajax/index');
    }

    public function getData()
    {
        $model = new ArtikelModel();

        // Ambil parameter sorting dari request
        $sortBy = $this->request->getGet('sortBy') ?? 'id';
        $sortType = $this->request->getGet('sortType') ?? 'asc';

        $data = $model
            ->where('status', 1) // ⬅️ penting! hanya artikel public
            ->orderBy($sortBy, $sortType)
            ->findAll();

        return $this->response->setJSON($data);
    }

    public function save()
    {
        $model = new ArtikelModel();

        $data = $this->request->getJSON(true); // menerima data JSON dari Vue

        $model->insert([
            'judul' => $data['judul'],
            'isi' => $data['isi'],
            'status' => $data['status'],
            'slug' => url_title($data['judul'], '-', true),
        ]);

        return $this->response->setJSON(['status' => 'OK']);
    }

    public function update($id = null)
    {
        $model = new ArtikelModel();

        $data = $this->request->getJSON(true);

        $model->update($id, [
            'judul' => $data['judul'],
            'isi' => $data['isi'],
            'status' => $data['status'],
            'slug' => url_title($data['judul'], '-', true),
        ]);

        return $this->response->setJSON(['status' => 'Updated']);
    }

    public function delete($id = null)
    {
        $model = new ArtikelModel();

        if ($id && $model->find($id)) {
            $model->delete($id);
            return $this->response->setJSON(['status' => 'OK']);
        }

        return $this->response->setStatusCode(404)->setJSON(['status' => 'Not Found']);
    }
}
