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
        Schema::create('info_jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('rundown');
            $table->string('nama_album');
            $table->string('medsos_pengantin');
            $table->string('ready_lokasi');
            $table->string('keterangan');

            $table->foreignId('id_jpehpotret')->constrained('jadwal_pehpotrets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_jadwals');
    }
};
