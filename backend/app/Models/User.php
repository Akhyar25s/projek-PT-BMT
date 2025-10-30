<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = ['aktor_id','username','password','nama_lengkap'];
    protected $hidden = ['password'];

    // login pakai kolom 'username'
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    public function aktor()
    {
        return $this->belongsTo(Aktor::class, 'aktor_id', 'aktor_id');
    }
}
