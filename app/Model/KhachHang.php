<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class KhachHang extends Authenticatable
{
    protected $primaryKey = 'kh_id';
    protected $table = 'khachhang';
    protected $guard = 'khachhang';
    protected $fillable = [
        'usernname',
        'password',
        'kh_ten',
        'kh_sdt',
        'lkh_id'
    ];

    public $timestamps = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
