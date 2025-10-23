<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semua_harga = [50000, 75000, 100000, 125000];
        $semua_semester = [1, 2, 3, 4, 5, 6, 7, 8];
        for ($i=0; $i<20; $i++){
            $smt = $semua_semester[array_rand($semua_semester)];
            $number = rand(100, 499);
            $courseCode = 'PL' . $smt . $number;
            $harga = $semua_harga[array_rand($semua_harga)];
            Course::create([
                'semester_id' => $smt,
                'course_code' => $courseCode,
                'course_name' => fake()->sentence(),
                'description' => fake()->sentence(50),
                'harga' => $harga
            ]);
        }
    }
}
