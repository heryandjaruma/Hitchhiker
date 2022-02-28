<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 100; $i++) {
            DB::table('courses')->insert([
                'course_name' => $faker->sentence(4),
                'course_description' => $faker->text(255),
                'course_period' => $faker->numberBetween(1, 99),
                'price' => ($faker->numberBetween(99, 999) * 1000),
                'image' => $faker->numberBetween(1,17)
            ]);
        }
    }
}
