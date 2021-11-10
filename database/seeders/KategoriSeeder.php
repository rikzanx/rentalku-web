<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            ['name'=> "MVP"],
            ['name'=> "Sedan"],
            ['name'=> "SUV"],
            ['name'=> "Bus"],
        ];
        DB::table("kategoris")->insert($kategori);
    }
}
