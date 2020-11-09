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
 * Class Nhanvien
 * 
 * @property int $nv_id
 * @property string $username
 * @property string $password
 * @property string $nv_ten
 * @property string $nv_sdt
 * @property int $nv_cmnd
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Chitietphieudat $chitietphieudat
 * @property Collection|Phieudat[] $phieudats
 * @property Collection|Phieunhapthucpham[] $phieunhapthucphams
 * @property Collection|Phieuthanhtoan[] $phieuthanhtoans
 *
 * @package App\Models
 */
class Nhanvien extends Authenticatable
{
	protected $table = 'nhanvien';
	protected $primaryKey = 'nv_id';

	protected $casts = [
		'nv_cmnd' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'username',
		'password',
		'nv_ten',
		'nv_sdt',
		'nv_cmnd',
		'remember_token'
	];

	public function chitietphieudat()
	{
		return $this->hasOne(Chitietphieudat::class, 'nv_id');
	}

	public function phieudats()
	{
		return $this->hasMany(Phieudat::class, 'nv_id');
	}

	public function phieunhapthucphams()
	{
		return $this->hasMany(Phieunhapthucpham::class, 'nv_id');
	}

	public function phieuthanhtoans()
	{
		return $this->hasMany(Phieuthanhtoan::class, 'nv_id');
	}
}
