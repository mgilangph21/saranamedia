<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('alamat')->nullable();
            $table->string('ponsel')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });

        Schema::table('billboard', function (Blueprint $table) {
            $table->enum('status', ['Y', 'N'])->default('Y')->after('detil');
        });

        Schema::table('jpo', function (Blueprint $table) {
            $table->enum('status', ['Y', 'N'])->default('Y')->after('detil');
        });

        Schema::table('led', function (Blueprint $table) {
            $table->enum('status', ['Y', 'N'])->default('Y')->after('detil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
        Schema::table('billboard', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('jpo', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('led', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}