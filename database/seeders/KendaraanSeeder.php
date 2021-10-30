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
            ['user_id'=> 2,"kategori_jenis_id" => 1, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Avanza", "nopol" => "L 7673 HH", "harga" => 250000, "tahun" => "2019", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 2,"kategori_jenis_id" => 2, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Civic", "nopol" => "L 8372 HH", "harga" => 200000, "tahun" => "2014", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true,'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id'=> 3,"kategori_jenis_id" => 3, "kategori_kota_id" => 1, "kategori_seat_id" => 2, "name" => "Suzuki XL7", "nopol" => "L 8823 PO", "harga" => 250000, "tahun" => "2020", "transmisi" => "manual", "mesin" => "2000cc" , "warna" => "hitam", "supir" => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
        ];
        DB::table("kendaraans")->insert($kendaraan_data);
    }
}
