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
        Schema::create('katalog_batiks', function (Blueprint $table) {
            $table->id('id_katalog_batik');
            $table->unsignedBigInteger('provinsi_id');
            $table->foreign('provinsi_id')->references('id_provinsi')->on('provinsis')->onDelete('cascade');
            $table->string('nama_batik');
            $table->text('detail_batik');
            $table->text('sejarah_batik');
            $table->text('penggunaan');
            $table->text('makna');
            $table->string('img_batik');
            $table->decimal('lat',10,7)->nullable();
            $table->decimal('lon',10,7)->nullable();
            $table->string('jenis_batik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalog_batiks');
    }
};
