<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phieuyeucau
 * 
 * @property int $pyc_id
 * @property Carbon $pyc_ngyalap
 * @property int $pyc_giatientamtinh
 * @property int $pyc_trangthai
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Chitietphieuyeucau $chitietphieuyeucau
 * @property Collection|Phieuthanhtoan[] $phieuthanhtoans
 *
 * @package App\Models
 */
class Phieuyeucau extends Model
{
	protected $table = 'phieuyeucau';
	protected $primaryKey = 'pyc_id';

	protected $casts = [
		'pyc_giatientamtinh' => 'int',
		'pyc_trangthai' => 'int'
	];

	protected $dates = [
		'pyc_ngyalap'
	];

	protected $fillable = [
		'pyc_ngyalap',
		'pyc_giatientamtinh',
		'pyc_trangthai'
	];

	public function chitietphieuyeucau()
	{
		return $this->hasOne(Chitietphieuyeucau::class, 'pyc_id');
	}

	public function phieuthanhtoans()
	{
		return $this->hasMany(Phieuthanhtoan::class, 'pyc_id');
	}
}
