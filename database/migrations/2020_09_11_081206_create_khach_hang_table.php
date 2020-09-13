<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->bigIncrements('kh_id');
            $table->string('kh_ten',100);
            $table->string('kh_sdt',100);
            $table->string('kh_username',100);
            $table->string('kh_password',100);
        
            $table->bigInteger('lkh_id')->unsigned();
            $table->foreign('lkh_id')->references('lkh_id')->on('loaikhachhang')->onDelete('cascade');
            
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
        Schema::dropIfExists('khachhang');
    }
}
