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
        Schema::create('populations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id');
            $table->foreignId('dusun_id');
            $table->string('dusun_name');
            $table->string('rt');
            $table->string('rw');
            $table->integer('jumlah_kk');
            $table->integer('pria');
            $table->integer('wanita');
            $table->integer('total_pw');
            $table->timestamp('created_at');
            $table->dateTime('harvested_at');
            // $table->foreignId('user_id');
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
        Schema::dropIfExists('populations');
    }
};
