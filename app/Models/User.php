<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'role_id', 'school_id'
    ];    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() 
    {
        return $this->belongsTo(Role::class);
    }

    public function getRoleBidangAdminAttribute()
    {
        if($this->role_id == '5'){
            return '2';
        }else if($this->role_id == '6'){
            return '3';
        }else if($this->role_id == '7'){
            return '4';
        }
    }

    public function scopeOfAdminSchool($query, $value)
    {
        if (!empty($value)) {
            return $query->where('role_id', $value); 
        }
    }

    public function school() 
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}
