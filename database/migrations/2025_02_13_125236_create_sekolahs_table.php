<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('npsn');
            $table->string('alamat');
            $table->foreignId('kecamatan_id')->constrained('kecamatans');
            $table->foreignId('kelurahan_id')->constrained('kelurahans');
            $table->integer('kode_pos');
            $table->integer('telepon');
            $table->string('email');
            $table->string('website');
            $table->string('jenjang');
            $table->string('kepala_sekolah');
            $table->string('foto_sekolah')->nullable();
            $table->string('foto_kepala_sekolah')->nullable();
            $table->integer('jumlah_siswa')->default(0);
            $table->integer('jumlah_guru')->default(0);
            $table->json('jurusan_smk')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolahs');
    }
};
