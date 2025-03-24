<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyProgramStudi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programstudiData = [
            [
                'id_programstudi' => '70',
                'program_studi' => 'Teknik Mesin'
            ]
        ];
    }
}
