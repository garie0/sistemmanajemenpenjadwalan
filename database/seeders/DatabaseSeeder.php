<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Matkul;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Matkul::truncate();
        Jadwal::truncate();
        Schema::enableForeignKeyConstraints();

        $this->call(UserSeeder::class);
    }
}
