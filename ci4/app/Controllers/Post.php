<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ArtikelModel;

class Post extends ResourceController
{
    protected $format = 'json';

    // GET /post
    public function index()
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->findAll();

        return $this->respond($data);
    }

    // POST /post
    public function create()
    {
        $model = new ArtikelModel();

        $data = [
            'judul' => $this->request->getVar('judul'),
            'isi' => $this->request->getVar('isi'),
            'status' => $this->request->getVar('status'),
        ];

        $model->insert($data);

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Data artikel berhasil ditambahkan.'
            ]
        ];

        return $this->respondCreated($response);
    }

    // PUT /post/{id}
    public function update($id = null)
    {
        $model = new ArtikelModel();

        $data = [
            'judul' => $this->request->getVar('judul'),
            'isi' => $this->request->getVar('isi'),
            'status' => $this->request->getVar('status'),
        ];

        $model->update($id, $data);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data artikel berhasil diubah.'
            ]
        ];

        return $this->respond($response);
    }

    // DELETE /post/{id}
    public function delete($id = null)
    {
        $model = new ArtikelModel();
        $data = $model->find($id);

        if ($data) {
            $model->delete($id);

            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data artikel berhasil dihapus.'
                ]
            ];

            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}
