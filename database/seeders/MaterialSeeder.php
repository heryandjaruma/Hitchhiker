<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $courses = Course::all();

        foreach ($courses as $c)
        {
            for ($j=0; $j < $faker->numberBetween(5,21); $j++) {
                DB::table('materials')->insert([
                    'course_id' => $c->id,
                    'material_name' => $faker->sentence(3),
                    'material_description' => $faker->text(96),
                ]);
            }
        }
    }
}
