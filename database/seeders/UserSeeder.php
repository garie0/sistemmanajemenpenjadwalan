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
        // Buat data dummy untuk tabel pengguna
        User::create([
            'name' => 'Gigih Agung Prasetyo',
            'email' => 'gigih@gmail.com',
            'email_verified_at' => now(),
            'type' => true,
            'password' => Hash::make('123'),
        ]);

        User::create([
            'name' => 'Admin Ganteng',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'type' => false,
            'password' => Hash::make('123'),
        ]);
    }
}
