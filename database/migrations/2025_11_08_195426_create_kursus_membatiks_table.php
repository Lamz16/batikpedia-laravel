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
        Schema::create('kursus_membatiks', function (Blueprint $table) {
            $table->id('id_ursus');
            $table->string('nama_kursus');
            $table->string('image');
            $table->string('harga');
            $table->text('deskripsi');
            $table->string('url_kursus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursus_membatiks');
    }
};
