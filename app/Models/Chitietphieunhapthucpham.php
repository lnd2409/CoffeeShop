<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietphieunhapthucpham
 * 
 * @property int $ctpntp_soluong
 * @property int $pntp_id
 * @property int $tp_id
 * 
 * @property Phieunhapthucpham $phieunhapthucpham
 * @property Thucpham $thucpham
 *
 * @package App\Models
 */
class Chitietphieunhapthucpham extends Model
{
	protected $table = 'chitietphieunhapthucpham';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ctpntp_soluong' => 'int',
		'pntp_id' => 'int',
		'tp_id' => 'int'
	];

	protected $fillable = [
		'ctpntp_soluong'
	];

	public function phieunhapthucpham()
	{
		return $this->belongsTo(Phieunhapthucpham::class, 'pntp_id');
	}

	public function thucpham()
	{
		return $this->belongsTo(Thucpham::class, 'tp_id');
	}
}
