<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyMahasiswa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswaData = [
            [
                'id' => '1234',
                'password' => '1234',
                'email' => '1234@gmail.com',
                'no_telefon' => '1234'
            ]
        ];

        foreach($mahasiswaData as $key => $val){
            Mahasiswa::create($val);
        }
    }
}
