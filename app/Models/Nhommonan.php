<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nhommonan
 * 
 * @property int $nma_id
 * @property string $nma_ten
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Monan[] $monans
 *
 * @package App\Models
 */
class Nhommonan extends Model
{
	protected $table = 'nhommonan';
	protected $primaryKey = 'nma_id';

	protected $fillable = [
		'nma_ten'
	];

	public function monans()
	{
		return $this->hasMany(Monan::class, 'nma_id');
	}
}
