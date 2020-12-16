<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonAnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monan', function (Blueprint $table) {
            $table->bigIncrements('ma_id');
            $table->string('ma_ten',100);
            $table->string('ma_chuthich');
            $table->integer('ma_gia');
            $table->bigInteger('nma_id')->unsigned();
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
        Schema::dropIfExists('monan');
    }
}
