<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public function company(){
		return $this->belongsTo('App\Models\Company','id','user_id');
	}
	
	public function getCompanyIDAttribute()
	{
		if ($this->hasRole('admin|manager|root')){
			if ($this->hasRole('admin|root')) {
				// выводим ид компании головный где пользователь главный
				return $this->company->id;
			} else {
				// надо выводить ид компании где пользователь менеджером является
				return -1;
			}
		} else {
			return 0;
		}
	}
}
