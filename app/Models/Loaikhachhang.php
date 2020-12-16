<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Loaikhachhang
 * 
 * @property int $lkh_id
 * @property string $lkh_ten
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Khachhang[] $khachhangs
 *
 * @package App\Models
 */
class Loaikhachhang extends Model
{
	protected $table = 'loaikhachhang';
	protected $primaryKey = 'lkh_id';

	protected $fillable = [
		'lkh_ten'
	];

	public function khachhangs()
	{
		return $this->hasMany(Khachhang::class, 'lkh_id');
	}
}
