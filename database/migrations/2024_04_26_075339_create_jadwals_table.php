<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_matkul');
            $table->string('tanggal');
            $table->string('start_time');
            $table->string('end_time');
            $table->integer('lokasi');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('deskripsi');
            $table->timestamps();

            $table->foreign('id_matkul')->references('id_matkul')->on('matkuls')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};