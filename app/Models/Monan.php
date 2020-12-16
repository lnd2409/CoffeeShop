<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Monan
 * 
 * @property int $ma_id
 * @property string $ma_ten
 * @property string $ma_chuthich
 * @property int $nma_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Nhommonan $nhommonan
 * @property Chitietphieudat $chitietphieudat
 * @property Chitietphieuyeucau $chitietphieuyeucau
 *
 * @package App\Models
 */
class Monan extends Model
{
	protected $table = 'monan';
	protected $primaryKey = 'ma_id';

	protected $casts = [
		'nma_id' => 'int'
	];

	protected $fillable = [
		'ma_ten',
		'ma_chuthich',
		'nma_id'
	];

	public function nhommonan()
	{
		return $this->belongsTo(Nhommonan::class, 'nma_id');
	}

	public function chitietphieudat()
	{
		return $this->hasOne(Chitietphieudat::class, 'ma_id');
	}

	public function chitietphieuyeucau()
	{
		return $this->hasOne(Chitietphieuyeucau::class, 'ma_id');
	}
}
