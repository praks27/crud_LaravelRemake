<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();

        $faker = Factory::create('id_ID');
        $majors =Major::get();

        for($i=0 ; $i<100 ; $i++) {
            $gender = ( $i % 2 ) ? 'male' : 'female';
            Student::create([
                    'name' => $faker->name($gender),
                    'date_birth' => '2015-01-01',
                    'gender' => $gender,
                    'address' => $faker->address,
                    'major_id' => $majors->random()->id
            ]);
        }
        //untuk  membuat seeder 1 1 atau manual
        // Student::create([
        //     "name" => "Putra",
        //     "date_birth" => "2015-01-01",
        //     "gender" => "Male",
        //     "address" => "jl.selayar kapal",
        //     "major_id" => 1
        // ]);
    }
}
