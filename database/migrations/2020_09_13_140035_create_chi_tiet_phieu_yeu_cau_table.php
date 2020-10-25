<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietPhieuYeuCauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietphieuyeucau', function (Blueprint $table) {
            $table->integer('ctpyc_soluongmonan');

            $table->BigInteger('pyc_id')->unsigned();
            $table->foreign('pyc_id')->references('pyc_id')->on('phieuyeucau')->onDelete('cascade');

            $table->BigInteger('ma_id')->unsigned();
            $table->foreign('ma_id')->references('ma_id')->on('monan')->onDelete('cascade');



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
        Schema::dropIfExists('chitietphieuyeucau');
    }
}
