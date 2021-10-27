<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaksi_data = [
            ['user_id' => 5, "kendaraan_id" => 1,  "waktu_ambil" => Carbon::now()->format('Y-m-d H:i:s'), "durasi" => 1, "denda" => 0, "status" => "Selesai" , 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['user_id' => 5, "kendaraan_id" => 2,  "waktu_ambil" => Carbon::now()->format('Y-m-d H:i:s'), "durasi" => 1, "denda" => 0, "status" => "Selesai" , 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
        ];
        DB::table("transaksis")->insert($transaksi_data);

        $pengemuditransaksi = [
            ['pengemudi_id' => 3, "transaksi_id" => 1]
        ];
        DB::table("pengemudi_transaksis")->insert($pengemuditransaksi);
        //melakukan pembuatan chat room dgn driver apabila memesan supir bagi yang telah memesan
        $chat_room = [
            ['user_id' => 3, "user_to_id" => 5]
        ];
        DB::table("chat_rooms")->insert($chat_room);
        $message = [
            ['user_id' => 3, "chat_room_id" => 1, "message" => "Terima kasih telah memesan driver"],
        ];
        DB::table("messages")->insert($message);

        $transaksidompet = [
            ['dompet_id' => 5 , "jumlah" => -350000 , "status" => "selesai" ],
            ['dompet_id' => 5 , "jumlah" => -200000 , "status" => "selesai" ],
        ];
        DB::table("transaksi_dompets")->insert($transaksidompet);
        DB::table("dompets")->where('id',5)->update([
            "saldo" => 450000,
            "updated_at"    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //melakukan pembuatan chat room dgn pemilik bagi yang telah memesan
        $chat_room = [
            ['user_id' => 2, "user_to_id" => 5]
        ];
        DB::table("chat_rooms")->insert($chat_room);
        $message = [
            ['user_id' => 2, "chat_room_id" => 2, "message" => "Terima kasih telah menyewa mobil dengan kami"],
        ];
        DB::table("messages")->insert($message);

        // melakukan rating & review terhadap kendaraan
        $rating_kendaraan = [
            ['user_id' => 5, "kendaraan_id" => 1, "jumlah_bintang" => 5]
        ];
        DB::table("rating_kendaraans")->insert($rating_kendaraan);
        $review_kendaraan = [
            ['review' => "kondisi mobilnya bagus suka banget", "rating_kendaraan_id" => 1]
        ];
        DB::table("review_kendaraans")->insert($review_kendaraan);

        // melakukan rating & review terhadap pemilik
        $rating_user = [
            ['user_id' => 5, "user_to_id" => 2, "jumlah_bintang" => 5]
        ];
        DB::table("rating_users")->insert($rating_user);
        $review_user = [
            ['review' => "pemiliknya baik banget", "rating_user_id" => 1]
        ];
        DB::table("review_users")->insert($review_user);
    }
}
