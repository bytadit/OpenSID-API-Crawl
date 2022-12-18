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
        Schema::create('bloodtypes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id');
            $table->foreignId('dusun_id');
            $table->string('dusun_name');
            $table->string('bloodtype_name');
            $table->integer('Pria');
            $table->integer('Wanita');
            $table->integer('Total');
            $table->dateTime('harvested_at');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bloodtypes');
    }
};
