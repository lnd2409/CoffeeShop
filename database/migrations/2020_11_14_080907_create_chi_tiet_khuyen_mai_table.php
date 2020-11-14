<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietKhuyenMaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietkhuyenmai', function (Blueprint $table) {
            $table->bigInteger('km_id')->unsigned();
            $table->bigInteger('ma_id')->unsigned()->nullable();
            $table->bigInteger('nma_id')->unsigned()->nullable();
            $table->primary('km_id');
            $table->foreign('km_id')->references('km_id')->on('khuyenmai')->onDelete('cascade');
            $table->foreign('ma_id')->references('ma_id')->on('monan')->onDelete('cascade');
            $table->foreign('nma_id')->references('nma_id')->on('nhommonan')->onDelete('cascade');
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
        Schema::dropIfExists('chitietkhuyenmai');
    }
}
