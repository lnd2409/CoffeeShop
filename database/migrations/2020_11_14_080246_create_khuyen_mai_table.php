<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenMaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenmai', function (Blueprint $table) {
            $table->bigIncrements('km_id');
            $table->string('km_ten');
            $table->text('km_noidung');
            $table->date('km_ngaybatdau');
            $table->date('km_ngayketthuc');
            $table->string('km_hinhanh');
            $table->integer('km_giamphantram')->nullable();
            $table->integer('km_giamgiatien')->nullable();
            $table->integer('km_trangthai')->default(1);
            $table->string('km_code')->nullable();
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
        Schema::dropIfExists('khuyenmai');
    }
}
