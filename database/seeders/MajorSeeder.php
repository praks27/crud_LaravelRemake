<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //untuk menghapus data saat melakukan seed
        Major::truncate();
        //untuk membuat seed data secara otomstis dengan menggunakan variabel tambahan
        $majors = ["informatika","marketing","VCDM","akuntansi"];
        foreach ($majors as $key => $major) {
            //untuk menggenerate data 1 per 1
            Major::create([
                "name" => $major,
                "description" => "pembelajaran tentang $major"
            ]);
        }
    }
}
