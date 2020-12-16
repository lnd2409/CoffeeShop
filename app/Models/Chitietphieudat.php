<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietphieudat
 * 
 * @property int $ma_id
 * @property int $ba_id
 * @property int $pd_id
 * @property int $nv_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Banan $banan
 * @property Monan $monan
 * @property Nhanvien $nhanvien
 * @property Phieudat $phieudat
 *
 * @package App\Models
 */
class Chitietphieudat extends Model
{
	protected $table = 'chitietphieudat';
	public $incrementing = false;

	protected $casts = [
		'ma_id' => 'int',
		'ba_id' => 'int',
		'pd_id' => 'int',
		'nv_id' => 'int'
	];

	protected $fillable = [
		'ma_id',
		'ba_id',
		'pd_id',
		'nv_id'
	];

	public function banan()
	{
		return $this->belongsTo(Banan::class, 'ba_id');
	}

	public function monan()
	{
		return $this->belongsTo(Monan::class, 'ma_id');
	}

	public function nhanvien()
	{
		return $this->belongsTo(Nhanvien::class, 'nv_id');
	}

	public function phieudat()
	{
		return $this->belongsTo(Phieudat::class, 'pd_id');
	}
}
