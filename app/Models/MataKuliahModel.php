<?php

namespace App\Models;

use CodeIgniter\Model;

class MataKuliahModel extends Model {
    protected $table = 'mata_kuliah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode', 'name', 'keterangan'];

    protected $validationRules = [
        'name' => 'required',
        'kode' => 'required|numeric|max_length[10]|is_unique[mata_kuliah.kode]'
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Mohon beri nama pada mata kuliah Anda!'
        ],
        'kode' => [
            'numeric' => 'Harus angka!',
            'is_unique' => 'sudah ada sebelumnya!',
            'required' => 'mohon isi dengan lengkap!'
        ]
    ];
}