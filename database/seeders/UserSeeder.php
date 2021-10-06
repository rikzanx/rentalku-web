<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table("users")->insert([
            "name" => $faker->name(),
            "email" => $faker->safeEmail,
            "password" => "erik12345",
            "telp" => $faker->phoneNumber,
            "alamat" => $faker->address,
        ]);
    }
}
