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
        Major::truncate();
        //
        $majors = ["informatika","marketing","VCDM","akuntansi"];
        foreach ($majors as $key => $major) {
            Major::create([
                "name" => $major,
                "description" => "pembelajaran tentang $major"
            ]);
        }
    }
}
