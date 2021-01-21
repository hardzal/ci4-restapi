<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;

class MataKuliah extends ResourceController {
    protected $format       = 'json';
    protected $modelName    = 'App\Models\MataKuliahModel';
    // public function __construct()
    // {
    //     $this->model = new MataKuliahModel();
    // }

    public function index() {
        $data = [
            'message' => 'success',
            'data' => $this->model->findAll()
        ];

        return $this->response->setStatusCode(200)->setJSON($data);
    }

    public function show($id = null) {
        $data = [
            'message' => 'success',
            'data' => $this->model->find($id)
        ];

        return $this->respond($data, 200);
    }

    public function create() {
        $validate = $this->validate(
            $this->model->getValidationRules(),
            $this->model->getValidationMessages()
        );
 
        if($validate) {
            $this->model->save(
                $this->request->getPost()
            );

            $response = [
                'data' => $this->request->getPost(),
                'message' => 'success',
            ];
        } else {
            $response = [
                'message' => 'fail',
                'errors' => $this->validator->getErrors()
            ];
        }
        
        return $this->respond($response, 201);
    }

    public function update($id = null) {

    }

    public function delete($id = null) {

    }
}