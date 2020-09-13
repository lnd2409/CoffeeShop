<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuThanhToanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieuthanhtoan', function (Blueprint $table) {
            $table->bigIncrements('ptt_id');
            $table->date('ptt_ngaylap');
            $table->integer('ptt_giatien');
         
            $table->BigInteger('pyc_id')->unsigned();
            $table->foreign('pyc_id')->references('pyc_id')->on('phieuyeucau')->onDelete('cascade');

            $table->BigInteger('kh_id')->unsigned();
            $table->foreign('kh_id')->references('kh_id')->on('khachhang')->onDelete('cascade');

            $table->BigInteger('nv_id')->unsigned();
            $table->foreign('nv_id')->references('nv_id')->on('nhanvien')->onDelete('cascade');
            
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
        Schema::dropIfExists('phieuthanhtoan');
    }
}
