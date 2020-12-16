<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Loaibanan
 * 
 * @property int $lba_id
 * @property string $lba_ten
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Banan[] $banans
 *
 * @package App\Models
 */
class Loaibanan extends Model
{
	protected $table = 'loaibanan';
	protected $primaryKey = 'lba_id';

	protected $fillable = [
		'lba_ten'
	];

	public function banans()
	{
		return $this->hasMany(Banan::class, 'lba_id');
	}
}
