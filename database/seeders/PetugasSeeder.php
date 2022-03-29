<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petugas;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Petugas::insert([
            'user_id' => 1,
            'nama_petugas' => "alfi ilham",
            'telp' => "085156916406",
            'roleUnit' => "superAdmin",
        ]);
    }
}
