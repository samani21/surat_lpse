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
        Schema::create('tb_surat', function (Blueprint $table) {
            $table->id();
            $table->string('id_surat');
            $table->string('tgl_surat');
            $table->string('sbr_surat');
            $table->string('jdl_surat');
            $table->string('nm_file');
            $table->string('kd_surat');
            $table->integer('status');
            $table->string('file_balasan');
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
        Schema::dropIfExists('tb_surat');
    }
};
