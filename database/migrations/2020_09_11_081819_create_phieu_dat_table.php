<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuDatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieudat', function (Blueprint $table) {
            $table->bigIncrements('pd_id');
            $table->dateTime('pd_ngaylap');
            $table->integer('pd_soluongban');
            $table->integer('pd_soluuongkhach');
            $table->dateTime('pd_ngayden');
            $table->time('pd_gioden');
            $table->BigInteger('pd_sotiencoc');
            $table->BigInteger('pd_sotientongtamtinh');


            $table->BigInteger('nv_id')->unsigned();
            $table->foreign('nv_id')->references('nv_id')->on('nhanvien')->onDelete('cascade');

            $table->BigInteger('kh_id')->unsigned();
            $table->foreign('kh_id')->references('kh_id')->on('khachhang')->onDelete('cascade');



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
        Schema::dropIfExists('phieudat');
    }
}
