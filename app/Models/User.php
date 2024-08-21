<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;

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
    public function attrByLocale($locale = 'en' , $attr = 'name')
    {
        $arr = json_decode($this->getRawOriginal($attr) , true);
        return $arr[$locale];
    }
    public function getNameAttribute($value)
    {
        $arr = json_decode($value , true);
        if (app()->isLocale('ar')) {
            return $arr['ar'];
        }else{
            return $arr['en'];
        }
    }

    public function getDescriptionAttribute($value)
    {
        $arr = json_decode($value ,true);
        if (app()->isLocale('ar')) {
            return $arr['ar'];
        }else{
            return $arr['en'];
        }
    }
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
        'password' => 'hashed',
    ];
}
