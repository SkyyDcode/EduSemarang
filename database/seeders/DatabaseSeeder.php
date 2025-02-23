<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hapus data user yang ada (optional)
        // User::truncate();

        // Cek apakah user admin sudah ada
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'level' => 'admin',
                'password' => Hash::make('admin123') // Password: admin123
            ]);
        }

        $this->call([
            KecamatanSeeder::class,
            KelurahanSeeder::class
        ]);
    }
}
