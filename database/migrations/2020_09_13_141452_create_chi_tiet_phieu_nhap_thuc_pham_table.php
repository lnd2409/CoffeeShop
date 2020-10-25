<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietPhieuNhapThucPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietphieunhapthucpham', function (Blueprint $table) {
            $table->integer('ctpntp_soluong');

            $table->BigInteger('pntp_id')->unsigned();
            $table->foreign('pntp_id')->references('pntp_id')->on('phieunhapthucpham')->onDelete('cascade');

            $table->BigInteger('tp_id')->unsigned();
            $table->foreign('tp_id')->references('tp_id')->on('thucpham')->onDelete('cascade');

            $table->primary(['pntp_id','tp_id']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietphieunhapthucpham');
    }
}
