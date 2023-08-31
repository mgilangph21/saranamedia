<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBillboard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Billboard
        Schema::create('billboard', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('lokasi');
            $table->string('gambar');
            $table->text('detil')->nullable();
            $table->timestamps();
        });

        // JPO
        Schema::create('jpo', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('lokasi');
            $table->string('gambar');
            $table->text('detil')->nullable();
            $table->timestamps();
        });

        // LED
        Schema::create('led', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('lokasi');
            $table->string('gambar');
            $table->text('detil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billboard');
        Schema::dropIfExists('led');
        Schema::dropIfExists('jpo');
    }
}