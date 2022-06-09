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
        Schema::create('detail_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pengajuan')->unsigned();
            $table->bigInteger('id_coa')->unsigned();
            $table->bigInteger('realisasi');
            $table->string('kegiatan');
            $table->bigInteger('biaya');
            $table->timestamps();
            $table->foreign('id_coa')->references('id')->on('coa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pengajuan')->references('id')->on('pengajuan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pengajuan');
    }
};
