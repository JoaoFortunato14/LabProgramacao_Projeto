<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Utilizador extends Model
{
    use HasFactory;

    protected $fillable = ['email'];

    public static function byEmail($email){
        
        return static::where('email', $email)->firstOrFail();
    }
}
