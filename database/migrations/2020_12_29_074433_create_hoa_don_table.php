<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->bigIncrements('hd_id');
            $table->dateTime('ngaylap');
            $table->string('tiengiam');
            $table->string('tongtien');

            $table->bigInteger('nv_id')->unsigned();
            $table->foreign('nv_id')->references('nv_id')->on('nhanvien')->onDelete('cascade');

            $table->bigInteger('ba_id')->unsigned();
            $table->foreign('ba_id')->references('ba_id')->on('banan')->onDelete('cascade');

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
        Schema::dropIfExists('hoadon');
    }
}
