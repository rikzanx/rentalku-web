<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kendaraan_data = [
            ['user_id'=> 2,"kategori_id" => 1,"name" => "Avanza", "nopol" => "L 7673 HH", "seat" => 7, "harga" => 250000, "tahun" => "2019", 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 2,"kategori_id" => 2,"name" => "Civic", "nopol" => "L 8372 HH", "seat" => 4, "harga" => 200000, "tahun" => "2014", 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_id" => 3,"name" => "Suzuki XL7", "nopol" => "L 8823 PO", "seat" => 7, "harga" => 250000, "tahun" => "2020", 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
        ];
        DB::table("kendaraans")->insert($kendaraan_data);
    }
}
