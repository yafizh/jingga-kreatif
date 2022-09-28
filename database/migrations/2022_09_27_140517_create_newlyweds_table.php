<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newlyweds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wedding_id');
            $table->string('nik', 20);
            $table->string('birthplace');
            $table->date('birthdate');
            $table->boolean('sex'); // Jenis Kelamin (Pria=1/Wanita=0)
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('photo');
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
        Schema::dropIfExists('newlyweds');
    }
};
