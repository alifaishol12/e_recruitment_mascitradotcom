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
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id();
            $table->string('jenjang');
            $table->string('institusi');
            $table->string('jurusan');
            $table->string('kota');
            $table->date('tanggal_lulus');
            $table->string('nilai_uan_ipk');
            $table->string('akreditasi');
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
        Schema::dropIfExists('pendidikans');
    }
};
