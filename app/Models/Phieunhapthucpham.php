<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phieunhapthucpham
 * 
 * @property int $pntp_id
 * @property Carbon $pntp_ngaylap
 * @property int $pntp_tongtien
 * @property int $nv_id
 * @property int $ngtp_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Noigiaothucpham $noigiaothucpham
 * @property Nhanvien $nhanvien
 * @property Collection|Chitietphieunhapthucpham[] $chitietphieunhapthucphams
 *
 * @package App\Models
 */
class Phieunhapthucpham extends Model
{
	protected $table = 'phieunhapthucpham';
	protected $primaryKey = 'pntp_id';

	protected $casts = [
		'pntp_tongtien' => 'int',
		'nv_id' => 'int',
		'ngtp_id' => 'int'
	];

	protected $dates = [
		'pntp_ngaylap'
	];

	protected $fillable = [
		'pntp_ngaylap',
		'pntp_tongtien',
		'nv_id',
		'ngtp_id'
	];

	public function noigiaothucpham()
	{
		return $this->belongsTo(Noigiaothucpham::class, 'ngtp_id');
	}

	public function nhanvien()
	{
		return $this->belongsTo(Nhanvien::class, 'nv_id');
	}

	public function chitietphieunhapthucphams()
	{
		return $this->hasMany(Chitietphieunhapthucpham::class, 'pntp_id');
	}
}
