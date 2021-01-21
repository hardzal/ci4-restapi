<?php 
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MataKuliahSeeder extends Seeder {
    public function run() {
        $data = [
            'kode' => '123600002',
            'name' => 'Bahasa Inggris',
            'keterangan' => 'mempelajari bahasa inggris dengan baik'
        ];

        $this->db->table('mata_kuliah')->insert($data);
    }
}