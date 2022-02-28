<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 5; $i++) {

            DB::table('users')->insert([
                'fullname' => $faker->name,
                'username' => $faker->userName,
                'age' => $faker->numberBetween(1,99),
                'password' => Hash::make($faker->password),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'birth' => $faker->dateTimeBetween,
            ]);
        }

        DB::table('users')->insert([
            'fullname' => 'Dummy User',
            'username' => 'dumdum',
            'age' => '20',
            'password' => '$2a$12$R19T2Vi9IuiBsDopF6UT/uzEJxxaDGRUg3FVWPb3UwF90z3Yew62y',
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'birth' => $faker->dateTimeBetween,
        ]);

    }
}
