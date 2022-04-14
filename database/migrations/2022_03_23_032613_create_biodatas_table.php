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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->string('no_ktp');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('email');
            $table->string('jenis_kelamin');
            $table->string('status_nikah');
            $table->string('kewarganegaraan');
            $table->string('agama');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('alamat_ktp');
            $table->string('handphone');
            $table->string('no_npwp');
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
        Schema::dropIfExists('biodatas');
    }
};
