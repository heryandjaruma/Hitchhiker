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

        for ($i=0; $i < 30; $i++) {

            DB::table('users')->insert([
                'fullname' => $faker->name,
                'username' => $faker->userName,
                'email_address' => $faker->email,
                'password' => Hash::make($faker->password),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'birth' => $faker->dateTimeBetween,
            ]);
        }

        DB::table('users')->insert([
            'fullname' => 'Dummy User',
            'username' => 'useruser',
            'email_address' => 'user@gmail.com',
            'password' => '$2a$12$mRaULGKHa9rcqm8zwAzh2eIjyXHL.VaNGtdgyewFt5N2j3oKAXZoW',
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'birth' => $faker->dateTimeBetween,
        ]);

    }
}
