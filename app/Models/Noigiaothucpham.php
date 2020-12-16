<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Noigiaothucpham
 * 
 * @property int $ngtp_id
 * @property string $ngtp_ten
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Phieunhapthucpham[] $phieunhapthucphams
 *
 * @package App\Models
 */
class Noigiaothucpham extends Model
{
	protected $table = 'noigiaothucpham';
	protected $primaryKey = 'ngtp_id';

	protected $fillable = [
		'ngtp_ten'
	];

	public function phieunhapthucphams()
	{
		return $this->hasMany(Phieunhapthucpham::class, 'ngtp_id');
	}
}
