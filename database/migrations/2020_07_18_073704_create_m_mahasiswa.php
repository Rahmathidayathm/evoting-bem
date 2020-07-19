<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_mahasiswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nim', 40);
            $table->string('nama', 115);
            $table->string('no_telp', 20);
            $table->string('alamat');
            $table->text('photo')->nullable();
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
        Schema::table('m_mahasiswa', function (Blueprint $table) {
            //
        });
    }
}
