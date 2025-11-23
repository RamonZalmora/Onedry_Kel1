<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');                       // Cuci Setrika, Laundry Satuan, dll
            $table->enum('tipe', ['per_kg','per_item']);  // cara hitung
            $table->string('sub_item')->nullable();       // Kemeja, Jaket, Baju Batik, dll
            $table->integer('harga');                     // harga final
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('layanans');
    }
};
