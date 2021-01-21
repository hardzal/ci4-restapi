<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MahasiswaModel;

class Mahasiswa extends ResourceController {
    use ResponseTrait;

    public function index() {
        $model = new MahasiswaModel();
        $data = $model->findAll();
        $respond = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => $model->countAllResults() . ' Data found!'
            ],  
            'data' => $data
        ];

        if(!$data) {
            $respond['messages']['success'] = 'Data not found!';
        }

        return $this->respond($respond, 200);
    }

    public function show($id = null){ 
        $model = new MahasiswaModel();
        $data = $model->getWhere(['id' => $id])->getResult();

        $respond = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data found!'
            ],  
            'data' => $data
        ];
        
        if($data) {
            return $this->respond($respond, 200);
        } 
        
        return $this->failNotFound('No data found with id '. $id);
    }

    public function create() {
        $model = new MahasiswaModel();
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan')
        ];

        $data= json_decode(file_get_contents("php://input"));
        $model->insert($data);
        $response  = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Data created!'
            ],
            'data' => $data
        ];

        return $this->respondCreated($response, 201);
    }

    public function update($id = null) {
        $model = new MahasiswaModel();
        $json = $this->request->getJSON();

        if($json) {
            $data = [
                'nim' => $json->nim,
                'nama' => $json->nama,
                'jurusan' => $json->jurusan
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'nim' => $input['nim'],
                'nama' => $input['nama'],
                'jurusan' => $input['jurusan']
            ];
        }

        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'message' => [
                'success' => 'Data updated!'
            ],
            'data' => $data
        ];

        return $this->respond($response, 200);
    }

    public function delete($id = null) {
        $model = new MahasiswaModel();
        $data = $model->find($id);
        if($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data deleted!'
                ],
            ];

            return $this->respondDeleted($response);
        }

        return $this->failNotFound('No data found with id '. $id);
    }
}