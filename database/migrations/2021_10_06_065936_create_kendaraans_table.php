<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('kategori_kota_id');
            $table->bigInteger('kategori_seat_id');
            $table->bigInteger('kategori_jenis_id');
            $table->text('name');
            $table->text('nopol');
            $table->integer('harga');
            $table->integer('tahun');
            $table->text('transmisi');
            $table->text('mesin');
            $table->text('warna');
            $table->boolean('supir');
            $table->string('image_link')->default('image/profil.png');
            $table->decimal('lat',10,7)->default(0);
            $table->decimal('long',10,7)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraans');
    }
}
