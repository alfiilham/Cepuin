<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::insert([
            'nama' => 'Pengaduan',
        ]);
        Categories::insert([
            'nama' => 'Kritik',
        ]);
        Categories::insert([
            'nama' => 'Saran',
        ]);
    }
}
