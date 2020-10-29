<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanAnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banan', function (Blueprint $table) {
            $table->bigIncrements('ba_id');
            $table->integer('ba_sochongoi')->nullable();
            $table->integer('ba_trangthai')->default(0);

            $table->bigInteger('lba_id')->unsigned();
            $table->foreign('lba_id')->references('lba_id')->on('loaibanan')->onDelete('cascade');
            
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
        Schema::dropIfExists('banan');
    }
}
