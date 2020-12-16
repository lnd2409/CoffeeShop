<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * Class Khachhang
 * 
 * @property int $kh_id
 * @property string $kh_ten
 * @property string $kh_sdt
 * @property string $kh_username
 * @property string $kh_password
 * @property int $lkh_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Loaikhachhang $loaikhachhang
 * @property Collection|Phieudat[] $phieudats
 * @property Collection|Phieuthanhtoan[] $phieuthanhtoans
 *
 * @package App\Models
 */
class Khachhang extends Authenticatable
{
	protected $table = 'khachhang';
	protected $primaryKey = 'kh_id';

	protected $casts = [
		'lkh_id' => 'int'
	];

	protected $hidden = [
		'kh_password'
	];

	protected $fillable = [
		'kh_ten',
		'kh_sdt',
		'kh_username',
		'kh_password',
		'lkh_id'
	];

	public function loaikhachhang()
	{
		return $this->belongsTo(Loaikhachhang::class, 'lkh_id');
	}

	public function phieudats()
	{
		return $this->hasMany(Phieudat::class, 'kh_id');
	}

	public function phieuthanhtoans()
	{
		return $this->hasMany(Phieuthanhtoan::class, 'kh_id');
	}
}
