<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasiTable extends Migration
{
    public function up()
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wisata_id');
            $table->string('nama_paket');
            $table->integer('jml_orang');
            $table->integer('jml_anak')->nullable();
            $table->string('no_telp');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->text('spesial_request')->nullable();
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('wisata_id')->references('idwisata')->on('wisata')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservasi');
    }
}
