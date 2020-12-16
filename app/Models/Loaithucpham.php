<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Loaithucpham
 * 
 * @property int $ltp_id
 * @property string $ltp_ten
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Thucpham[] $thucphams
 *
 * @package App\Models
 */
class Loaithucpham extends Model
{
	protected $table = 'loaithucpham';
	protected $primaryKey = 'ltp_id';

	protected $fillable = [
		'ltp_ten'
	];

	public function thucphams()
	{
		return $this->hasMany(Thucpham::class, 'ltp_id');
	}
}
