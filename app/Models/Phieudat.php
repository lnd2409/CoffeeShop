<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phieudat
 * 
 * @property int $pd_id
 * @property Carbon $pd_ngaylap
 * @property int $pd_soluongban
 * @property int $pd_soluuongkhach
 * @property Carbon $pd_ngayden
 * @property Carbon $pd_gioden
 * @property int $pd_sotiencoc
 * @property int $pd_sotientongtamtinh
 * @property int $nv_id
 * @property int $kh_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Khachhang $khachhang
 * @property Nhanvien $nhanvien
 * @property Chitietphieudat $chitietphieudat
 *
 * @package App\Models
 */
class Phieudat extends Model
{
	protected $table = 'phieudat';
	protected $primaryKey = 'pd_id';

	protected $casts = [
		'pd_soluongkhach' => 'int',
		'pd_sotientongtamtinh' => 'int',
		'nv_id' => 'int',
		'kh_id' => 'int'
	];

	protected $dates = [
		'pd_ngaylap',
		'pd_ngayden',
		'pd_gioden'
	];

	protected $fillable = [
		'pd_ngaylap',
		'pd_soluongkhach',
		'pd_ngayden',
		'pd_gioden',
		'pd_sotientongtamtinh',
		'nv_id',
		'kh_id'
	];

	public function khachhang()
	{
		return $this->belongsTo(Khachhang::class, 'kh_id');
	}

	public function nhanvien()
	{
		return $this->belongsTo(Nhanvien::class, 'nv_id');
	}

	public function chitietphieudat()
	{
		return $this->hasOne(Chitietphieudat::class, 'pd_id');
	}
}
