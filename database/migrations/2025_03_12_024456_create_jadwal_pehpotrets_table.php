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
        Schema::create('jadwal_pehpotrets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jpehpotret');
            $table->string('brand_jpehpotret');
            $table->dateTime('tanggal_jpehpotret');
            $table->string('keterangan_jpehpotret');

            $table->foreignId('id_tvideo')->constrained('tim_videos');
            $table->foreignId('id_tfoto')->constrained('tim_fotos');
            $table->foreignId('id_cspehpotret')->constrained('cs_pehpotrets');
            $table->foreignId('id_pkpehpotret')->constrained('paket_pehpotrets');
            $table->timestamps();
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
