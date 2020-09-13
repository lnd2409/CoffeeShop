<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuYeuCauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieuyeucau', function (Blueprint $table) {
            $table->bigIncrements('pyc_id');
            $table->dateTime('pyc_ngyalap');
            $table->integer('pyc_giatientamtinh');
            $table->integer('pyc_trangthai')->default(0);
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
        Schema::dropIfExists('phieuyeucau');
    }
}
