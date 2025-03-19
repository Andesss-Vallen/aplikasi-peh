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
        Schema::create('monitorings', function (Blueprint $table) {
            $table->id();
            $table->boolean('progres');
            $table->dateTime('tggl_pengerjakan');
            $table->boolean('selesai');
            $table->dateTime('tggl_selesai');
            $table->dateTime('deadline');
            $table->boolean('terkirim');
            $table->text('request');
            $table->timestamps();

            $table->foreignId('id_jpehpotret')->nullable()->constrained('jadwal_pehpotrets')->onDelete('set null');
            $table->foreignId('id_tfoto')->nullable()->constrained('tim_fotos')->onDelete('set null');
            $table->foreignId('id_tvideo')->nullable()->constrained('tim_videos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitorings');
    }
};
