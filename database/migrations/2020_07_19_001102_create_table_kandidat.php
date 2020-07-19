<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKandidat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kandidat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no_urut')->unsigned();
            $table->bigInteger('calon_ketua')->unsigned();
            $table->bigInteger('calon_wakil')->unsigned();
            $table->text('visi_misi');
            $table->timestamps();

            $table->foreign('calon_ketua')->references('id')->on('m_mahasiswa')->onDelete('restrict');
            $table->foreign('calon_wakil')->references('id')->on('m_mahasiswa')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kandidat', function (Blueprint $table) {
            //
        });
    }
}
