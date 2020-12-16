<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phieuthanhtoan
 * 
 * @property int $ptt_id
 * @property Carbon $ptt_ngaylap
 * @property int $ptt_giatien
 * @property int $pyc_id
 * @property int $kh_id
 * @property int $nv_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Khachhang $khachhang
 * @property Nhanvien $nhanvien
 * @property Phieuyeucau $phieuyeucau
 *
 * @package App\Models
 */
class Phieuthanhtoan extends Model
{
	protected $table = 'phieuthanhtoan';
	protected $primaryKey = 'ptt_id';

	protected $casts = [
		'ptt_giatien' => 'int',
		'pyc_id' => 'int',
		'kh_id' => 'int',
		'nv_id' => 'int'
	];

	protected $dates = [
		'ptt_ngaylap'
	];

	protected $fillable = [
		'ptt_ngaylap',
		'ptt_giatien',
		'pyc_id',
		'kh_id',
		'nv_id'
	];

	public function khachhang()
	{
		return $this->belongsTo(Khachhang::class, 'kh_id');
	}

	public function nhanvien()
	{
		return $this->belongsTo(Nhanvien::class, 'nv_id');
	}

	public function phieuyeucau()
	{
		return $this->belongsTo(Phieuyeucau::class, 'pyc_id');
	}
}
