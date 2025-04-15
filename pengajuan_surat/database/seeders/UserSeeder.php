<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin user
        User::create([
            'id' => '2172001',
            'nama' => 'Admin User',
            'email' => '2172001@example.com',
            'password' => Hash::make('12345'), // Use a secure password
            'role' => 'admin',
            'no_telefon' => '081234567890',
            'alamat' => 'Address 1',
            'semester' => 'Genap 2024/2025',
        ]);

        // Create a kaprodi user
        User::create([
            'id' => '2172002',
            'nama' => 'Kaprodi User',
            'email' => '2172002@example.com',
            'password' => Hash::make('12345'),
            'role' => 'kaprodi',
            'no_telefon' => '081234567891',
            'alamat' => 'Kaprodi Address',
            'semester' => 'Genap 2024/2025',
        ]);

        // Create a mahasiswa user
        User::create([
            'id' => '2172003',
            'nama' => 'Mahasiswa User',
            'email' => '2172003@example.com',
            'password' => Hash::make('12345'),
            'role' => 'mahasiswa',
            'no_telefon' => '081234567892',
            'alamat' => 'Mahasiswa Address',
            'semester' => 'Genap 2024/2025',
        ]);
    }
}
