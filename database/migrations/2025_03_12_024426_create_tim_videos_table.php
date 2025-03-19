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
        Schema::create('tim_videos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tvideo');
            $table->boolean('status_tvideo');
            $table->string('bvia_tvideo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tim_videos');
    }
};
