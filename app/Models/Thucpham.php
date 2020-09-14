<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Thucpham
 * 
 * @property int $tp_id
 * @property string $tp_ten
 * @property string $tp_chuthich
 * @property int $ltp_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Loaithucpham $loaithucpham
 * @property Collection|Chitietphieunhapthucpham[] $chitietphieunhapthucphams
 *
 * @package App\Models
 */
class Thucpham extends Model
{
	protected $table = 'thucpham';
	protected $primaryKey = 'tp_id';

	protected $casts = [
		'ltp_id' => 'int'
	];

	protected $fillable = [
		'tp_ten',
		'tp_chuthich',
		'ltp_id'
	];

	public function loaithucpham()
	{
		return $this->belongsTo(Loaithucpham::class, 'ltp_id');
	}

	public function chitietphieunhapthucphams()
	{
		return $this->hasMany(Chitietphieunhapthucpham::class, 'tp_id');
	}
}
