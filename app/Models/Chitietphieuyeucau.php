<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietphieuyeucau
 * 
 * @property int $ctpyc_soluongmonan
 * @property int $pyc_id
 * @property int $ma_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Monan $monan
 * @property Phieuyeucau $phieuyeucau
 *
 * @package App\Models
 */
class Chitietphieuyeucau extends Model
{
	protected $table = 'chitietphieuyeucau';
	public $incrementing = false;

	protected $casts = [
		'ctpyc_soluongmonan' => 'int',
		'pyc_id' => 'int',
		'ma_id' => 'int'
	];

	protected $fillable = [
		'ctpyc_soluongmonan',
		'pyc_id',
		'ma_id'
	];

	public function monan()
	{
		return $this->belongsTo(Monan::class, 'ma_id');
	}

	public function phieuyeucau()
	{
		return $this->belongsTo(Phieuyeucau::class, 'pyc_id');
	}
}
