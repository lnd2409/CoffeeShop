<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Banan
 * 
 * @property int $ba_id
 * @property int $ba_soban
 * @property int $ba_sochongoi
 * @property int $ba_trangthai
 * @property int $lba_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Loaibanan $loaibanan
 * @property Chitietphieudat $chitietphieudat
 *
 * @package App\Models
 */
class Banan extends Model
{
	protected $table = 'banan';
	protected $primaryKey = 'ba_id';

	protected $casts = [
		'ba_soban' => 'int',
		'ba_sochongoi' => 'int',
		'ba_trangthai' => 'int',
		'lba_id' => 'int'
	];

	protected $fillable = [
		'ba_soban',
		'ba_sochongoi',
		'ba_trangthai',
		'lba_id'
	];

	public function loaibanan()
	{
		return $this->belongsTo(Loaibanan::class, 'lba_id');
	}

	public function chitietphieudat()
	{
		return $this->hasOne(Chitietphieudat::class, 'ba_id');
	}
}
