<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Dompet;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            RoleTipeSeeder::class,
        ]);
        User::factory(10)->has(UserRole::factory(),'user_role')->has(Dompet::factory(),'dompet')->create();
        $this->call([
            DepositSeeder::class,
            KategoriSeeder::class,
            KendaraanSeeder::class,
            PengemudiSeeder::class,
            TransaksiSeeder::class
        ]);
        
    }
}