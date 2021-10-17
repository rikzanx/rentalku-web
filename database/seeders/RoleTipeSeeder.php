<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleTipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table("role_tipes")->insert([
            "name" => "penyewa",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table("role_tipes")->insert([
            "name" => "pemilik",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table("role_tipes")->insert([
            "name" => "pengemudi",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
