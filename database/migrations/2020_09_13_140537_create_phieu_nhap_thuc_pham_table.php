<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuNhapThucPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieunhapthucpham', function (Blueprint $table) {
            $table->bigIncrements('pntp_id');
            $table->date('pntp_ngaylap');
            $table->integer('pntp_tongtien');

            $table->bigInteger('nv_id')->unsigned();
            $table->foreign('nv_id')->references('nv_id')->on('nhanvien')->onDelete('cascade');

            $table->bigInteger('ngtp_id')->unsigned();
            $table->foreign('ngtp_id')->references('ngtp_id')->on('noigiaothucpham')->onDelete('cascade');

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
        Schema::dropIfExists('phieunhapthucpham');
    }
}
