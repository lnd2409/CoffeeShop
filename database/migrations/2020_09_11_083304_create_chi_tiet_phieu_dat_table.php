<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietPhieuDatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietphieudat', function (Blueprint $table) {
            $table->bigIncrements('ctpd_id');
            $table->integer('ctpd_soluong')->nullable()->unsigned();
            $table->bigInteger('ma_id')->nullable()->unsigned();
            $table->foreign('ma_id')->references('ma_id')->on('monan')->onDelete('cascade');

            // $table->bigInteger('ba_id')->nullable()->unsigned();
            // $table->foreign('ba_id')->references('ba_id')->on('banan')->onDelete('cascade');

            $table->bigInteger('pd_id')->unsigned();
            $table->foreign('pd_id')->references('pd_id')->on('phieudat')->onDelete('cascade');

            $table->bigInteger('nv_id')->nullable()->unsigned();
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
        Schema::dropIfExists('chitietphieudat');
    }
}
