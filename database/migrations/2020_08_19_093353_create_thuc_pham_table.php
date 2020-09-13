<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThucPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thucpham', function (Blueprint $table) {
            $table->bigIncrements('tp_id');
            $table->string('tp_ten',100);
            $table->string('tp_chuthich',100);

            $table->bigInteger('ltp_id')->unsigned();
            $table->foreign('ltp_id')->references('ltp_id')->on('loaithucpham')->onDelete('cascade');
            
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
        Schema::dropIfExists('thucpham');
    }
}
