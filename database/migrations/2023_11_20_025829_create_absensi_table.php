<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa')->nullable();
            $table->enum('status', ['hadir', 'izin', 'sakit', 'alpa'])->nullable();
            $table->date('tanggal_absen')->nullable();
            $table->timestamps();
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absensi', function (Blueprint $table) {
            $table->dropForeign('id_siswa');
        });
        Schema::dropIfExists('absensi');
    }
};
